@extends('layouts.master-without-nav')

@section('title') @lang('translation.Form_Layouts') @endsection

@section('content')

    <div class="row ">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Employee Services</h4>

                            <form action = "{{ url('/employeeServices') }}" method = "post">
                                @csrf
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Employee Name</label>
                                    <select id="formrow-inputState" class="form-select" name = "employeeID">
                                        <option disabled selected>Select the employee</option>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->firstName." ".$employee->latName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Service</label>
                                    <select id="formrow-inputState" class="form-select" name = "serviceID">
                                        <option disabled selected>Select the service employee offers</option>
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{$service->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                        <div>
                            <center>
                            <button type="submit" class="btn btn-primary w-md">Assign</button>
                            </center>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>




{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Salon | Employee Services</title>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="{{asset('assets/css/forms.css')}}">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>--}}
{{--</head>--}}

{{--<body>--}}
{{--    <form action = "{{ url('/employeeServices') }}" method = "post" enctype="multipart/form-data">--}}
{{--        <h5 class="card-title text-center">Employee Services Details</h5></br>--}}
{{--        @csrf--}}
{{--        <div class="mb-3">--}}
{{--            @if($errors->has('employeeID'))--}}
{{--                <div class = "alert alert-danger" role = "alert">--}}
{{--                    {{ $errors->first('employeeID') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <label for="formrow-inputState" class="form-label">Employee Name: </label>--}}

{{--            <select id="formrow-inputState" class="form-select" name = "employeeID">--}}
{{--                <option disabled selected>Select the employee</option>--}}
{{--                @foreach($employees as $employee)--}}
{{--                    <option value="{{$employee->id}}">{{$employee->firstName." ".$employee->latName}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            @if($errors->has('serviceID'))--}}
{{--                <div class = "alert alert-danger" role = "alert">--}}
{{--                    {{ $errors->first('serviceID') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <label for="formrow-inputState" class="form-label">Service Name: </label>--}}
{{--            <select id="formrow-inputState" class="form-select" name = "serviceID">--}}
{{--                <option disabled selected>Select the service employee offers</option>--}}
{{--                @foreach($services as $service)--}}
{{--                    <option value="{{$service->id}}">{{$service->name}}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <center>--}}
{{--            <div>--}}
{{--                <button type="submit" class="btn btn-primary waves-effect waves-light">Assign</button>--}}
{{--            </div>--}}
{{--        </center>--}}
{{--    </form>--}}
{{--</body>--}}
