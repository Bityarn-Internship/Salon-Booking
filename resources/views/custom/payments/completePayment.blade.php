@extends('layouts.master-without-nav')

@section('title')
    @lang('Complete Payment')
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
                                            <h5 class="text-primary text-center">Complete Payment</h5>
                                        </div>

                                        <div class="mt-4 text-center">
                                        
                                            <p class="mt-0">Hello <b>{{\App\Http\Controllers\UsersController::getClientName($clientID)}}</b>,</br>Thank you for booking with us.</p>
        
                                            <h4 class="card-title mt-0"><b>Your Services</b></h4>
                                            @foreach($services as $service)
                                                <p>{{$service->name.': '.$service->cost}}</p>
                                            @endforeach
                                            <p></p>
                                            <p>Amount Paid: {{$total - $balance}}</p>
                                            <p>Total Cost: {{$total}}</p>

                                            <p>You have already paid a total of <b>{{$total - $balance}}</b></p>
                                            <br><p>Balance to be paid: <b>{{$balance}}</b></p>
                                            
                                            <form action="{{url('/payment')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="bookingID" value="{{$bookingID}}">
                                                <input hidden value = "{{$balance}}" name = "cost">

                                                <div class="d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Pay with Paypal</button>
                                                </div>
                                            </form>

                                            <br/>
                                            <form action = "{{url('/completeCashPayment')}}" method = "POST">
                                                @csrf
                                                <input type="hidden" name="bookingID" value="{{$bookingID}}">
                                                <input hidden value = "{{$balance}}" name = "amount">

                                                <div class="d-grid">
                                                    <button class="btn btn-info waves-effect waves-light"
                                                        type="submit">Pay with Cash</button>
                                                </div>
                                            </form>

                                            <br/>
                                            <form action = "{{url('/mpesaPayment')}}" method = "POST">
                                                @csrf
                                                <input type="hidden" name="bookingID" value="{{$bookingID}}">
                                                <input hidden value = "{{$balance}}" name = "cost">

                                                <div class="d-grid">
                                                    <button class="btn btn-success waves-effect waves-light"
                                                        type="submit">Pay with MPESA</button>
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
