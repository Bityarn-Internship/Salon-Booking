<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index(){
        return view('custom/home/feedback');
    }
    public function viewFeedback(){
        $feedbacks = Feedback::all();
        return view('custom/home/viewFeedback',['feedbacks'=>$feedbacks]);
    }
    public function edit($id){
        $feedback = Feedback::find($id);
        return view('custom/home/editFeedback', ['feedback' => $feedback]);
    }
    public function viewTrashedFeedback()
    {
        $feedbacks = Feedback::onlyTrashed()->get();
        return view('custom/home/viewTrashedFeedback',['feedbacks'=> $feedbacks]);
    }
}
