<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use Validator;

class ServiceCategoriesController extends Controller
{
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

        return redirect('/viewServiceCategories')->with('message', 'Service Category added successfully!');
    }

    public function viewServiceCategories(Request $request){
        if(is_null($request->status) || $request->status == 'Active'){
            $serviceCategories = ServiceCategory::all();
        }else{
            $serviceCategories = ServiceCategory::onlyTrashed()->get();
        }

        return view('custom/serviceCategories/viewServiceCategories', ['serviceCategories'=>$serviceCategories, 'status'=>$request->status]);
    }

    public function edit($id){
        $serviceCategory = ServiceCategory::find($id);
        return view('custom/serviceCategories/editServiceCategory', ['serviceCategory' => $serviceCategory]);
    }

    public function update($id, Request $request){
        $serviceCategory = ServiceCategory::find($id);
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

        $serviceCategory->name = $input['categoryName'];
        $serviceCategory->description = $input['categoryDescription'];
        $serviceCategory->save();
        

        return redirect('/viewServiceCategories')->with('message', 'Service Category edited successfully!');
    }

    public function destroy($id)
    {
        $serviceCategory = ServiceCategory::find($id)->delete();
        return redirect('/viewServiceCategories')->with('message', 'Service Category deleted successfully!');
    }

    public function restoreServiceCategory($id){
        ServiceCategory::whereId($id)->restore();
        return back();
    }

    public function restoreServiceCategories(){
        ServiceCategory::onlyTrashed()->restore();
        return back();
    }

    public static function getServiceCategoryName($id){
        if($id == NULL){
            return "Not found";
        }
        $serviceCategory = ServiceCategory::find($id);

        return $serviceCategory->name;
    }
}
