<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Booking;
use App\Models\User;
use App\Models\EmployeeService;
use Illuminate\Http\Request;
use Auth;
use Validator;


class BookingsController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('bookings',['services'=>$services]);
    }
    public function store(Request $request){

        $input = $request->all();

        date_default_timezone_set("Africa/Nairobi");
        // return($request['time']);
        $rules = [
            'services'=>'required',
            'date'=>'required | date | after_or_equal:'.date('Y-m-d'),
            'time' => 'required | date_format:H:i'
        ];

        $messages = [
            'services.required' => 'Kindly select a service to proceed',
            'date.required'=>'Kindly select a date to proceed',
            'time.required'=>'Kindly select a time to proceed'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }
        $cost = 0;
        $services = Service::all()->whereIn('id', $request['services']);
        foreach($services as $service){
            $cost += $service->cost;
        }

        Booking::create([
            'clientID' => Auth::user()->id,
            'cost' => $cost,
            'date' => $input['date'],
            'time' =>$input['time']
        ]);

        $employeesServices = EmployeeService::all()->whereIn('serviceID', $request['services']);

        return view('/employeeServices', ['employeeServices'=>$employeesServices, 'services'=>$services]);
    }
    public function booking($id){
        $client = User::find($id);
        $services = Service::all();
        return view('bookings',['client'=>$client,'services'=>$services]);
    }
}
