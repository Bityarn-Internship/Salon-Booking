@extends('layouts.master')


@section('content')

    @component('components.breadcrumb')


        <div class="row">
            <div class="col-xl-6">
                <div class="card d-flex justify-content-center">
                    <div class="card-body">
                        <h5 class="card-title text-center">Booking Details</h5>
                        <form action = "{{ url('/updateBookedService/'.$bookedService->id) }}" method = "post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnameInput" value="{{$bookedService->bookingID}}"  name="bookingID" readonly>
                                        <label for="floatingnameInput">Booking Status</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="formrow-inputState" class="form-label">Service</label>
                                <select id="formrow-inputState" class="form-select" name = "serviceID">
                                    @foreach($services as $service)
                                        <option value="{{$service->id}}">{{$service->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <label for="formrow-inputState" class="form-label">Employee</label>
                                <select id="formrow-inputState" class="form-select" name = "employeeID">
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->firstName}}</option>
                                    @endforeach
                                </select>
                            </div>




                            <center>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Save</button>
                                </div>
                            </center>
                        </form>
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
