@extends('custom.common.master')

@section('title')
    @lang('View Clients')
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

                    <h4 class="card-title text-primary text-center">View Clients</h4>

                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Telephone Number</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->id}}</td>
                                    <td>{{$client->firstName}}</td>
                                    <td>{{$client->lastName}}</td>
                                    <td>{{$client->email}}</td>
                                    <td>{{$client->telephoneNumber}}</td>
                                    <td>
                                        <i class="fas fa-pencil-alt btn btn-outline-success btn-sm edit" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-center w-100" id="editModalLabel">Edit Client Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action = "{{ url('/updateClient/'.$client->id) }}" method = "post" enctype="multipart/form-data">
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
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control" id="floatingnameInput" value = "{{$client->firstName}}" name = "firstName">
                                                                        <label for="floatingnameInput">First Name</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        @if($errors->has('firstName'))
                                                                            {{ $errors->first('firstName') }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="text" class="form-control" id="floatingnameInput" value = "{{$client->lastName}}" name = "lastName">
                                                                        <label for="floatingnameInput">Last Name</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        @if($errors->has('lastName'))
                                                                            {{ $errors->first('lastName') }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="email" class="form-control" id="floatingnameInput" value = "{{$client->email}}" name = "email">
                                                                        <label for="floatingnameInput">Email Address</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        @if($errors->has('email'))
                                                                            {{ $errors->first('email') }}
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-12 pt-2">
                                                                    <div class="form-floating mb-3">
                                                                        <input type="tel" class="form-control" id="floatingnameInput" value = "{{$client->telephoneNumber}}" name = "telephoneNumber">
                                                                        <label for="floatingnameInput">Telephone Number</label>
                                                                    </div>

                                                                    <div class="invalid-feedback">
                                                                        @if($errors->has('telephoneNumber'))
                                                                            {{ $errors->first('telephoneNumber') }}
                                                                        @endif
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
                                        <a class="btn btn-outline-danger btn-sm edit" href="{{url ('deleteClient/'.$client->id) }}" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a class="btn btn-success" href="{{url ('/bookings/'.$client->id) }}">Make a booking</a>
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









