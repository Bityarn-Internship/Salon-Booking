<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class EmployeesController extends Controller
{
    public function index(){
        $positions = Position::all();
        return view('employees',['positions'=>$positions]);
    }

    public function store(Request $request){

        $input = $request->all();
        $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:employees',
            'telephoneNumber'=>'required',
            'IDNumber'=>'required',
            'positionID'=>'required',
            'password'=> [
                'required',
                Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        //password submitted is not compromised on the internet with a public password data breach leak
                        ->uncompromised()
            ],
            'confirmPassword'=> 'required|same:password',
        ];

        $messages = [
            'firstName.required' => 'First Name is required',
            'lastName.required'=>'Last Name  is required',
            'email.required' => 'Email is required',
            'telephoneNumber.required'=>'Telephone Number  is required',
            'IDNumber.required' => 'National ID / Passport Number is required',
            'positionID.required' => 'Position is required',
            'password.required'=>'Password is required',
            'confirmPassword.required'=>'Confirm Password is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        Employee::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'email' => $input['email'],
            'telephoneNumber' => $input['telephoneNumber'],
            'IDNumber' => $input['IDNumber'],
            'positionID' => $input['positionID'],
            'password' => Hash::make($input['password']),
        ]);

        return redirect('/viewServices')->with('message', 'Employee registered successfully!');
    }

    public function update(Request $request, $id){

        $input = $request->all();
        $employee = Employee::find($id);

        $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:employees',
            'telephoneNumber'=>'required',
            'IDNumber'=>'required',
            'positionID'=>'required',
            'password'=> [
                'required',
                Password::min(8)
                        ->letters()
                        ->mixedCase()
                        ->numbers()
                        ->symbols()
                        //password submitted is not compromised on the internet with a public password data breach leak
                        ->uncompromised()
            ],
            'confirmPassword'=> 'required|same:password',
        ];

        $messages = [
            'firstName.required' => 'First Name is required',
            'lastName.required'=>'Last Name  is required',
            'email.required' => 'Email is required',
            'telephoneNumber.required'=>'Telephone Number  is required',
            'IDNumber.required' => 'National ID / Passport Number is required',
            'positionID.required' => 'Position is required',
            'password.required'=>'Password is required',
            'confirmPassword.required'=>'Confirm Password is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $employee->firstName = $input['firstName'];
        $employee->lastName = $input['lastName'];
        $employee->email = $input['email'];
        $employee->telephoneNumber = $input['telephoneNumber'];
        $employee->IDNumber = $input['IDNumber'];
        $employee->positionID = $input['positionID'];
        $employee->telephoneNumber = $input['telephoneNumber'];
        $employee->save();

        return redirect('/viewEmployees')->with('message', 'Employee updated successfully!');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id)->delete();
        return redirect('/viewEmployees')->with('message', 'Employee deleted successfully!');
    }

    //restore deleted employee
    public function restoreEmployee($id){
        Employee::whereId($id)->restore();
        return back();
    }

    //restore all deleted employees
    public function restoreEmployees(){
        Employee::onlyTrashed()->restore();
        return back();
    }

    public static function getEmployeeName($id){
        if($id == NULL){
            return "Not found";
        }
        $employee = Employee::find($id);

        return $employee->firstName.' '.$employee->lastName;
    }

    public function viewEmployees(){
        $employees = Employee::all();

        return view('viewEmployees', ['employees' => $employees]);
    }
    public function edit($id){
        $employee = Employee::find($id);
        return view('editEmployee', ['employee' => $employee]);
    }
    public function ViewTrashedEmployees()
    {
        $employees = Employee::onlyTrashed()->get();
        return view('ViewTrashedEmployees',['employees'=> $employees]);
    }
}
