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
                                <div >
                                    <div>
                                        <h5 class="text-primary text-center">Edit Service Category</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "{{ url('/updateServiceCategory/'.$serviceCategory->id) }}" method = "post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                @if(session()->has('message'))
                                                    <div class = "alert alert-info" role = "alert">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="row">
                                                @if($errors->has('categoryID'))
                                                    <div class = "alert alert-danger" role = "alert">
                                                        {{ $errors->first('categoryID') }}
                                                    </div>
                                                @endif
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "{{$serviceCategory->id}}" name = "categoryID" readonly>
                                                        <label for="floatingnameInput">Service Category ID</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row">
                                                @if($errors->has('categoryName'))
                                                    <div class = "alert alert-danger" role = "alert">
                                                        {{ $errors->first('categoryName') }}
                                                    </div>
                                                @endif
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingnameInput" value = "{{$serviceCategory->name}}" name = "categoryName">
                                                        <label for="floatingnameInput">Service Category Name</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                @if($errors->has('categoryDescription'))
                                                    <div class = "alert alert-danger" role = "alert">
                                                        {{ $errors->first('categoryDescription') }}
                                                    </div>
                                                @endif
                                                <div class="col-md-12 pt-2">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingemailInput" value = "{{$serviceCategory->description}}" name = "categoryDescription">
                                                        <label for="floatingemailInput">Service Category Description</label>
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
