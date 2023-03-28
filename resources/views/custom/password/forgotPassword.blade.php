@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Recover_Password')
@endsection

@section('body')

    @endsection

    @section('content')
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-8">
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

                    <div class="col-xl-4">
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
                                            <h5 class="text-primary"> Reset Password</h5>
                                            <p class="text-muted">Re-Password with Skote.</p>
                                        </div>

                                        <div class="mt-4">
                                            <div class="alert alert-success text-center mb-4" role="alert">
                                                Enter your Email and instructions will be sent to you!
                                            </div>
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class="alert alert-info" role="alert">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <form class="form-horizontal" action="{{url('/sendResetLink')}}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="useremail" class="form-label">Email</label>
                                                    <input type="email" class="form-control" value="{{old ('email')}}" name="email"
                                                           placeholder="Enter email">
                                                    @if ($errors->has('email'))
                                                        <span style="color: red;" class="text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>

                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                            type="submit">Reset</button>
                                                </div>

                                            </form>
                                            <div class="mt-5 text-center">
                                                <p>Remember It ? <a href="login" class="fw-medium text-primary"> Sign
                                                        In here</a> </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p>© <script>
                                                document.write(new Date().getFullYear())

                                            </script> Designed and Developed by Bityarn Consult.</p>
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
