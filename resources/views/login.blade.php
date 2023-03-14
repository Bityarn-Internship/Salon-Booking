@extends('layouts.master')


@section('content')

    @component('components.breadcrumb')

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
{{--        <form>--}}
{{--            <!-- Email input -->--}}
{{--        <div class="container">--}}
{{--            <div class="col-md-6">--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <label class="form-label" for="form1Example1">Email address</label>--}}
{{--                <input type="email" id="form1Example1" class="form-control" />--}}
{{--            </div>--}}
{{--            </div>--}}

{{--            <!-- Password input -->--}}
{{--            <div class="col-md-6">--}}
{{--            <div class="form-outline mb-4">--}}
{{--                <label class="form-label" for="form1Example2">Password</label>--}}
{{--                <input type="password" id="form1Example2" class="form-control" />--}}
{{--            </div>--}}
{{--            </div>--}}

{{--            <!-- 2 column grid layout for inline styling -->--}}
{{--            <div class="row mb-4">--}}
{{--                <div class="col d-flex justify-content-center">--}}
{{--                </div>--}}

{{--                <div class="col">--}}
{{--                    <!-- Simple link -->--}}
{{--                    <a class="text-right" href="#!">Forgot password?</a>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <!-- Submit button -->--}}
{{--            <button type="submit" class="btn btn-primary btn-block">Sign in</button>--}}
{{--        </div>--}}

{{--        </form>--}}

    <div class="container">
                <div>
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <form action="{{ url('/login') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="floatingnameInput" name="email" placeholder="Enter Your Email">
                                    <label for="floatingnameInput">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="floatingnameInput" name="password" placeholder="Enter Your password...">
                                    <label for="floatingnameInput">Password</label>
                                </div>
                            </div>

                            <center>
                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Login</button>
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

        <!-- end row -->
    </div>

@endsection
