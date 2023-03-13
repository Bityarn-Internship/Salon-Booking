@extends('layouts.master')


@section('content') 

@component('components.breadcrumb')


<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">E</h5>
                <form>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter the service...">
                        <label for="floatingnameInput">Service Name</label>
                    </div>
                
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingemailInput" placeholder="Enter the cost...">
                        <label for="floatingemailInput">Service Cost</label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->

</div>
<!-- end row -->

    <!-- end col -->
</div>
<!-- end row -->

@endsection 