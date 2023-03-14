<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeServicesController extends Controller
{
    public function index(){
        return view('employeeServices');
    }
}
