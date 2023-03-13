@extends('layouts.master')


@section('content')

    @component('components.breadcrumb')


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Services</h5>
                        <form method = "POST" action = "{{ url('/updateService/'.$service->id) }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the service..." name = "serviceName">
                                <label for="floatingnameInput">Service Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingemailInput" placeholder="Enter the cost..." name = "serviceCost">
                                <label for="floatingemailInput">Service Cost</label>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->

        </div>
        <!-- end row -->

        </div>
        <!-- end row -->

@endsection
