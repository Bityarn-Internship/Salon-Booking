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
                                            <h5 class="text-primary text-center">Make a Deposit Payment</h5>
                                        </div>

                                        <div class="mt-4 text-center">
                                        
                                            <p class="mt-0">Hello {{\App\Http\Controllers\UsersController::getClientName($clientID)}},</br>Thank you for booking with us.</p>
                                            <h4 class="card-title mt-0"><b>Your Requested Services:</b></h4>
                                                @foreach($services as $service)
                                                    <p>{{$service->name.': '.$service->cost}}KSH</p>
                                                @endforeach
                                                <p></p>
                                                <p>Total Cost: {{$cost}}KSH</p>
                                            <p>To confirm your booking you need to make a <b>20%</b> deposit payment of your booked services cost.</p>
                                            <br>
                                            <p><b>Deposit Cost: {{(0.2 * $cost)}}KSH</b></p>
                                            
                                            <form action="{{url('/payment')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="bookingID" value="{{$bookingID}}">
                                                <input type="hidden" name="cost" value="{{(0.2 * $cost)}}">
                                                <div class="d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Pay with Paypal</button>
                                                </div>
                                            </form>

                                            <br/>
                                            <form action = "{{url('/mpesaPayment')}}" method = "POST">
                                                @csrf
                                                <input hidden value = "{{$bookingID}}" name = "bookingID">
                                                <input hidden value = "{{$cost}}" name = "cost">
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
