
@extends('layouts.master-without-nav')

@section('content')


        <div class="row mx-2 my-2">
                <div class="col-md-6">

                    <!-- Simple card -->
<center>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-0">Make a Deposit Payment</h4>
                            <p class="card-title mt-0">Hello {{Auth::user()->firstName." ".Auth::user()->lastName}},</br>Thank you for booking with us.</p>
                            <h4 class="card-title mt-0"><b>Your Requested Services:</b></h4>
                              @foreach($services as $service)
                                    <p>{{$service->name.': '.$service->cost}}KSH</p>
                                @endforeach
                                <p></p>
                                <p>Total Cost: {{$cost}}KSH</p>
                            <p>To confirm your booking you need to make a <b>20%</b> deposit payment of your booked services cost.</p>
                            <br>
                            <p><b>Deposit Cost: {{(0.2 * $cost)}}KSH</b></p>

                            <center>
                                <form action="{{url('/payment')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="bookingID" value="{{$bookingID}}">
                                    <input type="hidden" name="cost" value="{{(0.2 * $cost)}}">
                                    <button type="submit" class="btn btn-primary w-md">Pay with paypal</button>
                                </form>

                                <br/>
                                <form action = "{{url('/mpesaPayment')}}" method = "POST">
                                    @csrf
                                    <input hidden value = "{{$bookingID}}" name = "bookingID">
                                    <input hidden value = "{{$cost}}" name = "cost">
                                    <div>
                                        <button type="submit" class="btn btn-success w-md">Pay with MPESA</button>
                                    </div>
                                </form>

                            </center>
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



