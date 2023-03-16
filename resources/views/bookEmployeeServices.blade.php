<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Booking</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
<form action="{{url('/bookEmployee')}}" method="POST">
    @csrf
    <input hidden value = "{{$bookingID}}" name = "bookingID">
    @foreach($employeeServices as $employeeService)

        <div class="container mt-5 mb-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="card p-3 mb-2">
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"> <i class="bx bxl-mailchimp"></i> </div>
                                <div class="ms-2 c-details">
                                    <h6 class="mb-0">Employee Name </h6> <span>{{\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <h3 class="heading">Service: {{\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)}}</h3>
                            <p class="card-text">To choose this employee tick the checkbox!</p>
                            <center>
                            <input type="checkbox" class="check-service" value = "{{$employeeService->id}}"name = "employeeServices[]">
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <center>
    <button type="submit" class="btn btn-primary w-md ">Submit</button>
    </center>
</form>
</body>






















{{--    <div class=" container">--}}
{{--        <div class=" content">--}}

{{--            <div class="card">--}}
{{--                <div class="card-content">--}}

{{--                    <div class="image">--}}
{{--                        <img src="" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="profession">--}}
{{--                        <span class="name">--}}
{{--                            Employee Name: --}}
{{--                        </span>--}}
{{--                        <br>--}}
{{--                        <span class="name">--}}
{{--                            Service:  --}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--    @endforeach--}}
{{--    <center>--}}
{{--        <div>--}}
{{--        </div>--}}
{{--    </center>--}}
{{--</form>--}}

{{--</section>--}}

{{--</body>--}}














{{--    @csrf--}}
{{--    <h4>Employee Details</h4>--}}
{{--    <select name="services[]" id="services" multiple>--}}
{{--        @foreach($employeeServices as $employeeService)--}}
{{--            <option value="{{$employeeService->id}}">{{\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}


{{--</form>--}}
