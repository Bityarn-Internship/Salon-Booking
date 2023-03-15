<head>
    @include('layouts.head-css')
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Trashed Bookings</h4>
<div class="col col-md-11 text-right">
    <h3><a href="{{url('restoreBookings') }}"><b>Restore All</b></a></h3>
</div>
<table id="bookingsView" class="table mb-0">
<thead>
    <tr>
        <th>ID</th>
        <th>Client Name</th>
        <th>Date</th>
        <th>Time</th>
        <th>Cost</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bookings as $booking)
        <tr>
            <td>{{$booking->id}}</td>
            <td>{{\App\Http\Controllers\UsersController::getClientName($booking->clientID)}}</td>
            <td>{{$booking->date}}</td>
            <td>{{$booking->time}}</td>
            <td>{{$booking->cost}}</td>
            <td>{{$booking->status}}</td>
            <td><a href="{{url ('restoreBooking/'.$booking->id) }}">Restore</a></td>

        </tr>
    @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#bookingsView').DataTable();
    });
</script>
