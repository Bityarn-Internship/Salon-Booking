<head>
    @include('layouts.head-css')
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="card-title text-center">View Paypal Payments</h4>

<table id="paypalView" class="table mb-0">
    <thead>
    <tr>
        <th>Payment ID</th>
        <th>Payer ID</th>
        <th>Payer Email</th>
        <th>Booking ID</th>
        <th>Total Cost </th>
        <th>Currency </th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    @foreach($paypalpayments as $paypalpayment)
        <tr>
            <td>{{ $paypalpayment-> payment_id }}</td>
            <td>{{ $paypalpayment-> payer_id }}</td>
            <td>{{ $paypalpayment-> payer_email }}</td>
            <td>{{ $paypalpayment-> bookingID }}</td>
            <td>{{ $paypalpayment-> amount }}</td>
            <td>{{ $paypalpayment-> currency }}</td>
            <td><a class="deletebutton" href="{{url ('deletePaypalPayment/'.$paypalpayment->id) }}">Delete</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#paypalView').DataTable();
    });
</script>
