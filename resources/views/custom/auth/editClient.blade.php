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
                                            <h5 class="text-primary text-center">Edit Client</h5>
                                        </div>
                                        <div class="mt-4">
                                            <form action = "{{ url('/updateClient/'.$client->id) }}" method = "post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    @if(session()->has('message'))
                                                        <div class="alert alert-info" role="alert">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('firstName'))
                                                            <div class="alert alert-danger" role="alert">
                                                            {{ $errors->first('firstName') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{$client->firstName}}" name = "firstName">
                                                            <label for="floatingnameInput">First Name</label>
                                                        </div>


                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @if(session()->has('message'))
                                                        <div class="alert alert-info" role="alert">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('lastName'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $errors->first('lastName') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{$client->lastName}}" name = "lastName">
                                                            <label for="floatingnameInput">Last Name</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @if(session()->has('message'))
                                                        <div class="alert alert-info" role="alert">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('email'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="email" class="form-control" id="floatingnameInput" value = "{{$client->email}}" name = "email">
                                                            <label for="floatingnameInput">Email Address</label>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    @if(session()->has('message'))
                                                        <div class="alert alert-info" role="alert">
                                                            {{ session()->get('message') }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('telephoneNumber'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $errors->first('telephoneNumber') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="tel" class="form-control" id="floatingnameInput" value = "{{$client->telephoneNumber}}" name = "telephoneNumber">
                                                            <label for="floatingnameInput">Telephone Number</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4 d-grid">
                                                    <button class="btn btn-primary waves-effect waves-light"
                                                        type="submit">Save</button>
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

