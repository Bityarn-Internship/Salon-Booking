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
    public function viewServices(){
        $services = Service::all()->where('deleted_at', NULL);

        return view('viewServices', ['services' => $services]);
    }
    public function editServices($id){
        $service = Service::find($id);
        return view('editServices', ['service' => $service]);
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
        return view('ViewTrashedServices',['services'=> $services]);
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
}
