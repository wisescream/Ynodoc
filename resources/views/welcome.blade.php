<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Title</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .bg-doctors {
      background-image: url('https://img.freepik.com/free-photo/young-handsome-physician-medical-robe-with-stethoscope_1303-17818.jpg?w=1380&t=st=1708044265~exp=1708044865~hmac=f12793d0ca13cda004eb08bdffe3c588978af029c001afb9136a19bd780ad6f5');
      background-size: cover;
      background-position: center;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .overlay {
      background-color: rgba(0, 0, 0, 0.5);
      width: 100%;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    .header {
      background-color: #007bff;
      color: #fff;
      padding: 20px 0;
    }

    .hero-text {
      max-width: 600px;
      margin-bottom: 20px;
    }

    .btn-primary {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    .btn-primary:hover {
      background-color: #004080;
      border-color: #004080;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="header text-center">
    <h1 class="display-4">Ynovdocs</h1>
    <p class="lead">Appointment Project</p>
    @auth
    <div class="text-white">
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-sm btn-outline-light">Sign Out</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </div>
    @endauth
  </header>

  <!-- Hero Section -->
  <section class="bg-doctors">
    <div class="overlay">
      <div class="container">
        <div class="hero-text">
          <h2 class="mb-4 text-white">Your health, our priority:</h2>
          <p class="lead text-white mb-5">Book your medical appointment with ease!</p>
          @auth
          <a href="{{ route('appointments.search') }}" class="btn btn-lg btn-primary me-2">Make an Appointment</a>
          <a href="{{ route('patient-therapists.index') }}" class="btn btn-lg btn-primary">Book an Appointment with a Therapist</a>
          @else
          <a href="{{ route('user.type.form') }}" class="btn btn-lg btn-primary me-2">Sign In</a>
          <a href="{{ route('user.type.registration') }}" class="btn btn-lg btn-primary">Register</a>
          @endauth
        </div>
      </div>
    </div>
  </section>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
