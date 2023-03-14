@extends('layouts.master')


@section('content')

    @component('components.breadcrumb')


        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Position</h5>
                        <form action = "{{ url('/updatePosition/'.$position->id) }}" method = "post">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingnameInput" value="{{$position->name}}"  placeholder="Enter the position..." name = "positionName">
                                <label for="floatingnameInput">Position Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingemailInput" value="{{$position->description}}"  placeholder="Describe the position..." name = "positionDescription">
                                <label for="floatingemailInput">Position Description</label>
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
