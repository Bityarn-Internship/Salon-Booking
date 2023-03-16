<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon | Register Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/forms.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>
    <form action = "{{ url('/clients') }}" method = "post" enctype="multipart/form-data">
    @csrf
        <h5 class="card-title text-center">Client Details</h5><br/>
        <div class="row">
            <div class="col-md-6">
                @if($errors->has('firstName'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('firstName') }}
                    </div>
                @endif
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Your First Name" name="firstName">
                    <label for="floatingnameInput">First Name</label>
                </div>
            </div>
            <div class="col-md-6">
                @if($errors->has('lastName'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('lastName') }}
                    </div>
                @endif
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter Your Last Name" name="lastName">
                    <label for="floatingnameInput">Last Name</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if($errors->has('email'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingnameInput" placeholder="Enter Your Email" name="email">
                    <label for="floatingnameInput">Email</label>
                </div>
            </div>
            <div class="col-md-6">
                @if($errors->has('telephoneNumber'))
                    <div class = "alert alert-danger" role = "alert">
                        {{ $errors->first('telephoneNumber') }}
                    </div>
                @endif
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="floatingnameInput" placeholder="Enter Your Telephone Number" name="telephoneNumber">
                    <label for="floatingnameInput">Telephone Number</label>
                </div>
            </div>
        </div>

        <div class="form-floating mb-3">
            @if($errors->has('password'))
                <div class = "alert alert-danger" role = "alert">
                    {{ $errors->first('password') }}
                </div>
            @endif
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingnameInput" placeholder="Enter the password..." name="password">
                <label for="floatingnameInput">Password</label>
            </div>
        </div>

        <div class="form-floating mb-3">
            @if($errors->has('confirmPassword'))
                <div class = "alert alert-danger" role = "alert">
                    {{ $errors->first('confirmPassword') }}
                </div>
            @endif
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingemailInput" placeholder="Enter the cost..." name="confirmPassword">
                <label for="floatingemailInput">Confirm Password</label>
            </div>
        </div>
        <center>
            <div>
                <button type="submit" class="btn btn-primary w-md">Register</button>
            </div>
        </center>
    </form>
    
</body>
</html>
