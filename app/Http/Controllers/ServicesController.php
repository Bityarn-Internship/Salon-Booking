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
            'serviceName' => $input['serviceName'],
            'serviceCost' => $input['serviceCost']
        ]);

        return redirect()->back()->with('message', 'Service added successfully!');
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

        return redirect()->back()->with('message', 'Service edited successfully!');
    }

}
