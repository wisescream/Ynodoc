<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Ynovdocs</title>
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>

        body {
            overflow: hidden;
        }

        .section {
            position: relative;
            height: 100vh;
        }

        .section .section-center {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
        }

        #booking {
            font-family: 'Montserrat', sans-serif;
            background-image: url('https://i.imgur.com/ZaRYfYW.jpg');
            background-size: cover;
            background-position: center;
        }

        #booking::before {
            content: '';
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            top: 0;
            background: rgba(47, 103, 177, 0.6);
        }

        .booking-form {
            background-color: #fff;
            padding: 50px 20px;
            box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
            border-radius: 4px;
            transform: scale(0.9); /* Vous devez spécifier une fonction de transformation */
        }

        .booking-form .form-group {
            margin-bottom: 30px;
        }

        .booking-form .form-control {
            border-radius: 4px;
            border: none;
            height: 40px;
            box-shadow: none;
            color: #3e485c;
            font-size: 14px;
        }

        .booking-form .form-label {
            display: inline-block;
            color: #3e485c;
            font-weight: 700;
            margin-bottom: 6px;
            margin-left: 7px;
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
        }

        .booking-form .submit-btn:hover,
        .booking-form .submit-btn:focus {
            opacity: 0.9;
        }

        .booking-cta {
            margin-top: 80px;
            margin-bottom: 30px;
        }

        .booking-cta h1 {
            font-size: 52px;
            text-transform: uppercase;
            color: #fff;
            font-weight: 700;
        }

        .booking-cta p {
            font-size: 16px;
            color: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
<body>
    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Prenez rendez-vous avec votre therapeute</h1>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form method="POST" action="{{ route('patient-therapists.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="therapist_id" class="form-label">Choisissez un thérapeute</label>
                                    <select id="therapist_id" class="form-control" name="therapist_id" required>
                                        <option value="">Sélectionnez un thérapeute</option>
                                        @foreach($therapists as $therapist)
                                            <option value="{{ $therapist->id }}">{{ $therapist->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="first_name" class="form-label">Prénom</label>
                                    <input id="first_name" type="text" class="form-control" name="first_name" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="last_name" class="form-label">Nom</label>
                                    <input id="last_name" type="text" class="form-control" name="last_name" required>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label for="phone_number" class="form-label">Numéro de téléphone</label>
                                    <input id="phone_number" type="text" class="form-control" name="phone_number" required>
                                </div>
                                <div class="form-group">
                                    <label for="pack" class="form-label">Pack</label>
                                    <select id="pack" class="form-control" name="pack">
                                        <option value="2 séances">2 séances</option>
                                        <option value="5 séances">5 séances</option>
                                        <option value="10 séances">10 séances</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="submit-btn btn btn-primary">Confirmer</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
