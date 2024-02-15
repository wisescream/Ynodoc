@extends('layouts.admin')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ynovdocs</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<style>
    .navbar-light .navbar-toggler-icon {
    background-image: none
    }
    .shadow-sm {
    box-shadow: none !important;
}
</style>
    </head>

@section('content')
<br>
<br>

<div class="container">
    <h1>Liste des Docteurs</h1>
    <br>
    <div class="sidenav">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.user') }}">Utilisateurs</a>
        <a href="{{ route('admin.therapist') }}">Thérapeutes</a>
        <a href="{{ route('admin.survey') }}">Sondages</a>
    </div>
    <ul>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Doctor</th>
                    <th scope="col">Email</th>
                    <th scope="col">Specialité</th>
                    <th scope="col">Location</th>
                    <th scope="col">Ville</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
        @foreach ($doctors as $doctor)
        <tr>
                <td>{{ $doctor->name }}</td>
                <td>{{ $doctor->email }}</td>
                <td>{{ $doctor->speciality }}</td>
                <td>{{ $doctor->location }}</td>
                <td>{{ $doctor->city }}</td>
                <td>
            @if (!$doctor->accepted)
            <form method="POST" action="{{ route('admin.doctor.accept', $doctor->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </form>
            @endif
            <form method="POST" action="{{ route('admin.doctor.delete', $doctor->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            </td>
                </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
