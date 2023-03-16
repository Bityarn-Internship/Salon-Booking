<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

</head>
<body>
<form action="{{url('/bookings')}}" method="POST">
    @csrf
    <h4>Service Name</h4>
    <select name="services[]" id="services" multiple>
        @foreach($services as $service)
        <option value="{{$service->id}}">{{$service->name." - ".$service->cost}}</option>
        @endforeach
    </select>
    <label for="date">Date</label>
    <input type="date" name="date">
    <label for="date">Time</label>
    <input type="time" name="time">
    @if(session()->get('user') == 'employee')
        <input hidden type="text" name="clientID" value = "{{$clientID}}">
    @else
        <input hidden type="text" name="clientID" value = "{{Auth::user()->id}}">
    @endif
    <br>
    <div>
        <button type="submit" class="btn btn-primary w-md">Register</button>
    </div>

</form>



</body>


<script>
    new MultiSelectTag('services')  // id
</script>
