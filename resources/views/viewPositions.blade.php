<head>
    @include('layouts.head-css')
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Services</h4>

<table id="servicesView" class="table mb-0">
    <thead>
    <tr>
        <th>ID</th>
        <th>Position Name</th>
        <th>Position Description
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($positions as $position)
        <tr>
            <td>{{$position->id}}</td>
            <td>{{$position->name}}</td>
            <td>{{$position->description}}</td>
            <td>
                <a href="{{url ('editPosition/'.$position->id) }}">Edit</a>
                <a href="{{url ('deletePosition/'.$position->id) }}">Delete</a>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#servicesView').DataTable();
    });
</script>
