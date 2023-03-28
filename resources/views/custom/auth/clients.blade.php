@extends('custom.common.master-without-nav')

@section('title')
    @lang('translation.Register')
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
@endsection

@section('body')

    <body class="auth-body-bg">
    @endsection

    @section('content')

        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-7">
                        <div class="auth-full-bg pt-lg-5 p-4">
                            <div class="w-100">
                                <div class="bg-overlay"></div>
                                <div class="d-flex h-100 flex-column">

                                    <div class="p-4 mt-auto">
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7">

                                                <div class="text-center">

                                                    <h4 class="mb-3"><i
                                                            class="bx bxs-quote-alt-left text-primary h1 align-middle me-3"></i><span
                                                            class="text-primary">5k</span>+ Satisfied clients</h4>

                                                    <div dir="ltr">
                                                        <div class="owl-carousel owl-theme auth-review-carousel"
                                                             id="auth-review-carousel">
                                                            @foreach($feedbacks as $feedback)
                                                                <div class="item">
                                                                    <div class="py-3">
                                                                        <p class="font-size-16 mb-4">" {{$feedback->message}} "</p>

                                                                        <div>
                                                                            <p class="font-size-14 mb-0">- {{$feedback->firstName}}</p>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-xl-5">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="index" class="d-block auth-logo">
                                            <img src="{{ URL::asset('/assets/images/logo-dark.png') }}" alt="" height="18"
                                                 class="auth-logo-dark">
                                            <img src="{{ URL::asset('/assets/images/logo-light.png') }}" alt="" height="18"
                                                 class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">
                                        <div>
                                            <h5 class="text-primary">Register account</h5>
                                        </div>

                                        <div class="mt-4">
                                            <form action = "{{ url('/clients') }}" method = "post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    @if(session()->has('message'))
                                                        <div class="valid-feedback">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        @if($errors->has('firstName'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('firstName') }}
                                                            </div>
                                                        @endif
                                                        <label for="firstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="firstName" name="firstName"
                                                               placeholder="Enter Your First Name">
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        @if($errors->has('lastName'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('lastName') }}
                                                            </div>
                                                        @endif
                                                        <label for="lastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="lastName" name="lastName"
                                                            placeholder="Enter Your Last Name">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        @if($errors->has('email'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                        <label for="email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="email" name="email"
                                                            placeholder="Enter Your Email">
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        @if($errors->has('telephoneNumber'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('telephoneNumber') }}
                                                            </div>
                                                        @endif
                                                        <label for="telephoneNumber" class="form-label">Telephone Number</label>
                                                        <input type="tel" class="form-control" id="telephoneNumber" name="telephoneNumber"
                                                               placeholder="Enter Telephone Number">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 pt-2">
                                                        @if($errors->has('password'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('password') }}
                                                            </div>
                                                        @endif
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control" id="password" name="password"
                                                               placeholder="Enter Your Password">
                                                    </div>
                                                    <div class="col-md-6 pt-2">
                                                        @if($errors->has('confirmPassword'))
                                                            <div class = "alert alert-danger" role = "alert">
                                                                {{ $errors->first('confirmPassword') }}
                                                            </div>
                                                        @endif
                                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                                            placeholder="Confirm Your Password">
                                                    </div>
                                                </div>

                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Register</button>
                                                </div>

                                                <div class="mt-4 text-center">
                                                    <h5 class="font-size-14 mb-3">Sign up using</h5>

                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()"
                                                               class="social-list-item bg-primary text-white border-primary">
                                                                <i class="mdi mdi-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()"
                                                               class="social-list-item bg-info text-white border-info">
                                                                <i class="mdi mdi-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <a href="javascript::void()"
                                                               class="social-list-item bg-danger text-white border-danger">
                                                                <i class="mdi mdi-google"></i>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                            </form>

                                            <div class=" text-center">
                                                <p>Already have an account ? <a href="{{ URL::to('/login') }}"
                                                    class="fw-medium text-primary"> Login</a> </p>
                                            </div>

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
