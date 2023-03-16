<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/090dc3fb10.js" crossorigin="anonymous"></script>
</head>
<main>
    <div id = "payments" class = "text-center">
        <i class="fa-sharp fa-solid fa-circle-check"></i>
        <h2>Payment Successful!</h2>
        <h6>Hurray! Your payment has been made <span class = "green-color">successfully</span>.</h6>
        <div class = "btns text-center">
            <a href = "{{ URL::to('/viewBookings') }}"><button>Done</button></a>
        </div>
    </div>
</main>