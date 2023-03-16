<head>
    @include('layouts.head-css')
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Clients</h4>

<table id="clientsView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Telephone Number</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->firstName}}</td>
            <td>{{$client->lastName}}</td>
            <td>{{$client->email}}</td>
            <td>{{$client->telephoneNumber}}</td>
            <td>
                <a href="{{url ('editClient/'.$client->id) }}">Edit</a>
                <a href="{{url ('deleteClient/'.$client->id) }}">Delete</a>
                <a href="{{url ('bookings/'.$client->id) }}">Make a booking</a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#clientsView').DataTable();
    });
</script>
