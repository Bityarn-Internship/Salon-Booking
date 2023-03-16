<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\MpesaPayment;
use App\Models\Service;
use App\Models\BookedService;
use App\Models\Payment;

class PaymentsController extends Controller
{
    public function depositPayment(){
        return view('depositPayment');
    }
    public function completePayment($bookingID){
        $total = Booking::find($bookingID)->cost;
        $clientID = Booking::find($bookingID)->clientID;
        $amountPaid = 0;

        $transactions = MpesaPayment::all()->where('bookingID', $bookingID);
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

        return redirect('/paymentSuccess');

        
    }

}
