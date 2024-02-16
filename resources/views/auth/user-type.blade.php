<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ynovdocs</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 300px;
            border: none;
            transition: transform 0.3s ease-in-out;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card-img-top {
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }
        .btn-primary {
            width: 100%;
            border-radius: 0;
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-group {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="assets/img/patient.jpg" class="card-img-top" alt="Patient">
                <div class="card-body">
                    <h5 class="card-title">Patient</h5>
                    <p class="card-text">Login as a patient to access your account.</p>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="assets/img/doctor.jpg" class="card-img-top" alt="Doctor">
                <div class="card-body">
                    <h5 class="card-title">Doctor</h5>
                    <p class="card-text">Login as a doctor to access your account.</p>
                    <a href="{{ route('doctor.login.form') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="assets/img/therapeute.jpg" class="card-img-top" alt="Therapist">
                <div class="card-body">
                    <h5 class="card-title">Therapist</h5>
                    <p class="card-text">Login as a therapist to access your account.</p>
                    <a href="{{ route('therapist.login') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
