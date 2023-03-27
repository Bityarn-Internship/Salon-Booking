<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Validator;

class ServiceCategoriesController extends Controller
{
    public function index(){
        return view('custom/services/serviceCategory');
    }
    public function store(Request $request){
        $input = $request->all();

        $rules = [
            'categoryName'=>'required',
            'categoryDescription'=>'required'
        ];

        $messages = [
            'categoryName.required' => 'Service Category name is required',
            'categoryDescription.required'=>'Service Category description is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        ServiceCategory::create([
            'name' => $input['categoryName'],
            'description' => $input['categoryDescription']
        ]);

        return redirect('/viewServices')->with('message', 'Service Category added successfully!');
    }
     public static function getServiceCategoryName($id){
        if($id == NULL){
            return "Not found";
        }
        $serviceCategory = ServiceCategory::find($id);

        return $serviceCategory->name;
        }
}
