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
    <h1>Liste des Utilisateurs</h1>
    <br>
    <div class="sidenav">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.doctor') }}">Docteurs</a>
        <a href="{{ route('admin.therapist') }}">Thérapeutes</a>
        <a href="{{ route('admin.survey') }}">Sondages</a>
    </div>
    <ul>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">utilisateur</th>
                    <th scope="col">Email</th>
                </tr>
            </thead>
            <tbody>
        @foreach ($users as $user)
        <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
            @if (!$user->accepted)
            <form method="POST" action="{{ route('admin.user.accept', $user->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Confirmer</button>
            </form>
            @endif
            <form method="POST" action="{{ route('admin.user.delete', $user->id) }}">
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
