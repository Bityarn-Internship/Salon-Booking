<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\MpesaPayment;
use Illuminate\Support\Facades\Log;

class MpesaController extends Controller
{
    //return the page with mpesa form
    public function index(Request $request){
        $cost = $request->cost;
        $bookingID = $request->bookingID;

        return view('mpesaPayment', ['cost'=>$cost, 'bookingID'=>$bookingID]);
    }

    //mpesa password generation
    public function lipaNaMpesaPassword(){
        //generate timestamp
        $timestamp = Carbon::rawParse('now')->format('YmdHms');
        //use passkey
        $passKey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        //businessShortcode
        $businessShortCode = 174379;
        //generate password
        $mpesaPassword = base64_encode($businessShortCode.$passKey.$timestamp);

        return $mpesaPassword;
    }

    //mpesa generate access token request
    public function newAccessToken(){
        
        $consumer_key = "jHAAtSyF9nsiB2VttgZDnpxbyzA767RY";
        $consumer_secret = "3eHfvCtZ8ykoWXYO";
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        //POST request using curl
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        curl_close($curl);

        return $access_token->access_token;
    }

    //mpesa send stk push request using the access token
    //if successful prompts user for pin to pay and payment is deducted
    public function stkPush(Request $request)
    {
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $bookingID =  $request->bookingID;
        $phone =  $request->telephoneNumber;
        $formatedPhone = substr($phone, 1); //7*******
        $code = "254";
        $phoneNumber = $code.$formatedPhone; //2547*******

        $curl_post_data = [
            'BusinessShortCode' =>174379,
            'Password' => $this->LipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => 1,
            'PartyA' => $phoneNumber,
            'PartyB' => 174379,
            'PhoneNumber' => $phoneNumber,
            //mpesa sends transaction response to this callback url
            'CallBackURL' => 'https://e39b-105-162-62-250.in.ngrok.io/api/stk/push/callback/url',
            'AccountReference' => "Salon Booking System Payment",
            'TransactionDesc' => "Lipa Na M-PESA"
        ];

        $data_string = json_encode($curl_post_data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->newAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        
        return $curl_response;
    }

    //Save MPESA data to database
    public function mpesaResponse(Request $request){
        Log::info('Request get content: '.$request->getContent());

        $response = json_decode($request->getContent());
        Log::info("Response");
        Log::info($response);

        $responseData = $response->Body->stkCallback->CallbackMetadata;
        Log::info("Response Data");
        Log::info($responseData);

        $amount = $responseData->Item[0]->Value;
        $transactionID = $responseData->Item[1]->Value;
        $transactionDate = date("Y-m-d H:i:s", strtotime($responseData->Item[3]->Value));
        $phoneNumber = $responseData->Item[4]->Value;

        $transaction = new MpesaPayment();
        $transaction->transactionID = $transactionID;
        $transaction->transactionDate = $transactionDate;
        $transaction->amount = $amount;
        $transaction->telephoneNumber = $phoneNumber;
        Log::info('Transaction: ');
        Log::info($transaction);
        
        $transaction->save();
    }
}
