<head>
    @include('layouts.head-css')
</head>

                <h4 class="card-title text-center">View Services</h4>

                    <table id="servicesView" class="table mb-0">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Service Name</th>
                            <th>Cost</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @if(count($services) > 0 )--}}
{{--                        @foreach($services as $service)--}}
{{--                        <tr>--}}
{{--                            <td>{{$service->id}}</td>--}}
{{--                            <td>{{$service->serviceName}}</td>--}}
{{--                            <td>{{$service->serviceCost}}</td>--}}
{{--                        </tr>--}}
{{--                        @endforeach--}}
{{--                        @else--}}
{{--                        <tr>--}}
{{--                            <td colspan="6"class="text-center"><b>No Services Found</b></td>--}}
{{--                        </tr>--}}
{{--                        @endif--}}
                        </tbody>
                    </table>
    <script>
        $(document).ready(function (){
            $('#servicesView').DataTable();
        });
    </script>
