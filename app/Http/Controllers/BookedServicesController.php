<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
// use Illuminate\Support\Facades\File;

class BookedServicesController extends Controller
{
    public function index(){
        return view('employeeServices');
    }
}