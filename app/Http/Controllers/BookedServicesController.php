<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Employee;
use App\Models\BookedService;
use App\Models\Service;
use App\Models\Booking;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\EmployeeService;

class BookedServicesController extends Controller
{
    public function index($id){
        $employeeServices = EmployeeService::all();

        return view('custom/bookedServices/bookService', ['bookingID' => $id, 'employeeServices' => $employeeServices]);
    }

    public function store(Request $request){
        $input = $request->all();

        $rules = [
            'bookingID'=>'required',
            'employeeServiceID'=>'required'
        ];

        $messages = [
            'bookingID.required' => 'Booking ID is required',
            'employeeServiceID.required'=>'Employee and Service Names are required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $employeeService = EmployeeService::find($input['employeeServiceID']);
        $booking = Booking::find($input['bookingID']);
        $booking->cost += Service::find($employeeService->serviceID)->cost;
        $booking->save();

        BookedService::create([
            'bookingID' => $input['bookingID'],
            'serviceID' => $employeeService->serviceID,
            'employeeID' => $employeeService->employeeID,
            'serviceCost' => Service::find($employeeService->serviceID)->cost
        ]);

        return redirect('/viewBooking/'.$booking->id)->with('message', 'Service booked successfully!');
    }
    public function viewBookedServices(){
        $bookedServices = BookedService::all();

        return view('custom/bookedServices/viewBookedServices', ['bookedServices' => $bookedServices]);
    }

    public function edit($id){
        $bookedService = BookedService::find($id);
        $services = Service::all();
        $employees = Employee::all();
        return view('custom/bookedServices/editBookedService', ['bookedService' => $bookedService,'services'=>$services,'employees'=>$employees]);
    }
    public function update(Request $request, $id){

        $input = $request->all();
        $bookedService = BookedService::find($id);

        $rules = [
            'bookingID'=>'required',
            'serviceID'=>'required',
            'employeeID'=>'required'
        ];

        $messages = [
            'bookingID.required' => 'Booking ID is required',
            'serviceID.required'=>'Service Name  is required',
            'employeeID.required' => 'Employee Name is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $bookedService->bookingID = $input['bookingID'];
        $bookedService->serviceID = $input['serviceID'];
        $bookedService->employeeID = $input['employeeID'];

        $bookedService->save();

        return redirect('/viewBookedServices')->with('message', 'Employee Service updated successfully!');
    }
    public function destroy($id)
    {
        $bookedService = BookedService::find($id)->delete();
        return redirect('/viewBookedServices')->with('message', 'Employee Service deleted successfully!');
    }

    //restore deleted employee
    public function restoreBookedService($id){
        BookedService::whereId($id)->restore();
        return back();
    }

    //restore all deleted employees
    public function restoreBookedServices(){
        BookedService::onlyTrashed()->restore();
        return back();
    }
    public function ViewTrashedBookedServices()
    {
        $bookedServices = BookedService::onlyTrashed()->get();
        return view('custom/bookedServices/ViewTrashedBookedServices',['bookedServices'=> $bookedServices]);
    }

}
