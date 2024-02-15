<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ynovdocs</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

    <style>
body {
  font-family: "Lato", sans-serif;
}

h1 {
    text-align: center;
}
/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
.center-content {
    text-align: center;
    margin: 0 auto;
    width: 50%; /* ajustez la largeur selon vos besoins */
}

.custom-btn {
    background-color: black;
}

.custom-btn:hover{
    background-color: black;
}
.navbar-light .navbar-toggler-icon {
    background-image: none
    }
    .shadow-sm {
    box-shadow: none !important;
}

</style>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <ul class="navbar-nav ms-auto">
                        <!-- Doctor -->
                        @if(Auth::guard('doctor')->check()) 
                        <div class="w3-dropdown-hover" style="position: absolute; top: 20px; right: 100px;">
                            <button class="btn btn-primary custom-btn">Welcome, {{ Auth::guard('doctor')->user()->name }}</button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button">Se déconnecter</a>
                            </div>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        @endif
                        <!-- thérapeute -->
                        @if(Auth::guard('therapist')->check()) 
                            <div class="w3-dropdown-hover" style="position: absolute; top: 20px; right: 100px;">
                            <button class="btn btn-primary custom-btn">Welcome, {{ Auth::guard('therapist')->user()->name }}</button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button">Se déconnecter</a>
                            </div>
                        </div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
