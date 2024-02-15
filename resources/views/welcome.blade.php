<head>
  <head>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
        }

        .full-height {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            text-align: center;
        }

        .edoc-logo {
            font-size: 32px;
            font-weight: bold;
            color: #007bff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .edoc-logo-sub {
            font-size: 20px;
            color: #333;
        }

        .nav-item {
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
            cursor: pointer;
        }

        .nav-item:hover {
            text-decoration: underline;
        }

        .heading-text {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .sub-text2 {
            font-size: 18px;
            color: #333;
            margin-top: 0;
        }

        .btn-container {
            margin-top: 30px;
        }

        .login-btn {
            font-size: 18px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 12px 24px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }

        /* Adjustments for smaller screens */
        @media only screen and (max-width: 768px) {
            .edoc-logo {
                font-size: 24px;
            }
            .edoc-logo-sub {
                font-size: 16px;
            }
            .heading-text {
                font-size: 24px;
            }
            .sub-text2 {
                font-size: 16px;
            }
            .login-btn {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="full-height">
        <center>
            <table border="0">
                <tr>
                    <td width="80%">
                        <font class="edoc-logo">Ynovdocs </font>
                        <font class="edoc-logo-sub">| APPOINTMENT PROJECT</font>
                    </td>
                    @auth
                    <td  width="10%">
                        <a href="{{ route('survey.show') }}" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">Donner mon avis</p></a>
                    </td>
                    <td width="10%" style="text-align: right;">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="non-style-link"><p class="nav-item">Se déconnecter</p></a>
                    </td>
                    @else
                    <td  width="10%">
                        <a href="{{ route('user.type.form') }}" class="non-style-link"><p class="nav-item">Se connecter</p></a>
                    </td>
                    @endauth
                    @auth
                    @else
                    @if (Route::has('register')) 
                    <td  width="10%">
                        <a href="{{ route('user.type.registration') }}" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">S'inscrire</p></a>
                    </td>
                    @endif 
                    @endauth
                </tr>
                <tr>
                    <td  colspan="3">
                        <p class="heading-text">Votre santé, notre priorité :</p>
                    </td>
                </tr>
                <tr>
                    <td  colspan="3">
                        <p class="sub-text2">Réservez votre rendez-vous médical en toute simplicité !</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <center>
                        @if (Auth::check())
                        <a href="{{ route('appointments.search') }}">
                            <input type="button" value="Prendre rendez-vous" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        </a>
                        <a href="{{ route('patient-therapists.index') }}">
                            <input type="button" value="Prendre rendez-vous avec un thérapeute" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        </a>
                        @endif
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                       
                    </td>
                </tr>
            </table>
        </center>
    </div>
</body>
</html>
