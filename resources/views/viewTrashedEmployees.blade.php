<head>
    @include('layouts.head-css')
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Trashed Positions</h4>
<div class="col col-md-11 text-right">
    <h3><a href="{{url('restoreEmployees') }}"><b>Restore All</b></a></h3>
</div>
<table id="positionsView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Telephone Number</th>
        <th>ID Number</th>
        <th>Position ID</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $employee)
        <tr>
            <td>{{$employee->id}}</td>
            <td>{{$employee->firstName}}</td>
            <td>{{$employee->lastName}}</td>
            <td>{{$employee->email}}</td>
            <td>{{$employee->telephoneNumber}}</td>
            <td>{{$employee->IDNumber}}</td>
            <td>{{$employee->positionID}}</td>
            <td><a href="{{url ('restoreEmployee/'.$employee->id) }}">Restore</a></td>

        </tr>
    @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#positionsView').DataTable();
    });
</script>
