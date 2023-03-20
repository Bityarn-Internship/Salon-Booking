@extends('layouts.master-without-nav')

@section('title')
    @lang('Employee Services')
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
@endsection

@section('body')

    <body class="auth-body-bg">
@endsection

@section('content')

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-5 mx-auto">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">
                               
                                <div class="my-auto">
                                    <div>
                                        <h5 class = "text-primary text-center">Assign Employee Service</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "{{ url('/employeeServices') }}" method = "post" enctype="multipart/form-data">
                                            @csrf
                                            <div class = "row"> 
                                                <div class="valid-feedback">
                                                    @if(session()->has('message'))
                                                        {{ session()->get('message') }}
                                                    @endif
                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "employeeID">
                                                            @foreach($employees as $employee)
                                                                <option value="{{$employee->id}}">{{$employee->firstName." ".$employee->lastName}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="floatingSelectGrid">Select an employee</label>
                                                        <div class="invalid-feedback">
                                                            @if($errors->has('employeeID'))
                                                                {{ $errors->first('employeeID') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "serviceID">
                                                            @foreach($services as $service)
                                                                <option value="{{$service->id}}">{{$service->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="floatingSelectGrid">Select a service</label>
                                                        <div class="invalid-feedback">
                                                            @if($errors->has('serviceID'))
                                                                {{ $errors->first('serviceID') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>

@endsection
@section('script')
    <!-- owl.carousel js -->
    <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
@endsection
