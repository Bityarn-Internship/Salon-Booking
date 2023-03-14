<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;


class BookingsController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('bookings',['services'=>$services]);
    }
    public function store(Request $request){
        return $request;
    }
}
