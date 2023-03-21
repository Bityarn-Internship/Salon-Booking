<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Validator;

class FeedbackController extends Controller
{
    public function store(Request $request){
        $input = $request->all();

        $rules = [
            'firstName'=>'nullable',
            'lastName'=>'nullable',
            'email'=>'nullable',
            'message'=>'required'
        ];

        $messages = [
            'firstName.nullable' => 'First name is optional',
            'lastName.nullable' => 'Last name is optional',
            'email.nullable' => 'Email is optional',
            'message.required'=>'Message is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        Feedback::create([
            'firstName' => $input['firstName'],
            'lastName' => $input['lastName'],
            'email' => $input['email'],
            'message' => $input['message']
        ]);

        return redirect('/viewFeedback')->with('message', 'Feedback sent successfully!');
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $feedback = Feedback::find($id);

        $rules = [
            'status'=>'required'
        ];

        $messages = [
            'status.required'=>'Status is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $feedback->status = $input['status'];
        $feedback->save();

        return redirect('/viewFeedback')->with('message', 'Feedback updated successfully!');
    }
    
    public function destroy($id)
    {
        Feedback::find($id)->delete();
        return redirect('/viewFeedback')->with('message', 'Feedback deleted successfully!');
    }

    //restore deleted feedback
    public function restoreFeedback($id){
        Feedback::whereId($id)->restore();
        return back();
    }

    //restore all deleted feedback
    public function restoreFeedbacks(){
        Feedback::onlyTrashed()->restore();
        return back();
    }
}
