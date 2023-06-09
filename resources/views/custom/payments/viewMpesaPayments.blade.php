@extends('custom.common.master')
@section('title')
    @lang('View Mpesa Payments')
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

                    <h4 class="card-title text-primary text-center">View Mpesa Payments</h4>

                    <div class="table-responsive">
                        <div class="d-flex gx-10">
                            <div class="col">
                                @if($status == 'Inactive') 
                                    <a href = "/restoreMpesaPayments"><button type="button" class="btn btn-primary">
                                        <b>Restore All</b>
                                        <i class="fas fa-trash-restore"></i>
                                    </button></a>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <form action = "{{url('/viewMpesaPayments')}}" method = "GET">
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
                                <th>Transaction ID</th>
                                <th>Transaction Date</th>
                                <th>Amount</th>
                                <th>Currency </th>
                                <th>Telephone Number</th>
                                <th>Booking ID </th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($mpesapayments as $mpesapayment)
                                <tr>
                                    <td>{{ $mpesapayment-> transactionID }}</td>
                                    <td>{{ $mpesapayment-> transactionDate }}</td>
                                    <td>{{ $mpesapayment-> amount }}</td>
                                    <td>{{ $mpesapayment-> currency }}</td>
                                    <td>{{ $mpesapayment-> telephoneNumber }}</td>
                                    <td>{{ $mpesapayment-> bookingID }}</td>
                                    <td> 
                                        @if($status != 'Inactive') 
                                        <a class="btn btn-outline-danger btn-sm edit" href="{{url ('deleteMpesaPayment/'.$mpesapayment->id) }}" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        @else
                                            <a class="btn btn-outline-primary btn-sm edit" href="{{url ('restoreMpesaPayment/'.$mpesaPayment->id) }}" title="Restore">
                                                <i class="fas fa-trash-restore"></i>
                                            </a>
                                        @endif
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






