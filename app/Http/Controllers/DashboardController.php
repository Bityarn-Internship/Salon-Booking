<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Service;
use App\Models\PaypalPayment;
use App\Models\MpesaPayment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $bookings = Booking::all()->count('id');
        $services = Service::all()->count('id');
        $paypalpayments = PaypalPayment::all()->count('id');
        $mpesapayments = MpesaPayment::all()->count('id');
        $upcomingBookings = DB::table('bookings')->select('*', 'bookings.id as bookings_id', 'booked_services.id as bookedServiceID')->join('booked_services', 'bookings.id', '=', 'booked_services.bookingID')->where('status', '!=', 'Complete')->get();
        $payments = $paypalpayments + $mpesapayments;
        return view('custom/home/dashboard',['bookings'=>$bookings,'services'=>$services,'upcomingBookings'=>$upcomingBookings,'payments'=>$payments]);
    }
}
