<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
<link rel="stylesheet" href="{{asset("assets/css/style.css")}}">
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
<script src="{{asset("assets/js/booking.js")}}" defer></script>
</head>
<body>
<form action="{{url('/bookings')}}" method="POST">
<h4>Service Name</h4>
    <select name="services" id="services" multiple>
        @foreach($services as $service)
        <option value="{{$service->id}}">{{$service->name." - ".$service->cost}}</option>
        @endforeach
    </select>
    <label for="date">Date</label>
    <input type="date" name="date">

    <br>
    <input type="submit">
</form>
{{--<div class="container2">--}}
{{--    <label for="time">Time</label>--}}
{{--    <input type="time" class="time" name="time">--}}
{{--</div>--}}
{{--<div class="container">--}}
{{--    <div class="calendar">--}}
{{--        <div class="calendar-header">--}}
{{--            <span class="month-picker" id="month-picker"> May </span>--}}
{{--            <div class="year-picker" id="year-picker">--}}
{{--            <span class="year-change" id="pre-year">--}}
{{--              <pre><</pre>--}}
{{--            </span>--}}
{{--                <span id="year">2020 </span>--}}
{{--                <span class="year-change" id="next-year">--}}
{{--              <pre>></pre>--}}
{{--            </span>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="calendar-body">--}}
{{--            <div class="calendar-week-days">--}}
{{--                <div>Sun</div>--}}
{{--                <div>Mon</div>--}}
{{--                <div>Tue</div>--}}
{{--                <div>Wed</div>--}}
{{--                <div>Thu</div>--}}
{{--                <div>Fri</div>--}}
{{--                <div>Sat</div>--}}
{{--            </div>--}}
{{--            <div class="calendar-days">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="calendar-footer">--}}
{{--        </div>--}}
{{--        <div class="date-time-formate">--}}
{{--            <div class="day-text-formate">TODAY</div>--}}
{{--            <div class="date-time-value">--}}
{{--                <div class="time-formate">02:51:20</div>--}}
{{--                <div class="date-formate">23 - july - 2022</div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="month-list"></div>--}}
{{--    </div>--}}
{{--</div>--}}


</body>


<script>
    new MultiSelectTag('services')  // id
</script>
