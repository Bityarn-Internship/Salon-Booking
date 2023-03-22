@extends('custom.common.master-client')

@section('content')


    <form action="{{url('/bookEmployee')}}" method="POST">
        @csrf
        <input hidden value = "{{$bookingID}}" name = "bookingID">
    <center>
        <div class="row mx-5 mt-5 mb-1">
        @foreach($employeeServices as $employeeService)
        <div class="col-md-6 col-xl-4">

            <!-- Simple card -->
            <div class="card mt-5">
                <img class="card-img-top img-fluid" src="{{ URL::asset('/assets/images/small/img-1.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title mt-0">Employee Name: <span>{{\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)}}</span></h4>
                    <h4 class="card-title mt-0">Service Offered: {{\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)}}</h4>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" value = "{{$employeeService->id}}"name = "employeeServices[]">
                        <label class="form-check-label" for="flexSwitchCheckDefault">To choose this employee toggle the checkbox!</label>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </center>
    <center>
    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
    </center>
    </form>
@endsection
@section('script')
    <!-- masonry pkgd -->
    <script src="{{ URL::asset('/assets/libs/masonry-layout/masonry.pkgd.min.js') }}"></script>
@endsection


























