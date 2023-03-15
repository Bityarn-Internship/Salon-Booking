<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\WalkIn;
use App\Models\EmployeeService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class WalkInsController extends Controller
{
    public function index(){
        $services = Service::all();

        return view('clientBooking', ['services'=>$services]);
    }

    public function store(Request $request){
        $input = $request->all();

        date_default_timezone_set("Africa/Nairobi");
        // return($request['time']);
        $rules = [
            'firstName' => 'required',
            'lastName' => 'required',
            'telephoneNumber' => 'required',
            'email' => 'required | email',
            'services'=>'required',
            'date'=>'required | date | after_or_equal:'.date('Y-m-d'),
            'time' => 'required | date_format:H:i'
        ];

        $messages = [
            'firstName.required'=> 'First Name is required',
            'lastName.required'=> 'Last Name is required',
            'telephoneNumber.required'=> 'Telephone Number is required',
            'email.required'=> 'Email Address is required',
            'services.required' => 'Kindly select a service to proceed',
            'date.required'=>'Kindly select a date to proceed',
            'time.required'=>'Kindly select a time to proceed'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $services = Service::all()->whereIn('id', $request['services']);
        $cost = 0;

        foreach($services as $service){
            $cost += $service->cost;
        }

        WalkIn::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'email' => $input['email'],
            'telephoneNumber' => $input['telephoneNumber'],
            'cost' => $cost,
            'date' => $input['date'],
            'time' =>$input['time']
        ]);

        $walkInID = WalkIn::select('id')->where('email', $input['email'])->get()->last()->id;
        $employeesServices = EmployeeService::all()->whereIn('serviceID', $request['services']);

        return view('/bookEmployeeServices', ['employeeServices'=>$employeesServices, 'services'=>$services, 'bookingID'=>NULL, 'walkinID'=>$walkInID, 'cost'=>$cost]);
    }
}
