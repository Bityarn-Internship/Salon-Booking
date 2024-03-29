<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use App\Models\Feedback;
use Session;

class EmployeesController extends Controller
{
    public function index(){
        $positions = Position::all();
        $feedbacks = Feedback::all()->where('status','Good');
        return view('custom/auth/employees',['positions'=>$positions,'feedbacks'=>$feedbacks]);
    }
    public function store(Request $request){

        $input = $request->all();
        $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:employees,email|unique:users,email',
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

        if(Session::get('user') == 'employee'){
            return redirect('/viewEmployees')->with('message', 'Employee added successfully!');
        }
        return redirect('/login')->with('message', 'Registration successful!');
    }

    public function update(Request $request, $id){

        $input = $request->all();
        $employee = Employee::find($id);

        $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'telephoneNumber'=>'required',
            'IDNumber'=>'required',
            'positionID'=>'required'
        ];

        $messages = [
            'firstName.required' => 'First Name is required',
            'lastName.required'=>'Last Name  is required',
            'email.required' => 'Email is required',
            'telephoneNumber.required'=>'Telephone Number  is required',
            'IDNumber.required' => 'National ID / Passport Number is required',
            'positionID.required' => 'Position is required'
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

    public function viewEmployees(Request $request){
        $positions = Position::all();

        if(is_null($request->status) || $request->status == 'Active'){
            $employees = Employee::all();
        }else{
            $employees = Employee::onlyTrashed()->get();
        }

        return view('custom/auth/viewEmployees', ['employees' => $employees, 'positions'=>$positions, 'status'=>$request->status]);
    }

    public function edit($id){
        $employee = Employee::find($id);
        $positions = Position::all();
        return view('custom.auth.editEmployee', ['employee' => $employee,'positions'=>$positions]);
    }
}
