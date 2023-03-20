<h3>Thank you for booking with us!</h3>

<p>{!! $body !!}</p>
<h4>Booked Services:</h4>
@foreach($bookedServices as $bookedService)
    <p>{!! \App\Http\Controllers\ServicesController::getServiceName($bookedService->serviceID).' service offered by '.\App\Http\Controllers\EmployeesController::getEmployeeName($bookedService->employeeID) !!}</p>
@endforeach

<p>Thank you!</p>

Regards,<br/>Salon Booking System