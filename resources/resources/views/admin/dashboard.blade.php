<!-- dashboard.blade.php -->
@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tableau de Bord Administrateur</h1>
      <div class="sidenav">
      <a href="{{ route('admin.user') }}">Utilisateurs</a>
      <a href="{{ route('admin.doctor') }}">Docteurs</a>
      <a href="{{ route('admin.therapist') }}">Thérapeutes</a>
      <a href="{{ route('admin.survey') }}">Sondages</a>
</div>
</div>

@endsection
