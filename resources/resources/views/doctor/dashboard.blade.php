@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tableau de bord du médecin</h1>
        
        <div class="sidenav">
      <a href="{{ route('doctor.appointment') }}">Rendez-vous</a>
      <a href="{{ route('doctor.dashboard.calendar') }}">Voir le calendrier</a>
</div>
</div>
@endsection



