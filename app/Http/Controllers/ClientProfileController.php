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

class ClientProfileController extends Controller
{

    public function index(){
        $client = User::find('id');
        $upcomingBookings = DB::table('bookings')->select('*', 'bookings.id as bookings_id', 'booked_services.id as bookedServiceID')->join('booked_services', 'bookings.id', '=', 'booked_services.bookingID')
                            ->where('clientID',Auth::user()->id)
                            ->where('status','Reserved')
                            ->get();
        return view('custom/home/clientProfile',['client'=>$client,'upcomingBookings'=>$upcomingBookings]);
    }
    public function update(Request $request, $id){

        $input = $request->all();
        $client = User::find($id);

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

        $client->firstName = $input['firstName'];
        $client->lastName = $input['lastName'];
        $client->email = $input['email'];
        $client->telephoneNumber = $input['telephoneNumber'];

        $client->save();

        return redirect('/clientProfile')->with('message', 'Employee updated successfully!');
    }
        public function changePassword(Request $request){
            $request->validate([
                'oldPassword'=> 'required|min:6',
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
                'confirmPassword'=> 'required|min:6|same:password'
            ]);
            //Check the entered password if its similar to the password that is in the database
            $oldPasswordStatus = Hash::check($request->oldPassword, auth()->user()->password);
            //If the two match the the password in the db will update to the new password entered
            if($oldPasswordStatus){

                User::findOrFail(Auth::user()->id)->update([
                    'password' => Hash::make($request->password),
                ]);

                return redirect()->back()->with('message','Password Updated Successfully');

            }else{

                return redirect()->back()->with('message','Current Password does not match with Old Password');
            }
        }

}
