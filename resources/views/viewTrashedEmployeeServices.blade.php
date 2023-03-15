<head>
    @include('layouts.head-css')
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Trashed Employee Services</h4>
<div class="col col-md-11 text-right">
    <h3><a href="{{url('restoreEmployeeServices') }}"><b>Restore All</b></a></h3>
</div>
<table id="employeeServicesView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Employee Name</th>
        <th>Service Name</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employeeServices as $employeeService)
        <tr>

            <td>{{$employeeService->id}}</td>
            <td>{{\App\Http\Controllers\EmployeesController::getEmployeeName($employeeService->employeeID)}}</td>
            <td>{{\App\Http\Controllers\ServicesController::getServiceName($employeeService->serviceID)}}</td>
            <td><a href="{{url ('restoreEmployeeService/'.$employeeService->id) }}">Restore</a></td>
        </tr>
    @endforeach

    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#employeeServicesView').DataTable();
    });
</script>
