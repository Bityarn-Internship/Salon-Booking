<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Validator;

class ServicesController extends Controller
{
    public function index(){
        return view('services');
    }

    public function store(Request $request){
        $input = $request->all();

        $rules = [
            'serviceName'=>'required',
            'serviceCost'=>'required'
        ];

        $messages = [
            'serviceName.required' => 'Service name is required',
            'serviceCost.required'=>'Service cost is required'
        ];

        $validator = Validator::make($input, $rules, $messages);
        
        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        Service::create([
            'name' => $input['serviceName'],
            'cost' => $input['serviceCost']
        ]);

        return redirect('/viewServices')->with('message', 'Service added successfully!');
    }

    public function update(Request $request, $id, Service $service){
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

        $service->serviceName = $input['serviceName'];
        $service->serviceCost = $input['serviceCost'];
        $service->save();

        // return redirect('/viewServices')->back()->with('message', 'Service edited successfully!');
    }

    public function destroy($id, Service $service)
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

        return $service->serviceName;
    }
}
