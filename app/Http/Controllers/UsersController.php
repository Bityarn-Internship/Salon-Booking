<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Feedback;
use Auth;
use Session;

class UsersController extends Controller
{
    public function index(){
        $feedbacks = Feedback::all()->where('status','Good');
        return view('custom/auth/clients',['feedbacks'=>$feedbacks]);
    }
    public function login(){
        $feedbacks = Feedback::all()->where('status','Good');
        return view('custom/auth/login',['feedbacks'=>$feedbacks]);
    }

    public function processLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        //Login user
        if(Auth::guard('web')->attempt($credentials)){
            Session::put('user', 'client');
            Session::put('clientID', User::select('id')->where('email', $request['email'])->get()->first()->id);

            return redirect('/bookings')->with('message', 'Login successful');
        }

        if(Auth::guard('employees')->attempt($credentials)){
            Session::put('user', 'employee');
            Session::put('employeeID', Employee::select('id')->where('email', $request['email'])->get()->first()->id);

            return redirect('/dashboard')->with('message', 'Login successful');
        }

        return redirect()->back()->with('messageLogin', 'Invalid login credentials');
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/login');
    }

    public function store(Request $request){

        $input = $request->all();
        $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:users,email|unique:employees,email',
            'telephoneNumber'=>'required',
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
            'password.required'=>'Password is required',
            'confirmPassword.required'=>'Confirm Password is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        if(Session::get('user') == 'employee'){
            $userType = 'Walk-in';
        }else{
            $userType = 'self-registered';
        }

        User::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'email' => $input['email'],
            'telephoneNumber' => $input['telephoneNumber'],
            'password' => Hash::make($input['password']),
            'userType' => $userType
        ]);

        if(Session::get('user') == 'employee'){
            return redirect('/viewClients')->with('message', 'Client added successfully!');
        }else{
            return redirect('/login')->with('message', 'Registration successful!');
        }
    }

    public function update(Request $request, $id){

        $input = $request->all();
        $user = User::find($id);

        $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email',
            'telephoneNumber'=>'required'
        ];

        $messages = [
            'firstName.required' => 'First Name is required',
            'lastName.required'=>'Last Name  is required',
            'email.required' => 'Email is required',
            'telephoneNumber.required'=>'Telephone Number  is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $user->firstName = $input['firstName'];
        $user->lastName = $input['lastName'];
        $user->email = $input['email'];
        $user->telephoneNumber = $input['telephoneNumber'];
        $user->save();

        return redirect('/viewClients')->with('message', 'Client updated successfully!');
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect('/viewClients')->with('message', 'Client deleted successfully!');
    }

    //restore deleted client
    public function restoreClient($id){
        User::whereId($id)->restore();
        return back();
    }

    //restore all deleted clients
    public function restoreClients(){
        User::onlyTrashed()->restore();
        return back();
    }

    public static function getClientName($id){
        if($id == NULL){
            return "Not found";
        }
        $user = User::find($id);

        return $user->firstName.' '.$user->lastName;

    }

    public function viewClients(Request $request){
        if(is_null($request->status) || $request->status == 'Active'){
            $clients = User::all();
        }else{
            $clients = User::onlyTrashed()->get();
        }
        return view('custom/auth/viewClients', ['clients' => $clients, 'status'=>$request->status]);
    }

    public function edit($id){
        $client = User::find($id);
        return view('custom.auth.editClient', ['client' => $client]);
    }
}
