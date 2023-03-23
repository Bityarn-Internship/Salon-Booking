@extends('custom.common.master-client')

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
                <div class="col-xl-5 mx-auto mt-3">
                    <div class="auth-full-page-content p-md-5 p-4">
                        <div class="w-100">

                            <div class="d-flex flex-column h-100">
                                <div class="my-auto">
                                    <div>
                                        <h5 class="text-primary text-center">User Feedback</h5>
                                    </div>
                                    <div class="mt-4">
                                        <form action = "/feedback" method = "post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class="valid-feedback">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "" name = "firstName">
                                                        <label for="floatingnameInput">First Name</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        @if($errors->has('firstName'))
                                                            {{ $errors->first('firstName') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "" name = "lastName">
                                                        <label for="floatingnameInput">Last Name</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        @if($errors->has('lastName'))
                                                            {{ $errors->first('lastName') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" id="floatingnameInput" value = "" name = "email">
                                                        <label for="floatingnameInput">Email Address</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        @if($errors->has('email'))
                                                            {{ $errors->first('email') }}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <textarea type="text" class="form-control" id="floatingnameInput" name = "message"></textarea>
                                                        <label for="floatingnameInput">Feedback</label>
                                                    </div>

                                                    <div class="invalid-feedback">
                                                        @if($errors->has('message'))
                                                            {{ $errors->first('message') }}
                                                        @endif
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

