@extends('custom.common.master')

@section('title')
    @lang('Services')
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
@endsection


    @section('content')

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-xl-5 mx-auto">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div>
                                        <div>
                                            <h5 class="text-primary text-center">Edit Sevice</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form action = "{{ url('/updateService/'.$service->id) }}" method = "post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    @if($errors->has('message'))
                                                        <div class = "alert alert-info" role = "alert">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('serviceName'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('serviceName') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{$service->name}}" name = "serviceName">
                                                            <label for="floatingnameInput">Service Name</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('serviceCost'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('serviceCost') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="number" class="form-control" id="floatingemailInput" value = "{{$service->cost}}" name = "serviceCost">
                                                            <label for="floatingemailInput">Service Cost</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Submit</button>
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
