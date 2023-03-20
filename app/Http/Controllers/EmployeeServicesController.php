<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Service;
use App\Models\EmployeeService;
use Illuminate\Support\Facades\Validator;


class EmployeeServicesController extends Controller
{
    public function index(){
        return view('custom/employeeServices/employeeService');
    }
    public function assign(){
        $employees = Employee::all();
        $services = Service::all();
        return view('custom/employeeServices/employeeService',['employees'=>$employees,'services'=>$services]);
    }
    public function store(Request $request){

        $input = $request->all();

        $rules = [
            'employeeID'=>'required',
            'serviceID'=>'required'
        ];

        $messages = [
            'employeeID.required' => 'Kindly choose an employee to proceed',
            'serviceID.required'=>'Kindly choose a service to proceed',

        ];

            $validator = Validator::make($input, $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator->messages());
            }

            EmployeeService::create([
                'employeeID' => $input['employeeID'],
                'serviceID' => $input['serviceID'],
            ]);

            return redirect('/viewEmployeeServices')->with('message', 'Employee Service recorded successfully!');
    }
    public function viewEmployeeServices(){
        $employeeServices = EmployeeService::all();

        return view('viewEmployeeServices', ['employeeServices' => $employeeServices]);
    }
    public function edit($id){
        $employeeService = EmployeeService::find($id);
        $employees = Employee::all();
        $services = Service::all();
        return view('custom.employeeServices.editEmployeeService', ['employeeService' => $employeeService,'employees'=>$employees, 'services'=>$services]);
    }
    public function ViewTrashedEmployeeServices()
    {
        $employeeServices = EmployeeService::onlyTrashed()->get();
        return view('viewTrashedEmployeeServices',['employeeServices'=> $employeeServices]);
    }
    public function update(Request $request, $id){

        $input = $request->all();
        $employeeService = EmployeeService::find($id);

        $rules = [
            'employeeID'=>'required',
            'serviceID'=>'required',
        ];
        $messages = [
            'employeeID.required' => 'Employee Name is required',
            'serviceID.required'=>'Service  is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $employeeService->employeeID = $input['employeeID'];
        $employeeService->serviceID = $input['serviceID'];


        $employeeService->save();

        return redirect('/viewEmployeeServices')->with('message', 'Employee Service updated successfully!');
    }
    public function destroy($id)
    {
        $employeeService = EmployeeService::find($id)->delete();
        return redirect('/viewEmployeeServices')->with('message', 'Employee Service deleted successfully!');
    }

            //restore deleted employee
    public function restoreEmployeeService($id){
        EmployeeService::whereId($id)->restore();
        return back();
    }

            //restore all deleted employees
    public function restoreEmployeeServices(){
        EmployeeService::onlyTrashed()->restore();
        return back();
    }


}
