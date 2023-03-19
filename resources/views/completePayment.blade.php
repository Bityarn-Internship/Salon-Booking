



@extends('layouts.master-without-nav')

@section('content')


    <div class="row mx-2 my-2">
        <div class="col-md-6">

            <!-- Simple card -->
            <center>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mt-0">Complete Payment</h4>
                        <p>Hello {{\App\Http\Controllers\UsersController::getClientName($clientID)}},
                            </br>Thank you for booking with us and coming.</p>
                                <div class = "text-center">
                                    <h4 class="card-title mt-0"><b>Your Services</b></h4>
                                    @foreach($services as $service)
                                        <p>{{$service->name.': '.$service->cost}}</p>
                                    @endforeach
                                    <p></p>
                                    <p>Amount Paid: {{$total - $balance}}</p>
                                    <p>Total Cost: {{$total}}</p>
                                </div>

                                <p>You have already paid a total of {{$total - $balance}}</p>
                                <br><p>Balance to be paid: {{$balance}}</p>
                        <form action="{{url('/payment')}}" method="POST">
                            @csrf
                            <input type="hidden" name="bookingID" value="{{$bookingID}}">
                            <input hidden value = "{{$balance}}" name = "cost">
                            <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Pay with Paypal</button>
                                </div>
                        </form>
                        <form action = "{{url('/completeMpesaPayment')}}" method = "POST">
                            @csrf
                            <input hidden value = "{{$bookingID}}" name = "bookingID">
                            <input hidden value = "{{$balance}}" name = "balance">
                            <div>
                               <button type="submit" class="btn btn-success w-md">Pay with Mpesa</button>
                            </div>
                        </form>
                        <form action = "{{url('/completeCashPayment')}}" method = "POST">
                            @csrf
                            <input hidden value = "{{$bookingID}}" name = "bookingID">
                            <input hidden value = "{{$balance}}" name = "amount">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Pay with Cash</button>
                            </div>
                        </form>


                    </div>
                </div>
            </center>
        </div>
    </div>
    </form>
@endsection
@section('script')
    <!-- masonry pkgd -->
    <script src="{{ URL::asset('/assets/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
@endsection


















{{--<head>--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>--}}
{{--</head>--}}
{{--<style>--}}
{{--    .container2{--}}
{{--        margin: .1% 30% 3%;--}}
{{--        box-sizing: border-box;--}}
{{--        box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;--}}
{{--        padding: 20px;--}}
{{--        overflow: hidden;--}}

{{--    }--}}
{{--</style>--}}
{{--<div class="container2">--}}
{{--    <h3 class = "text-center">Complete Payment</h3>--}}
{{--    <div class="form-outline mb-4">--}}

{{--            <p>Hello {{\App\Http\Controllers\UsersController::getClientName($clientID)}},--}}

{{--            </br>Thank you for booking with us and coming.</p>--}}
{{--            <div class = "text-center">--}}
{{--                <h6 class = "card-title text-center">Your Services</h6>--}}
{{--                @foreach($services as $service)--}}
{{--                    <p>{{$service->name.': '.$service->cost}}</p>--}}
{{--                @endforeach--}}
{{--                <p></p>--}}
{{--                <p>Amount Paid: {{$total - $balance}}</p>--}}
{{--                <p>Total Cost: {{$total}}</p>--}}
{{--            </div>--}}

{{--            <p>You have already paid a total of {{$total - $balance}}</p>--}}
{{--            <br><p>Balance to be paid: {{$balance}}</p>--}}

{{--            <center>--}}

{{--                <form action="{{url('/payment')}}" method="POST">--}}
{{--                    @csrf--}}
{{--                    <input type="hidden" name="bookingID" value="{{$bookingID}}">--}}
{{--                    <input hidden value = "{{$balance}}" name = "cost">--}}
{{--                    <button type="submit" class="btn btn-primary w-md">Pay with Paypal</button>--}}
{{--                </form>--}}
{{--                <form action = "{{url('/completeMpesaPayment')}}" method = "POST">--}}
{{--                    @csrf--}}
{{--                    <input hidden value = "{{$bookingID}}" name = "bookingID">--}}
{{--                    <input hidden value = "{{$balance}}" name = "balance">--}}
{{--                       <button type="submit" class="btn btn-success w-md">Pay with Mpesa</button>--}}
{{--                </form>--}}
{{--                <form action = "{{url('/completeCashPayment')}}" method = "POST">--}}
{{--                    @csrf--}}
{{--                    <input hidden value = "{{$bookingID}}" name = "bookingID">--}}
{{--                    <input hidden value = "{{$balance}}" name = "amount">--}}
{{--                        <button type="submit" class="btn btn-primary w-md">Pay with Cash</button>--}}
{{--                </form>--}}
{{--            </center>--}}
{{--        </div>--}}
{{--            <!-- end card body -->--}}
{{--    </div>--}}
