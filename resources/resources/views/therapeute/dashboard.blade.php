@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tableau de bord du Thérapeute</h1>
        
        <div class="sidenav">
      <a href="{{ route('therapist.appointment') }}">Rendez-vous</a>
</div>
</div>
@endsection



