@extends('custom.common.master-without-nav')

@section('content')


    <form action="{{url('/bookEmployee')}}" method="POST">
        @csrf
        <input hidden value = "{{$bookingID}}" name = "bookingID">
    <div class="row mx-2 my-2">
        @foreach($employeeServices as $employeeService)
        <div class="col-md-6 col-xl-3">

            <!-- Simple card -->
            <div class="card">
                <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mt-0">Employee Name: <span>{{\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)}}</span></h4>
                    <h4 class="card-title mt-0">Service Offered: {{\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)}}</h4>
                    <p class="card-text">To choose this employee tick the checkbox!</p>
                    <input type="checkbox" class="check-service" value = "{{$employeeService->id}}"name = "employeeServices[]">

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <center>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </center>
    </form>
@endsection
@section('script')
    <!-- masonry pkgd -->
    <script src="{{ URL::asset('/assets/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
@endsection


























