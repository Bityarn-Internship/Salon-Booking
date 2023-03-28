@extends('layouts.master-without-nav')

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
                                <div class="my-auto">
                                    <div>
                                        <h5 class="text-primary text-center">Edit Feedback</h5>
                                    </div>
                                    <div class="mt-4">
                                        <form action = "{{ url('/updateFeedback/'.$feedback->id) }}" method = "post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class = "alert alert-info" role = "alert">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('firstName'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('firstName') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "{{$feedback->firstName}}" name = "firstName" readonly>
                                                        <label for="floatingnameInput">First Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('lastName'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('lastName') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "{{$feedback->lastName}}" name = "lastName" readonly>
                                                        <label for="floatingnameInput">Last Name</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                @if($errors->has('email'))
                                                    <div class = "alert alert-danger" role = "alert">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                                <div class="col-md-12 pt-2">

                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="floatingnameInput" value = "{{$feedback->email}}" name = "email" readonly>
                                                        <label for="floatingnameInput">Email Address</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('message'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('message') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="tel" class="form-control" id="floatingnameInput" value = "{{$feedback->message}}" name = "message" readonly>
                                                        <label for="floatingnameInput">Feedback</label>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class = "row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "status">
                                                                <option value="Poor">Poor</option>
                                                                <option value="Good">Good</option>
                                                        </select>
                                                        <label for="floatingSelectGrid">Update Status</label>
                                                        <div class="invalid-feedback">
                                                            @if($errors->has('status'))
                                                                {{ $errors->first('status') }}
                                                            @endif
                                                        </div>
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

