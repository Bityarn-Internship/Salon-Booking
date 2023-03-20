<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Booking;
use App\Models\BookedService;
use App\Models\User;
use App\Models\EmployeeService;
use Illuminate\Http\Request;
use Auth;
use Validator;
use Session;

class BookingsController extends Controller
{
    public function index(){
        $services = Service::all();
        return view('custom/bookings/bookings', ['services'=>$services]);
    }

    public function store(Request $request){
        $input = $request->all();

        date_default_timezone_set("Africa/Nairobi");
        // return($request['time']);
        $rules = [
            'services'=>'required',
            'date'=>'required | date | after_or_equal:'.date('Y-m-d'),
            'time' => 'required | date_format:H:i',
            'clientID' => 'required'
        ];

        $messages = [
            'services.required' => 'Kindly select a service to proceed',
            'date.required'=>'Kindly select a date to proceed',
            'time.required'=>'Kindly select a time to proceed',
            'clientID.required'=>'Client ID is required'
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
            'clientID' => $input['clientID'],
            'cost' => $cost,
            'date' => $input['date'],
            'time' =>$input['time']
        ]);
        $bookingID = Booking::select('id')->where('clientID', $input['clientID'])->where('date', $input['date'])->get()->last()->id;
        $employeesServices = EmployeeService::all()->whereIn('serviceID', $request['services']);

        return view('/bookEmployeeServices', ['employeeServices'=>$employeesServices, 'services'=>$services, 'bookingID'=>$bookingID, 'cost'=>$cost]);
    }

    public function bookEmployee(Request $request){
        $input = $request->all();

        $rules = [
            'bookingID'=>'required',
        ];

        $messages = [
            'bookingID.required'=>'Booking ID is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $employeeservices = EmployeeService::whereIn('id', $input['employeeServices'])->get();
        $services = array();

        foreach($employeeservices as $employeeservice){
            $services[] = Service::find($employeeservice->serviceID);
            BookedService::create([
                'bookingID' => $input['bookingID'],
                'serviceID' => $employeeservice->serviceID,
                'employeeID' => $employeeservice->employeeID,
            ]);
        }

        $cost = Booking::find($input['bookingID'])->cost;
        $clientID = Booking::find($input['bookingID'])->clientID;

        return view('/custom/payments/depositPayment', ['cost'=>$cost,'bookingID'=>$input['bookingID'], 'services'=>$services, 'clientID'=>$clientID])->with('message', 'Services successfully added');
    }

    public function viewBookings(){
        $bookings = Booking::all();

        return view('custom/bookings/viewBookings', ['bookings' => $bookings]);
    }

    public function edit($id){
        $booking = Booking::find($id);
        return view('custom.bookings.editBooking', ['booking' => $booking]);
    }

    public function update(Request $request, $id){
        $booking = Booking::find($id);
        $input = $request->all();

        date_default_timezone_set("Africa/Nairobi");
        // return($request['time']);
        $rules = [
            'date'=>'required | date | after_or_equal:'.date('Y-m-d'),
            'time' => 'required',
        ];

        $messages = [
            'date.required'=>'Kindly select a date to proceed',
            'time.required'=>'Kindly select a time to proceed'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $booking->time = $input['time'];
        $booking->date = $input['date'];
        $booking->save();

        return redirect('/viewBookings')->with('message', 'Booking updated successfully!');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id)->delete();
        return redirect('/viewBookings')->with('message', 'Booking deleted successfully!');
    }

    public function ViewTrashedBookings()
    {
        $bookings = Booking::onlyTrashed()->get();
        return view('custom/bookings/ViewTrashedBookings',['bookings'=> $bookings]);
    }

    //restore deleted booking
    public function restoreBooking($id){
        Booking::whereId($id)->restore();
        return back();
    }

    //restore all deleted Bookings
    public function restoreBookings(){
        Booking::onlyTrashed()->restore();
        return back();
    }

    public function booking($id){
        $services = Service::all();
        return view('/bookings', ['clientID' => $id, 'services'=>$services]);
    }
}
