@extends('layouts.master-without-nav')

@section('title')
    @lang('MPESA Confirmation')
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
                                            <h5 class="text-primary text-center">MPESA Confirmation</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form action = "{{ url('/checkTransaction') }}" method = "post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    @if(session()->has('message'))
                                                        <div class = "alert alert-info" role = "alert">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('transaction'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('transaction') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the transaction code..." name = "transaction">
                                                            <label for="floatingnameInput">Transaction Code</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="row">
                                                    @if($errors()->has('bookingID'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('bookingID') }}
                                                        </div>
                                                    @endif
                                                    <div class="col-md-12 pt-2">
                                                        <input hidden value = "{{$bookingID}}" name = "bookingID">
                                                    </div>
                                                </div>
                                                
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Confirm</button>
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
