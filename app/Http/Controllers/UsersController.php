<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function registerEmployee(){
        return view('employees');
    }
    public function registerClient(){
        return view('clients');
    }
}
