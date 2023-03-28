@extends('custom.common.master')

@section('title') @lang('translation.Profile') @endsection
@section('content')


    <div class="row">
        <div class="col-xl-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Booking Details
                        <span class="px-auto">
                            @if($booking->status != 'Complete')
                            <a class="btn btn-outline-success btn-sm edit float-end" href="{{url('completePayment/'.$booking->id)}}" title="Complete Payment">
                            <i class="bx bx-dollar"></i></a>
                            @endif

                            <i class="fas fa-pencil-alt btn btn-outline-primary btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                            
                            <a class="btn btn-outline-danger btn-sm edit" href="{{url('deleteBooking/'.$booking->id)}}" title="Delete">
                            <i class="fa fa-trash"></i>
                            </a>

                        </span>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center w-100" id="editModalLabel">Edit Employee Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action = "{{ url('/updateBooking/'.$booking->id) }}" method = "post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class="valid-feedback">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('bookingID'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('bookingID') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "{{$booking->id}}" name = "bookingID" readonly>
                                                        <label for="floatingnameInput">Booking ID</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('date'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('date') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="floatingnameInput" value = "{{$booking->date}}" name = "date">
                                                        <label for="floatingnameInput">Date</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('time'))
                                                        <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('time') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="floatingnameInput" value = "{{$booking->time}}" name = "time">
                                                        <label for="floatingnameInput">Time</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Save Changes</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </h4>
                    <div class="table-responsive">
                        <table class="table table-nowrap mb-0">
                            <tbody>
                            <tr>
                                <th scope="row">Booking ID: </th>
                                <td>{{$booking->id}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Client Name :</th>
                                <td>{{\App\Http\Controllers\UsersController::getClientName($booking->clientID)}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Date :</th>
                                <td>{{$booking->date}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Time :</th>
                                <td>{{$booking->time}}</td>
                            </tr>
                            <tr>
                                <th scope="row"> Total Cost:</th>
                                <td>{{$booking->cost}}</td>
                            </tr>
                            <tr>
                                <th scope="row"> Status:</th>
                                <td>{{$booking->status}}</td>
                            </tr>
                            
                            </tbody>
                        </table><br>
                        <center><a href = "{{url('/viewInvoice/'.$booking->id)}}" target = "_blank"><button type="button" class="btn btn-sm btn-primary">
                            <b>Generate Invoice</b>
                        </button></a></center>
                    </span>

                    </div>
                </div>
            </div>
            <!-- end card -->

            <!-- end card -->
        </div>

        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Booked Services</h4>
                    <span style="display: inline-block">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <b>Add Service</b>
                            </button>
                    </span>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-center w-100" id="exampleModalLabel">Edit Employee Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action = "{{ url('/bookService') }}" method = "post" enctype="multipart/form-data">
                                        @csrf
                                        <div class = "row">

                                            @if(session()->has('message'))
                                                <div class = "alert alert-info" role = "alert">
                                                    {{ session()->get('message') }}
                                                </div>
                                            @endif

                                        </div>
                                        <div class = "row">
                                            <div class="col-md-12">
                                                @if($errors->has('bookingID'))
                                                    <div class = "alert alert-danger" role = "alert">
                                                        {{ $errors->first('bookingID') }}
                                                    </div>
                                                @endif
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="floatingnameInput" value="{{$booking->id}}"  name="bookingID" readonly>
                                                    <label for="floatingnameInput">Booking ID</label>
                                                </div>
                                            </div>
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
                                                        <option selected disabled>Select the employee and service</option>
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
                                                    type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <table id="datatable" class="table table-bordered dt-responsive mt-2  nowrap w-100">
                        <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Employee Name</th>
                            <th>Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookedServices as $bookedService)
                            <tr>
                                <td>{{\App\Http\Controllers\ServicesController::getServiceName($bookedService->serviceID)}}</td>
                                <td>{{\App\Http\Controllers\EmployeesController::getEmployeeName($bookedService->employeeID)}}</td>
                                <td>{{$bookedService->serviceCost}}</td>
                                <td>
                                    <a class="btn btn-outline-success btn-sm edit" href="{{url ('editBookedService/'.$bookedService->id) }}" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <a class="btn btn-outline-danger btn-sm edit" href="{{url ('deleteBookedService/'.$bookedService->id) }}" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- profile init -->
    <script src="{{ URL::asset('/assets/js/pages/profile.init.js') }}"></script>

@endsection
