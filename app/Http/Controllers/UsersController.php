<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function index(){
        return view('clients');
    }
    public function viewClients(){
        $clients = User::all();
        return view('viewClients', ['clients' => $clients]);
    }
    public function edit($id){
        $client = User::find($id);
        return view('editEmployee', ['client' => $client]);
    }
    public function ViewTrashedClients()
    {
        $clients = User::onlyTrashed()->get();
        return view('ViewTrashedClients',['clients'=> $clients]);
    }
}
