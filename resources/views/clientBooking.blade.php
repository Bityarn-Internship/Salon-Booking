<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script src="{{asset('assets/js/booking.js')}}" defer></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<form action="{{url('/clientBooking')}}" method="POST">
    @csrf
    <div class = "row">
        <div class="col-md-6">
            <label for="formGroupExampleInput" class="form-label">First Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter first name" name = "firstName">
        </div>
        <div class="col-md-6">
            <label for="formGroupExampleInput2" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Enter last name" name = "lastName">
        </div>
    </div>
    <div class = "row">
        <div class="col-md-6">
            <label for="formGroupExampleInput" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Enter email address" name = "email">
        </div>
        <div class="col-md-6">
            <label for="formGroupExampleInput2" class="form-label">Telephone Number</label>
            <input type="tel" class="form-control" id="formGroupExampleInput2" placeholder="Enter telephone number" name = "telephoneNumber">
        </div>
    </div>
    <br/>
    <div class = "row">
        <label>Service Name</label>
        <select name="services[]" id="services" multiple>
            @foreach($services as $service)
            <option value="{{$service->id}}">{{$service->name." - ".$service->cost}}</option>
            @endforeach
        </select>
    </div>
    <br/><br/>
    <div class = "row">
        <div class="col-12">
            <label for="date">Date</label>
            <input type="date" name="date">

            <label for="date">Time</label>
            <input type="time" name="time">
        </div>

    <br><br/>
    <div>
        <button type="submit" class="btn btn-primary w-md">Register</button>
    </div>

</form>



</body>


<script>
    new MultiSelectTag('services')  // id
</script>
