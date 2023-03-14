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
    public function viewPositions(){
        $positions = Position::all()->where('deleted_at', NULL);

        return view('viewPositions', ['positions' => $positions]);
    }
    public function edit($id){
        $position = Position::find($id);
        return view('editPosition', ['position' => $position]);
    }
    public function ViewTrashedPositions()
    {
        $positions = Position::onlyTrashed()->get();
        return view('ViewTrashedPositions',['positions'=> $positions]);
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

        return redirect('/viewPositions')->with('message', 'Position added successfully!');
    }

    public function update($id, Request $request){
        
        $input = $request->all();
        $position = Position::find($id);

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

        $position->name = $input['positionName'];
        $position->description = $input['positionDescription'];
        $position->save();

        return redirect('/viewPositions')->with('message', 'Position updated successfully!');
    }

    public function destroy($id)
    {
        $position = Position::find($id)->delete();
        return redirect('/viewPositions')->with('message', 'Position deleted successfully!');
    }

    //restore deleted position
    public function restorePosition($id){
        Position::whereId($id)->restore();
        return back();
    }

    //restore all deleted positions
    public function restorePositions(){
        Position::onlyTrashed()->restore();
        return back();
    }

    public static function getPositionName($id){
        if($id == NULL){
            return "Not found";
        }
        $position = Position::find($id);

        return $position->name;
    }
}
