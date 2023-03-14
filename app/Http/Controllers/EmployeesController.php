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
}
