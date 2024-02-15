<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/index.css">
    <title>eDoc</title>
    <style>
        table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        @import url('font-inter.css');
:root {
  --primarycolor: #0A76D8;
  --primarycolorhover: #006dd3;
  --btnice:#D8EBFA;
  --btnnicetext:#1b62b3;
}

body{
    margin: 0;
    padding: 0;
    border-spacing: 0;
    font-family: 'Inter', sans-serif;
    
}

*, ::after, ::before{
    box-sizing: border-box;
}


/*------custom-scroll-bar - from w3schools.com------------------*/
/* width */
::-webkit-scrollbar {
    width: 5px;
  }
  
  /* Track */
  ::-webkit-scrollbar-track {
    background: #f1f1f1; 
  }
   
  /* Handle */
  ::-webkit-scrollbar-thumb {
    background: #888; 
    border-radius: 12px;
  }
  
  /* Handle on hover */
  ::-webkit-scrollbar-thumb:hover {
    background: #555; 
  }

/* -----------Buttons---------------*/
.btn{
    cursor: pointer;
    padding: 8px 20px;
    outline: none;
    text-decoration: none;
    font-size: 15px;
    letter-spacing: 0.5px;
    transition: all 0.3s;
    border-radius: 5px;
    font-family: 'Inter', sans-serif;
}


.btn:hover{
    background-color: var(--primarycolorhover);
    box-shadow: none;
    transition: all 0.5s;
    font-family: 'Inter', sans-serif;

}


.btn-primary{
    background-color: var(--primarycolor) ;
    border: 1px solid var(--primarycolor) ;
    color: #fff ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
}

.btn-primary-soft{
    background-color: #D8EBFA ;
    /*border: 1px solid rgba(57,108,240,0.1) ;*/    color: #1969AA;
    font-weight: 500;
    font-size: 16px;
    border: none;
    /*box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3)*/
}


.btn-primary-soft:hover{
    background-color: var(--primarycolor) ;
    /*border: 1px solid rgba(57,108,240,0.1) ;*/
    color: #fff ;
    box-shadow: 0 3px 5px 0 rgba(57,108,240,0.3);
}


.btn-in-text{
    font-size: 15px;
    letter-spacing: 0.5px;
}

.non-style-link:link, .non-style-link:visited, .non-style-link:hover, .non-style-link:active{
    text-decoration: none;
    color: rgb(43, 43, 43);
}
  
.btn-primary-gray{
  background-color: #fff;
  border: 2px solid #c9cbce9f;
  color: #212529d0;
  box-shadow: 0 3px 5px 0 rgba(95, 95, 97, 0.3);
}



.btn-primary-gray:hover{
  background-color: #5185ffa9;
  box-shadow: 0 3px 5px 0 rgba(95, 95, 97, 0.3);
}


.non-style-link-menu:link, .non-style-link-menu:visited,  .non-style-link-menu:active{
  text-decoration: none;
  color: #3b3b3b;
}
.non-style-link-menu:hover{
  text-decoration: none;
  color: var(--primarycolor);
}

.non-style-link-menu-active:link, .non-style-link-menu-active:visited,  .non-style-link-menu-active:active{
  text-decoration: none;
  color: var(--primarycolor);
}


body{
    background-image: url(bg01.jpg);
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    height: 100%;
}

html, body {
    height: 100%;
    margin: 0;
  }
  
.full-height {
    background: rgba(26, 26, 26, 0.548);
    background-attachment: fixed;
    max-height: 100vh;
    height: 100vh;


}
table{
    width: 100%;
    padding-top: 5px;
    
}
.heading-text{
    color: white;
    font-size: 42px;
    font-weight: 700;
    line-height: 63px;
    margin-top: 15%;
    text-align: center;
    margin-bottom: 0;
}

.sub-text2{
    color: rgba(255, 255, 255, 0.5);
    font-size: 17px;
    line-height: 27px;
    font-weight: 400;
    text-align: center;
    margin-top: 0;
}



.edoc-logo{
    color: white;
    font-weight: bolder;
    font-size: 20px;
    padding-left: 20px;
    animation: transitionIn-Y-over 0.5s;
}

.edoc-logo-sub{
    color: rgba(255, 255, 255, 0.733);
    font-size: 12px;

}


.nav-item{
    color: rgba(255, 255, 255, 0.671);
    text-align: center;
    font-size: 15px;
    font-weight: 500;
    animation: transitionIn-Y-over 0.5s;
}

.nav-item:hover{
    color: #f0f0f0;

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
                    @auth <!-- Affiche le bouton de déconnexion uniquement si l'utilisateur est connecté -->
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
                    </td>
                    @auth
                        <!-- Aucun bouton REGISTER si l'utilisateur est connecté -->
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
