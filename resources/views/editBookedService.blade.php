<head>
<link rel="stylesheet" href="{{asset('assets/css/forms.css')}}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action = "{{ url('/updateBookedService/'.$bookedService->id) }}" method = "post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <h5 class=" text-center py-2">Edit Booked Services</h5>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingnameInput" value="{{$bookedService->bookingID}}"  name="bookingID" readonly>
                    <label for="floatingnameInput">Booking Status</label>
                </div>
            </div>
        </div>
        <div class="form-floating mb-3">
            <label for="formrow-inputState" class="form-label">Service</label>
            <select id="formrow-inputState" class="form-select" name = "serviceID">
                @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-floating mb-3">
            <label for="formrow-inputState" class="form-label">Employee</label>
            <select id="formrow-inputState" class="form-select" name = "employeeID">
                @foreach($employees as $employee)
                    <option value="{{$employee->id}}">{{$employee->firstName}}</option>
                @endforeach
            </select>
        </div>




        <center>
            <div>
                <button type="submit" class="btn btn-primary w-md">Save</button>
            </div>
        </center>
    </form>
</body>
