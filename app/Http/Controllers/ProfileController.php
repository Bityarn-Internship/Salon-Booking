<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Booking;
use Auth;
use Session;

class ProfileController extends Controller
{
    public function index(){
        $employee = Employee::find(Session::get('employeeID'));
        $positions = Position::all();
        $upcomingBookings = DB::table('bookings')->select('*', 'bookings.id as bookings_id', 'booked_services.id as bookedServiceID')->join('booked_services', 'bookings.id', '=', 'booked_services.bookingID')
                            ->where('employeeID',Session::get('employeeID'))
                            ->where('status','!=', 'Complete')
                            ->get();
        return view('custom/home/userProfile',['employee'=>$employee,'positions'=>$positions,'upcomingBookings'=>$upcomingBookings]);
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

        return redirect('/userProfile')->with('message', 'Employee updated successfully!');
    }
    public function changePassword(Request $request){
        $request->validate([
            'oldPassword'=> 'required|min:6',
            'password'=> [
               'required',
               Password::min(6)
                   ->letters()
                   ->mixedCase()
                   ->numbers()
                   ->symbols()
                   //password submitted is not compromised on the internet with a public password data breach leak
                   ->uncompromised()
            ],
            'confirmPassword'=> 'required|min:6|same:password'
        ]);
         $dbpassword = Employee::find(Session::get('employeeID'))->password;

        //Check the entered password if its similar to the password that is in the database
        $oldPasswordStatus = Hash::check($request->oldPassword,  $dbpassword);

        //If the two match the the password in the db will update to the new password entered
        if($oldPasswordStatus){

            Employee::findOrFail(Session::get('employeeID'))->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('message','Password Updated Successfully');

        }else{
            return redirect()->back()->with('message','Current Password does not match with Old Password');
        }
    }

}
