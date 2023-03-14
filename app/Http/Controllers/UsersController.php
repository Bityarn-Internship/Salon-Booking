<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        return view('clients');
    }

    public function store(Request $request){

        $input = $request->all();
        $rules = [
            'firstName'=>'required',
            'lastName'=>'required',
            'email'=>'required|email|unique:users',
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

        User::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'email' => $input['email'],
            'telephoneNumber' => $input['telephoneNumber'],
            'password' => Hash::make($input['password']),
        ]);

        return redirect('/viewClients')->with('message', 'Client registered successfully!');
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
}
