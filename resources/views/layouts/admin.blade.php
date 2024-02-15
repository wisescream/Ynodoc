<!-- layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <!-- Inclure vos liens CSS ici -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

.container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }
    .custom-btn {
    background-color: black;
}

.custom-btn:hover{
    background-color: black;
}

</style>
</head>
<body>
    <div class="container">
    <div class="w3-dropdown-hover" style="position: absolute; top: 20px; right: 100px;">
                            <button class="btn btn-primary custom-btn">Admin</button>
                            <div class="w3-dropdown-content w3-bar-block w3-border">
                              <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button">Se déconnecter</a>
                            </div>
                        </div>

                        <form id="logout-form" action="{{ route('admin.logout') }}" method="GET" class="d-none">
                            @csrf
                        </form>

        @yield('content')
    </div>

</body>
</html>
