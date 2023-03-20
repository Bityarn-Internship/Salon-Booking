@extends('layouts.master-without-nav')

@section('title')
    @lang('Services')
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
                                            <h5 class="text-primary text-center">MPESA Payment</h5>
                                        </div>

                                        <div class="alert alert-info">
                                            After entering your mpesa number and submitting, you will receive a pop-up on your phone. Kindly input your MPESA pin to complete the transaction.
                                        </div>

                                        <div class="mt-4">
                                            <form action = "{{ route('lipa') }}" method = "post" enctype="multipart/form-data">
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
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{ $bookingID }}" name = "bookingID" readonly>
                                                            <label for="floatingnameInput">Booking ID</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            @if($errors->has('bookingID'))
                                                                <div class = "alert alert-danger" role = "alert">
                                                                    {{ $errors->first('bookingID') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{ $cost }}" name = "amount" readonly>
                                                            <label for="floatingnameInput">Amount</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            @if($errors->has('amount'))
                                                                <div class = "alert alert-danger" role = "alert">
                                                                    {{ $errors->first('amount') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        <div class="form-floating mb-3">
                                                            <input type="tel" class="form-control" id="floatingemailInput" placeholder="Enter your telephone number..." name = "telephoneNumber">
                                                            <label for="floatingemailInput">Telephone Number</label>
                                                        </div>
                                                        <div class="invalid-feedback">
                                                            @if($errors->has('telephoneNumber'))
                                                                <div class = "alert alert-danger" role = "alert">
                                                                    {{ $errors->first('telephoneNumber') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Submit</button>
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
