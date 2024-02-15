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
    .section {
    position: relative;
    height: 100vh;
}

.section .section-center {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    -webkit-transform: translateY(-50%);
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
    -webkit-box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 5px 20px -5px rgba(0, 0, 0, 0.3);
    border-radius: 4px;
}

.booking-form .form-group {
    position: relative;
    margin-bottom: 30px;
}

.booking-form .form-control {
    background-color: #ebecee;
    border-radius: 4px;
    border: none;
    height: 40px;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #3e485c;
    font-size: 14px;
}

.booking-form .form-control::-webkit-input-placeholder {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control:-ms-input-placeholder {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form .form-control::placeholder {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form input[type="date"].form-control:invalid {
    color: rgba(62, 72, 92, 0.3);
}

.booking-form select.form-control {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.booking-form select.form-control+.select-arrow {
    position: absolute;
    right: 0px;
    bottom: 4px;
    width: 32px;
    line-height: 32px;
    height: 32px;
    text-align: center;
    pointer-events: none;
    color: rgba(62, 72, 92, 0.3);
    font-size: 14px;
}

.booking-form select.form-control+.select-arrow:after {
    content: '\279C';
    display: block;
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
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
    -webkit-transition: 0.2s all;
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
<div id="booking" class="section">
    <div class="section-center">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-md-push-5">
                    <div class="booking-cta">
                        <h1>Prenez rendez-vous avec votre doctor</h1>
                    </div>
                </div>
                <div class="col-md-4 col-md-pull-7">
                    <div class="booking-form">
                        <form action="{{ route('appointments.search') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <span class="form-label">Spécialité</span>
                                <select class="form-control" name="speciality" required>
                                    <option value="">Sélectionnez une spécialité</option>
                                    @foreach($specialities as $speciality)
                                        <option value="{{ $speciality }}">{{ $speciality }}</option>
                                    @endforeach
                                </select>
                                <span class="select-arrow"></span>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Ville</span>
                                <select class="form-control" name="city" required>
                                    <option value="">Sélectionnez une ville</option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city }}">{{ $city }}</option>
                                    @endforeach
                                </select>
                                <span class="select-arrow"></span>
                            </div>
                            <div class="form-group">
                                <span class="form-label">Lieu</span>
                                <select class="form-control" name="location" required>
                                    <option value="Au cabinet">Au cabinet</option>
                                    <option value="A domicile">A domicile</option>
                                    <option value="À la clinique">À la clinique</option>
                                </select>
                                <span class="select-arrow"></span>
                            </div>
                            <div class="form-btn">
                                <button class="submit-btn" type="submit">Rechercher</button>
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
