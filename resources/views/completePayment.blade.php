@extends('layouts.master')


@section('content')

@component('components.breadcrumb')


<div class="row">
    <div class="col-xl-6">
        <div class="card d-flex justify-content-center">
            <div class="card-body">
                <h5 class="card-title text-center">Complete Payment</h5>
                
                <p>Hello {{\App\Http\Controllers\UsersController::getClientName($clientID)}},

                </br>Thank you for booking with us and coming.</p>
                <div class = "text-center">
                    <h6 class = "card-title text-center">Your Services</h6>
                    @foreach($services as $service)
                        <p>{{$service->name.': '.$service->cost}}</p>
                    @endforeach
                    <p></p>
                    <p>Amount Paid: {{$total - $balance}}</p>
                    <p>Total Cost: {{$total}}</p>
                </div>

                <p>You have already paid a total of {{$total - $balance}}</p>
                <br><p>Balance to be paid: {{$balance}}</p>

                <center>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Pay with paypal</button>
                    </div><br/>
                    <form action = "{{url('/completeMpesaPayment')}}" method = "POST">
                        @csrf
                        <input hidden value = "{{$bookingID}}" name = "bookingID">
                        <input hidden value = "{{$balance}}" name = "balance">
                        <div>
                            <button type="submit" class="btn btn-success w-md">Pay with MPESA</button>
                        </div>
                    </form>
                    <form action = "{{url('/completeCashPayment')}}" method = "POST">
                        @csrf
                        <input hidden value = "{{$bookingID}}" name = "bookingID">
                        <input hidden value = "{{$balance}}" name = "amount">
                        <div><br/>
                            <button type="submit" class="btn btn-primary w-md">Paid with cash</button>
                        </div><br/>
                    </form>
                </center>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->

    <!-- end col -->
</div>
<!-- end row -->

@endsection
