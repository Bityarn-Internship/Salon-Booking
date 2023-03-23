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
                                            <h5 class="text-primary text-center">Edit Employee</h5>
                                        </div>
                                        <div class="mt-4">
                                            <form action = "{{ url('/updateEmployee/'.$employee->id) }}" method = "post" enctype="multipart/form-data">
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
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{$employee->firstName}}" name = "firstName">
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
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{$employee->lastName}}" name = "lastName">
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
                                                            <input type="email" class="form-control" id="floatingnameInput" value = "{{$employee->email}}" name = "email">
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
                                                            <input type="tel" class="form-control" id="floatingnameInput" value = "{{$employee->telephoneNumber}}" name = "telephoneNumber">
                                                            <label for="floatingnameInput">Telephone Number</label>
                                                        </div>

                                                        <div class="invalid-feedback">
                                                            @if($errors->has('telephoneNumber'))
                                                                {{ $errors->first('telephoneNumber') }}
                                                            @endif
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
                                                        @if($errors->has('IDNumber'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $errors->first('IDNumber') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" id="floatingnameInput" value = "{{$employee->IDNumber}}" name = "IDNumber">
                                                            <label for="floatingnameInput">ID Number / Passport Number</label>
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
                                                <div class = "row">
                                                    <div class="col-md-12 pt-2">
                                                        @if($errors->has('positionID'))
                                                            <div class="alert alert-danger" role="alert">
                                                                {{ $errors->first('positionID') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-floating mb-3">
                                                            <select class="form-select" id="floatingSelectGrid" aria-label="Floating label select example" name = "positionID">
                                                                @foreach($positions as $position)
                                                                    <option value="{{$position->id}}">{{$position->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="floatingSelectGrid">Select a position</label>
                                                            <div class="invalid-feedback">
                                                                @if($errors->has('positionID'))
                                                                    {{ $errors->first('positionID') }}
                                                                @endif
                                                            </div>
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

