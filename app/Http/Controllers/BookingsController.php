<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Booking;
use App\Models\BookedService;
use App\Models\User;
use App\Models\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        return view('custom/employeeServices/bookEmployeeServices', ['employeeServices'=>$employeesServices, 'services'=>$services, 'bookingID'=>$bookingID, 'cost'=>$cost]);
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
                'serviceCost' => Service::find($employeeservice->serviceID)->cost
            ]);
        }

        $cost = Booking::find($input['bookingID'])->cost;
        $clientID = Booking::find($input['bookingID'])->clientID;

        return view('/custom/payments/depositPayment', ['cost'=>$cost,'bookingID'=>$input['bookingID'], 'services'=>$services, 'clientID'=>$clientID])->with('message', 'Services successfully added');
    }

    //all bookings
    public function viewBookings(Request $request){

        if(is_null($request->status) || $request->status == 'Active'){
            // SELECT * FROM `booked_services`, bookings WHERE bookingID IN (SELECT id FROM bookings WHERE id = 1);
            //Joining 2 tables
            $bookings = Booking::all();
            // $bookings = DB::table('bookings')->select('*', 'bookings.id as bookings_id', 'booked_services.id as bookedServiceID')->join('booked_services', 'bookings.id', '=', 'booked_services.bookingID')->get();
        }else{
            $bookings = Booking::onlyTrashed()->get();
        }

        return view('custom/bookings/viewBookings', ['bookings' => $bookings, 'status'=>$request->status]);
    }

    //specific client bookings
    public function viewClientBookings($id){
        $bookings = DB::table('bookings')->select('*', 'bookings.id as bookings_id', 'booked_services.id as bookedServiceID')->join('booked_services', 'bookings.id', '=', 'booked_services.bookingID')->where('clientID', $id)->get();

        return view('custom/bookings/viewClientBookings', ['bookings' => $bookings]);
    }

    public function edit($id){
        $employeeServices = EmployeeService::orderBy('employeeID')->get();
        $booking = DB::table('bookings')->select('*', 'booked_services.id as bookedServiceID')->join('booked_services', 'bookings.id', '=', 'booked_services.bookingID')->where('booked_services.id', $id)->get()->first();
        return view('custom.bookings.editBooking', ['booking' => $booking, 'employeeServices' => $employeeServices]);
    }

    public function update(Request $request, $id){
        $input = $request->all();

        date_default_timezone_set("Africa/Nairobi");

        $rules = [
            'date'=>'required | date | after_or_equal:'.date('Y-m-d'),
            'time' => 'required'
        ];

        $messages = [
            'date.required'=>'Kindly select a date to proceed',
            'time.required'=>'Kindly select a time to proceed'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $booking = Booking::find($id);

        $booking->time = $input['time'];
        $booking->date = $input['date'];
        $booking->save();

        // $employeeService = EmployeeService::find($input['employeeServiceID']);
        // $bookedService->employeeID = $employeeService->employeeID;
        // $bookedService->serviceID = $employeeService->serviceID;
        // $bookedService->save();

        return redirect('/viewBooking/'.$booking->id)->with('message', 'Booking updated successfully!');
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
        return view('custom/bookings/bookings', ['clientID' => $id, 'services'=>$services]);
    }

    public function viewBooking($id){
        $booking = Booking::find($id);
        $clientID = $booking->clientID;
        $bookedServices = DB::table('bookings')->select('*', 'bookings.id as bookings_id', 'booked_services.id as bookedServiceID')->join('booked_services', 'bookings.id', '=', 'booked_services.bookingID')->where('clientID', $clientID)->where('booked_services.deleted_at', NULL)->where('bookingID', $id)->get();
        $employeeServices = EmployeeService::all();
        return view('custom/bookings/viewBooking', ['booking'=>$booking,'bookedServices'=>$bookedServices,'employeeServices'=>$employeeServices]);
    }
}
