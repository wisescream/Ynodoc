@extends('layouts.app')
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
<div class="sidenav">
    <a href="{{ route('doctor.dashboard') }}">Dashboard</a>
    <a href="{{ route('doctor.dashboard.calendar') }}">Voir le calendrier</a>
</div>
<div class="center-content">
    <h2>Rendez-vous à venir :</h2>
<br>
<br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Patient</th>
                    <th scope="col">Date du rendez-vous</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->user_name }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>
                        @if (!$appointment->accepted)
                        <form action="{{ route('appointments.accept', $appointment->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Autoriser</button>
                        </form>
                        @endif
                        <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Annuler</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
