@extends('layouts.master')


@section('content')

    @component('components.breadcrumb')


        <div class="row">
            <div class="col-xl-6">
                <div class="card d-flex justify-content-center">
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
        </div>
        <!-- end row -->

@endsection
