<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <title>Salon | Make a Booking</title>
    <link rel="stylesheet" href="{{asset('assets/css/forms.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
<form action="{{url('/bookings')}}" method="POST">
    @csrf
    <h4 class = "text-center">Make Booking</h4>
    <div class = "mb-3">
        @if($errors->has('services'))
            <div class = "alert alert-danger" role = "alert">
                {{ $errors->first('services') }}
            </div>
        @endif
        <div class="row mb-3">
            <label for="formrow-inputState" class="form-label">Select all services you would like to receive: </label>
            <select name="services[]" id="services" multiple>
                @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->name." - ".$service->cost}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class = "row mb-3">
        <div class="col-md-6">
            @if($errors->has('date'))
                <div class = "alert alert-danger" role = "alert">
                    {{ $errors->first('date') }}
                </div>
            @endif
            <input type="date" class="form-control" name="date">
        </div>
        <div class="col-md-6">
            @if($errors->has('time'))
                <div class = "alert alert-danger" role = "alert">
                    {{ $errors->first('time') }}
                </div>
            @endif
            <input type="time" name="time" class = "form-control">
        </div>
    </div>

    <div class = "mb-3">
        @if(session()->get('user') == 'employee')
            <input hidden type="text" name="clientID" value = "{{$clientID}}">
        @else
            <input hidden type="text" name="clientID" value = "{{Auth::user()->id}}">
        @endif
    </div>

    <div class = "text-center">
        <button type="submit" class="btn btn-primary w-md">Book</button>
    </div>

</form>



</body>


<script>
    new MultiSelectTag('services')  // id
</script>
