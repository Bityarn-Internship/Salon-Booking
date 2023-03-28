@extends('custom.common.master-client')

@section('title')
    @lang('Booking')
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/assets/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
@endsection

@section('body')

    <body class="auth-body-bg">
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
                                        <h5 class = "text-primary text-center">Make a Booking</h5>
                                    </div>

                                    <div class="mt-4">
                                        <form action = "{{ url('/bookings') }}" method = "post" enctype="multipart/form-data">
                                            @csrf
                                            <div class = "row">
                                                @if(session()->has('message'))
                                                    <div class = "alert alert-info" role = "alert">
                                                        {{ session()->get('message') }}
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 pt-2">
                                                    <form action="/bookings" method="GET">
                                                        <label for="services" class="form-check-label">Filter by service category: </label>
                                                        <br>
                                                        @foreach($serviceCategories as $serviceCategory)
                                                            <input class="form-check-input" type="checkbox" name="serviceCategory" value="{{$serviceCategory->id}}">
                                                            <label class="form-check-label" for="flexCheckDefault">{{$serviceCategory->name}}</label>
                                                        @endforeach
                                                    </form>
                                                </div>
                                                <div class="col-md-12 pt-2">
                                                    @if($errors->has('services'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('services') }}
                                                        </div>
                                                    @endif
                                                    <label for="services" class="form-label">Select all the services that apply: </label>
                                                    <select name="services[]" id="services" multiple>
                                                        @foreach($services as $service)
                                                            <option value="{{$service->id}}">{{$service->name." - ".$service->cost}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div><br/>
                                            <div class="row">
                                                <div class="col-md-6 pt-2">
                                                    @if($errors->has('date'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('date') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="date" class="form-control" id="demo" placeholder="Select a date..." name = "date">
                                                        <label for="floatingemailInput">Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pt-2">
                                                    @if($errors->has('time'))
                                                        <div class = "alert alert-danger" role = "alert">
                                                            {{ $errors->first('time') }}
                                                        </div>
                                                    @endif
                                                    <div class="form-floating mb-3">
                                                        <input type="time" class="form-control" id="floatingemailInput" placeholder="Select a time..." name = "time">
                                                        <label for="floatingemailInput">Time</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class = "row">
                                                @if(session()->get('user') == 'employee')
                                                    <input hidden type="text" name="clientID" value = "{{$clientID}}">
                                                @else
                                                    <input hidden type="text" name="clientID" value = "{{Auth::user()->id}}">
                                                @endif
                                            </div>

                                            <div class="mt-4 d-grid">
                                                <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Book</button>
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
    <script>
        var date = new Date();
        var tdate = date.getDate();
        var month = date.getMonth() + 1;
        if (date < 10) {
            date = "0" + date;
        }
        if (month < 10) {
            month = "0" + month
        }
        var year = date.getUTCFullYear() - 0;
        var minDate = year + "-" + month + "-" + tdate;
        document.getElementById("demo").setAttribute("min", minDate);
        console.log(minDate);
    </script>






@endsection
@section('script')
    <!-- owl.carousel js -->
    <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
    <!-- auth-2-carousel init -->
    <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('services')  // id
    </script>
@endsection
