<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceCategory;
use Validator;

class ServicesController extends Controller
{
    public function index(){
        $serviceCategories = ServiceCategory::all();
        return view('custom/services/services',['serviceCategories'=>$serviceCategories]);
    }
    public function viewServices(Request $request){
        $serviceCategories = ServiceCategory::all();
        if(is_null($request->status) || $request->status == 'Active'){
            $services = Service::all();
        }else{
            $services = Service::onlyTrashed()->get();
        }

        return view('custom/services/viewServices', ['services' => $services,'serviceCategories'=>$serviceCategories, 'status'=>$request->status]);
    }
    public function edit($id){
        $service = Service::find($id);
        return view('custom/services/editService', ['service' => $service]);
    }

    public function store(Request $request){
        $input = $request->all();

        $rules = [
            'serviceName'=>'required',
            'serviceCost'=>'required',
            'serviceCategoryID'=>'required'
        ];

        $messages = [
            'serviceName.required' => 'Service name is required',
            'serviceCost.required'=>'Service cost is required',
            'serviceCategoryID.required'=>'Service Category ID is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        Service::create([
            'name' => $input['serviceName'],
            'cost' => $input['serviceCost'],
            'serviceCategoryID' => $input['serviceCategoryID']
        ]);

        return redirect('/viewServices')->with('message', 'Service added successfully!');
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $service = Service::find($id);

        $rules = [
            'serviceName' => 'required',
            'serviceCost' => 'required'
        ];

        $messages = [
            'serviceName.required' => 'Service name is required',
            'serviceCost.required' => 'Service cost is required'
        ];

        $validator = Validator::make($input, $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $service->name = $input['serviceName'];
        $service->cost = $input['serviceCost'];
        $service->save();

        return redirect('/viewServices')->with('message', 'Service edited successfully!');
    }
    public function ViewTrashedServices()
    {
        $services = Service::onlyTrashed()->get();
        return view('custom/services/ViewTrashedServices',['services'=> $services]);
    }
    public function destroy($id)
    {
        $service = Service::find($id)->delete();
        return redirect('/viewServices')->with('message', 'Service deleted successfully!');
    }

    //restore deleted service
    public function restoreService($id){
        Service::whereId($id)->restore();
        return back();
    }

    //restore all deleted services
    public function restoreServices(){
        Service::onlyTrashed()->restore();
        return back();
    }

    public static function getServiceName($id){
        if($id == NULL){
            return "Not found";
        }
        $service = Service::find($id);

        return $service->name;
    }

    public static function getServiceCost($id){
        if($id == NULL){
            return "Not found";
        }
        $service = Service::find($id);

        return $service->cost;
    }
}
