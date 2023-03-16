<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Services</title>
    <link rel="stylesheet" href="{{asset('assets/css/forms.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action="{{route('lipa')}}" method="POST">
        @csrf
        <!-- Email input -->
        <div class="container2 justify-content-center">
            <h3 class = "text-center">MPESA Payment</h3>
            <div class="form-outline mb-4">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <div class="alert alert-info">
                    After entering your mpesa number and submitting, you will receive a pop-up on your phone. Kindly input your MPESA pin to complete the transaction.
                </div>
            </div>
            <div class="form-outline mb-4">
                @if($errors->has('bookingID'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('bookingID') }}
                    </div>
                @endif
                <label for="bookingID" class="form-label">Booking ID</label>
                <input type="number" class="form-control" id="bookingID" name = "bookingID" value="{{$bookingID}}" readonly>
            </div>
            <div class="form-outline mb-4">
                @if($errors->has('amount'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <label for="amount" class="form-label">Transaction Amount</label>
                <input type="number" class="form-control" id="amount" name = "amount" value="{{$cost}}" readonly>
            </div>
            <div class="form-outline mb-4">
                @if($errors->has('telephoneNumber'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('telephoneNumber') }}
                    </div>
                @endif
                <label for="telephoneNumber" class="form-label">Telephone Number</label>
                <input type="text" class="form-control" id="telephoneNumber" name = "telephoneNumber">
            </div>
            <div class="text-center ">
                <button type="submit" class="btn btn-primary btn-block ">Submit</button>
            </div>
        </div>
    </form>
</body>
</html>