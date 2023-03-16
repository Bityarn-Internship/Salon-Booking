<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UsersController;
use App\Models\PaypalPayment;
use App\Models\Booking;
use App\Models\BookedService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Omnipay\Omnipay;
use Session;

class PaypalPaymentController extends Controller
{
    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function pay(Request $request)
    {

        try {
            $response = $this->gateway->purchase(array(
                Session::put('bookingID', $request->bookingID),
                'amount' => $request->cost,
                'bookingID' => $request->bookingID,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();
            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }
        }catch (\Throwable $th) {
        return $th->getMessage();
        }
    }
    public function success(Request $request)
    {

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new PaypalPayment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->bookingID = Session::get('bookingID');

                $booking = Booking::find(Session::get('bookingID'));
                $bookedServices = BookedService::all()->where('bookingID', $booking->id);

                if($arr['transactions'][0]['amount']['total'] == (0.2 * $booking->cost)){
                    $booking->status = 'Reserved';
                    $body = "<p>Hello ".UsersController::getClientName($booking->clientID).",</p>
                            <p>
                                We have received your deposit payment of ".$arr['transactions'][0]['amount']['total']." and your booking has been made successfully.
                            </p>
                            <h4>Booking Details: </h4>
                            <p>Booking ID: ".$booking->id."</br>
                            <p>Amount Paid: ".$arr['transactions'][0]['amount']['total']."</br>
                            <p>Balance: ".$booking->cost - ($arr['transactions'][0]['amount']['total'])."</br>
                            <p>Total Cost: ".$booking->cost."</br>
                            <p>Your booking is scheduled on ".$booking->date." at ".$booking->time."</p>";
                }else{
                    $booking->status = 'Complete';
                    $body = "<p>Hello ".UsersController::getClientName($booking->clientID).",</p>
                            <p>
                                We have received your full payment of ".$booking->cost." for Booking Number ".$booking->id." and your service(s) has been successfully done.
                            </p>
                            <h4>Booking Details: </h4>
                            <p>Booking ID: ".$booking->id."</br>
                            <p>Your booking was scheduled on ".$booking->date." at ".$booking->time."</p>";
                }
                $booking->save();
                $payment->save();

                $user = User::find($booking->clientID);
                \Mail::send('sendBookingEmail', ['body'=>$body, 'bookedServices'=>$bookedServices], function($message) use ($request, $user){
                    $message->from('noreply@gmail.com', 'Salon Booking System');
                    $message->to($user->email)
                    ->subject('Salon Booking System: Booking Details');
                });
                // return view('viewServices',['bookingID'=>$bookingID]);
                // return "Payment is Successful. Your Transaction Id is : " . $arr['id'];
                return redirect('/viewBookings')->with('message', 'Email sent');
            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }
    public function errorOccurred()
    {
        return 'User declined the payment!';
    }
    public function confirm(){
        return view('paypalConfirm');
    }
    public function viewPaypalPayments(){
        $paypalpayments = PaypalPayment::all();
        return view('ViewPaypalPayments',['paypalpayments'=> $paypalpayments]);

    }
    public function destroy($id){

        $paypalpayments = PaypalPayment::find($id)->delete();
        return redirect('ViewPaypalPayments');

    }
    public function viewTrashedPayPalPayments()
    {
        $paypalpayments = PaypalPayment::onlyTrashed()->get();
        return view('ViewTrashedPaypalPayments',['paypalpayments'=> $paypalpayments]);
    }
    public function restorePayPalPayments($id){
        PaypalPayment::whereId($id)->restore();
        return redirect('ViewTrashedPayPalPayments');
    }
    public function restoreAllPayPalPayments(){
        PaypalPayment::onlyTrashed()->restore();
        return back();
    }
}
