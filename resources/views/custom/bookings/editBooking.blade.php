@extends('custom.common.master')

@section('title')
    @lang('Booking')
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
@endsection


@section('content')

    <div>
        <div class="container-fluid p-0">
            <div class="row g-0">

                <div class="col-xl-5 mx-auto">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">
                            <div class="d-flex flex-column h-100">

                                <div>
                                    <div>
                                        <h5 class = "text-primary text-center">Edit Booking</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "{{ url('/updateBooking/'.$booking->bookedServiceID) }}" method = "post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-info" role="alert">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingemailInput" value = "{{$booking->bookingID}}"name = "bookingID" readonly>
                                                        <label for="floatingemailInput">Booking ID</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-info" role="alert">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 pt-2">
                                                    @if($errors->has('date'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('date') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="floatingemailInput" value = "{{$booking->date}}" name = "date">
                                                        <label for="floatingemailInput">Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-2">
                                                    @if($errors->has('time'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('time') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="floatingemailInput" value = "{{$booking->time}}" name = "time">
                                                        <label for="floatingemailInput">Time</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-info" role="alert">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class = "row">
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('employeeServiceID'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('employeeServiceID') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "employeeServiceID">
                                                            <option>{{\App\Http\Controllers\EmployeesController::getEmployeeName($booking->employeeID) .' -> '.\App\Http\Controllers\ServicesController::getServiceName($booking->serviceID) }}</option>
                                                            @foreach($employeeServices as $employeeService)
                                                                <option value="{{$employeeService->id}}">{{ \App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID).' -> '.\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID) }}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="floatingSelectGrid">Select Employee and Service</label>
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
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('services')  // id
    </script>
@endsection
