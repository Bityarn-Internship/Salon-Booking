<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<body>
<section>

<form action="{{url('/bookEmployee')}}" method="POST">
    @csrf
    <input hidden value = "{{$bookingID}}" name = "bookingID">
    @foreach($employeeServices as $employeeService)
    <div class=" container">
        <div class=" content">

            <div class="card">
                <div class="card-content">

                    <div class="image">
                        <img src="" alt="">
                    </div>
                    <div class="profession">
                        <span class="name">
                            Employee Name: {{\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)}}
                        </span>
                        <br>
                        <span class="name">
                            Service:  {{\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)}}
                        </span>
                    </div>
                    <div>
                        <input type="checkbox" class="check-service" value = "{{$employeeService->id}}"name = "employeeServices[]">
                    </div>
                </div>

            </div>
        </div>

    </div>
    @endforeach
    <center>
        <div>
            <button type="submit" class="btn btn-primary w-md">Submit</button>
        </div>
    </center>
</form>

</section>

</body>














{{--    @csrf--}}
{{--    <h4>Employee Details</h4>--}}
{{--    <select name="services[]" id="services" multiple>--}}
{{--        @foreach($employeeServices as $employeeService)--}}
{{--            <option value="{{$employeeService->id}}">{{\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)}}</option>--}}
{{--        @endforeach--}}
{{--    </select>--}}


{{--</form>--}}
