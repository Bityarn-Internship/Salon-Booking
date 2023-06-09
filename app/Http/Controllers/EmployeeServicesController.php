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
    public function viewEmployeeServices(Request $request){
        $employees = Employee::all();
        $services = Service::all();
        if(is_null($request->status) || $request->status == 'Active'){
            $employeeServices = EmployeeService::all();
        }else{
            $employeeServices = EmployeeService::onlyTrashed()->get();
        }

        return view('custom/employeeServices/viewEmployeeServices',['employees'=>$employees,'services'=>$services,'employeeServices' => $employeeServices, 'status'=>$request->status]);
    }
    public function edit($id){
        $employeeService = EmployeeService::find($id);
        $employees = Employee::all();
        $services = Service::all();
        return view('custom.employeeServices.editEmployeeService', ['employeeService' => $employeeService,'employees'=>$employees, 'services'=>$services]);
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
