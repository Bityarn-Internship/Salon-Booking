<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Employee;
use App\Models\BookedService;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
// use Illuminate\Support\Facades\File;

class BookedServicesController extends Controller
{
    public function index(){
        return view('custom/employeeServices/employeeService');
    }
    public function viewBookedServices(){
        $bookedServices = BookedService::all();

        return view('viewBookedServices', ['bookedServices' => $bookedServices]);
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
            'bookingID.required' => 'Booking Status is required',
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
        return view('ViewTrashedBookedServices',['bookedServices'=> $bookedServices]);
    }

}
