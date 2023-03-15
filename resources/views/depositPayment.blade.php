@extends('layouts.master')


@section('content')

@component('components.breadcrumb')


<div class="row">
    <div class="col-xl-6">
        <div class="card d-flex justify-content-center">
            <div class="card-body">
                <h5 class="card-title text-center">Make a Deposit Payment</h5>
                <p>Hello {{Auth::user()->firstName}},</br>Thank you for booking with us.</p>
                <div class = "text-center">
                    <h6 class = "card-title text-center">Your Services</h6>
                    @foreach($services as $service)
                        {{$service->name.': '.$service->cost}}
                    @endforeach
                    <p></p>
                    <p>Total Cost: {{$cost}}</p>
                </div>

                <p>To reserve a booking for your services, you need to make a 20% payment of your booked services cost.</p>
                <br><p>Deposit Cost: {{(0.2 * $cost)}}</p>
                
                <center>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Pay with paypal</button>
                    </div><br/>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Pay with MPESA</button>
                    </div>
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
