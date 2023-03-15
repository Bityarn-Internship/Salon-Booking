@extends('layouts.master')


@section('content')

@component('components.breadcrumb')


<div class="card" >
<div class="card-body">
<h5 class="card-title text-center">Employee Details</h5>
<form action = "{{ url('/employeeServices') }}" method = "post" enctype="multipart/form-data">
@csrf
<div class="form-floating mb-3">
    <label for="formrow-inputState" class="form-label">Employees</label>
    <select id="formrow-inputState" class="form-select" name = "employeeID">
        @foreach($employees as $employee)
            <option value="{{$employee->id}}">{{$employee->firstName." ".$employee->latName}}</option>
        @endforeach
    </select>
</div>
<div class="form-floating mb-3">
    <label for="formrow-inputState" class="form-label">Services</label>
    <select id="formrow-inputState" class="form-select" name = "serviceID">
        @foreach($services as $service)
            <option value="{{$service->id}}">{{$service->name}}</option>
        @endforeach
    </select>
</div>
    <input type="submit">
</form>
</div>
</div>




