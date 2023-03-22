@extends('custom.common.master')

@section('title')
    @lang('View Employees')
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

                    <h4 class="card-title text-primary text-center">View Employees</h4>

                    <div class="table-responsive">
                        <div class="row d-flex gx-10">
                            <div class = "col">
                                <span style="display: inline-block"><h3><a class="btn btn-primary" href="{{url('/employees') }}"><b>Add Employee</b>
                                    </a></h3></span>
                            </div>
                            <div class="col-md-4">
                                <form action = "{{url('/viewEmployees')}}" method = "GET">
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
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Telephone Number</th>
                                <th>ID Number</th>
                                <th>Position</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->id}}</td>
                                    <td>{{$employee->firstName}}</td>
                                    <td>{{$employee->lastName}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->telephoneNumber}}</td>
                                    <td>{{$employee->IDNumber}}</td>
                                    <td>{{\App\Http\Controllers\PositionsController::getPositionName($employee->positionID)}}</td>
                                    <td>
                                        <a class="btn btn-outline-success btn-sm edit" href="{{url ('editEmployee/'.$employee->id) }}" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm edit" href="{{url ('deleteEmployee/'.$employee->id) }}" title="Delete">
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






