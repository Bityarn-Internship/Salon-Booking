<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\MpesaPayment;
use App\Models\Service;
use App\Models\BookedService;
use App\Models\Payment;
use App\Models\PaypalPayment;
use App\Models\User;

class PaymentsController extends Controller
{
    public function depositPayment(){
        return view('depositPayment');
    }
    public function completePayment($bookingID){
        $total = Booking::find($bookingID)->cost;
        $clientID = Booking::find($bookingID)->clientID;
        $amountPaid = 0;

        $transactions = PaypalPayment::all()->where('bookingID', $bookingID);
        foreach($transactions as $transaction){
            $amountPaid += $transaction->amount;
        }

        $balance = $total - $amountPaid;
        $serviceIDs = array();
        $bookedServices = BookedService::select('serviceID')->where('bookingID', $bookingID)->get();

        foreach($bookedServices as $bookedService){
            $serviceIDs[] = $bookedService->serviceID;
        }
        $services = Service::all()->whereIn('id', $serviceIDs);

        return view('completePayment', ['balance'=>$balance, 'total'=>$total, 'clientID'=>$clientID, 'bookingID'=>$bookingID, 'services'=>$services]);
    }

    public function completeCashPayment(Request $request){
        Payment::create([
            'bookingID' => $request->bookingID,
            'amount' => $request->amount,
        ]);

        $booking = Booking::find($request->bookingID);
        $booking->status = 'Complete';
        $booking->save();

        $bookedServices = BookedService::all()->where('bookingID', $booking->id);
        $user = User::find($booking->clientID);

        $body = "<p>Hello ".UsersController::getClientName($booking->clientID).",</p>
                    <p>
                        We have received your full payment of ".$booking->cost." for Booking Number ".$booking->id." and your service(s) has been successfully done.
                    </p>
                    <h4>Booking Details: </h4>
                    <p>Booking ID: ".$booking->id."</br>
                    <p>Your booking was scheduled on ".$booking->date." at ".$booking->time."</p>";
        \Mail::send('sendBookingEmail', ['body'=>$body, 'bookedServices'=>$bookedServices], function($message) use ($request, $user){
            $message->from('nkatha.dev@gmail.com', 'Salon Booking System');
            $message->to($user->email)
            ->subject('Salon Booking System: Booking Details');
        });

        return redirect('/paymentSuccess')->with('message', 'Email successfully sent!');

        
    }

}
