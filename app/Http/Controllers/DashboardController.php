<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\PaypalPayment;
use App\Models\MpesaPayment;

class DashboardController extends Controller
{
    public function index(){
        $bookings = Booking::all()->count('id');
        $services = Service::all()->count('id');
        $paypalpayments = PaypalPayment::all()->count('id');
        $mpesapayments = MpesaPayment::all()->count('id');
        $upcomingBookings = Booking::select('*')->where('status','Reserved')->get();
        $payments = $paypalpayments + $mpesapayments;
        return view('custom/home/dashboard',['bookings'=>$bookings,'services'=>$services,'upcomingBookings'=>$upcomingBookings,'payments'=>$payments]);
    }
}
