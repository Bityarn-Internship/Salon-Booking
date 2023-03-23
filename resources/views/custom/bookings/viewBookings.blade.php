@extends('custom.common.master')
@section('title')
    @lang('View Bookings')
@endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />
    <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
          rel="stylesheet" type="text/css" />
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title text-primary text-center">View Bookings</h4>

                    <div class="table-responsive">
                        <div class="d-flex gx-10">
                            <div class = "col">
                                <span style="display: inline-block"><h3><a class="btn btn-primary" href="{{url('/viewClients') }}"><b>Add Booking</b>
                                    </a></h3></span>
                            </div>
                            <div class="col-md-4">
                                <form action = "{{url('/viewBookings')}}" method = "GET">
                                    @csrf
                                    <span style="display: inline-block"><label for="status" class="form-label">Filter by status</label></span>
                                    <span style="display: inline-block">
                                        <select class="form-select" name = "status">
                                            <option value = "Active">Active</option>
                                            <option value = "Inactive">Inactive</option>
                                        </select>
                                        
                                    </span>
                                
                                    <span style="display: inline-block"><h3><button class="btn btn-primary"><b>Filter</b></button></h3></span>
                                </form>
                                
                            </div>
                        </div>
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>Booking ID</th>
                                <th>Client Name</th>
                                <th>Employee Name</th>
                                <th>Service Name</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Cost</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td>{{$booking->bookings_id}}</td>
                                    <td>{{\App\Http\Controllers\UsersController::getClientName($booking->clientID)}}</td>
                                    <td>{{\App\Http\Controllers\EmployeesController::getEmployeeName($booking->employeeID)}}</td>
                                    <td>{{\App\Http\Controllers\ServicesController::getServiceName($booking->serviceID)}}</td>
                                    <td>{{$booking->date}}</td>
                                    <td>{{$booking->time}}</td>
                                    <td>{{$booking->serviceCost}}</td>
                                    <td>{{$booking->status}}</td>

                                    <td>
                                        <a class="btn btn-outline-primary btn-sm edit" href="{{url ('bookService/'.$booking->bookingID) }}" title="Book another service">
                                            <i class="fa fa-plus-circle"></i>
                                        </a>
                                        @if($booking->status != 'Complete')
                                        <a class="btn btn-outline-success btn-sm edit" href="{{url ('completePayment/'.$booking->bookingID) }}" title="Complete Payment">
                                            <i class="fas fa-dollar-sign"></i>
                                        </a>
                                        @endif

                                        <a class="btn btn-outline-success btn-sm edit" href="{{url ('viewInvoice/'.$booking->bookingID) }}" title="View Invoice">
                                        <i class="fas fa-file-invoice"></i>
                                        </a>
                                        <a class="btn btn-outline-success btn-sm edit" href="{{url ('editBooking/'.$booking->bookedServiceID) }}" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm edit" href="{{url ('deleteBooking/'.$booking->bookingID) }}" title="Delete">
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
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection




