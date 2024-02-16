<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ynovdocs</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 960px;
        }

        .booking-form {
            margin-top: 100px;
            background-color: #fff;
            padding: 30px;
            border-radius: 4px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .booking-form .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .booking-form .form-control {
            border-radius: 4px;
            border: none;
            height: 40px;
            color: #3e485c;
            font-size: 14px;
            padding: 10px;
            transition: border 0.2s;
        }

        .booking-form .form-control:hover,
        .booking-form .form-control:focus {
            border: 1px solid #1e62d8;
        }

        .booking-form .form-label {
            display: inline-block;
            color: #3e485c;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .booking-form .submit-btn {
            display: inline-block;
            color: #fff;
            background-color: #1e62d8;
            font-weight: 700;
            padding: 14px 30px;
            border-radius: 4px;
            border: none;
            transition: 0.2s all;
            margin-top: 10px;
        }

        .booking-form .submit-btn:hover,
        .booking-form .submit-btn:focus {
            opacity: 0.9;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="booking-form">
                    <h2 class="mb-3">Prenez rendez-vous avec votre docteur</h2>
                    <form action="{{ route('appointments.search') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Spécialité</label>
                            <select class="form-control" name="speciality" required>
                                <option value="">Sélectionnez une spécialité</option>
                                @foreach($specialities as $speciality)
                                    <option value="{{ $speciality }}">{{ $speciality }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ville</label>
                            <select class="form-control" name="city" required>
                                <option value="">Sélectionnez une ville</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city }}">{{ $city }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lieu</label>
                            <select class="form-control" name="location" required>
                                <option value="Au cabinet">Au cabinet</option>
                                <option value="A domicile">A domicile</option>
                                <option value="À la clinique">À la clinique</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="submit-btn" type="submit">Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>