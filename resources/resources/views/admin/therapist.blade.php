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
<body>
<br>
<div class="container">
    <h1>Liste des Thérapeutes</h1>
    <br>
    <br>
    <div class="sidenav">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.user') }}">Utilisateurs</a>
        <a href="{{ route('admin.doctor') }}">Docteurs</a>
        <a href="{{ route('admin.survey') }}">Sondages</a>
    </div>
    <ul>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Thérapeute</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($therapists as $therapist)
        <tr>
                <td>{{ $therapist->name }}</td>
                <td>{{ $therapist->email }}</td>
                <td>
            @if (!$therapist->accepted)
            <form method="POST" action="{{ route('admin.therapist.accept', $therapist->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </form>
            @endif
            <form method="POST" action="{{ route('admin.therapist.delete', $therapist->id) }}">
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
</body>
</html>
