<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ynovdocs</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

<style>
    h2 {
    text-align: center;
    position: absolute;
    top: 100px;
    left: 550px;

}

.container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


</style>
</head>
<body>
<h2>Please select your role:</h2>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <img src="assets/img/patient.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <br>
                    <a href="{{ route('login') }}" class="btn btn-primary">Patient</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <img src="assets/img/doctor.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <br>
                    <a href="{{ route('doctor.login.form') }}" class="btn btn-primary">Doctor</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 text-center">
            <div class="card" style="width: 18rem;">
                <img src="assets/img/therapeute.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                <br>
                    <a href="{{ route('therapist.login') }}" class="btn btn-primary">Therapist</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
