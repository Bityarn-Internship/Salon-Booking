<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use Validator;

class PositionsController extends Controller
{
    public function index(){
        return view('positions');
    }
    public function store(Request $request){
        $input = $request->all();

        $rules = [
            'positionName'=>'required',
            'positionDescription'=>'required'
        ];

        $messages = [
            'positionName.required' => 'Position name is required',
            'positionDescription.required'=>'Position Description is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        Position::create([
            'name' => $input['positionName'],
            'description' => $input['positionDescription']
        ]);

        return redirect('/viewServices')->with('message', 'Service added successfully!');
    }

}
