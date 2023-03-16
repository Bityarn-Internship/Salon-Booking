<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href = "//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel = "stylesheet">
</head>

<h4 class="text-center py-2">View Paypal Payments</h4>
<div class="container ">
    <div class="row">
        <table id="paypalView" class="table table-striped" style="width:100%">
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
                    <td><a class="btn btn-danger" href="{{url ('deletePaypalPayment/'.$paypalpayment->id) }}">Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src = "//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function (){
        $('#paypalView').DataTable();
    });
</script>
