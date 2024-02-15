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
    <a href="{{ route('therapist.dashboard') }}">Dashboard</a>
</div>
<br>
<div class="center-content">
    <h2>Rendez-vous à venir :</h2>
<br>
<br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Patient</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($patientTherapists as $patientTherapist)
            <tr>
                <td>{{ $patientTherapist->first_name }} {{ $patientTherapist->last_name }}</td>
                <td>
                    @if (!$patientTherapist->accepted)
                        <form action="{{ route('therapist.accept', $patientTherapist->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Accepter</button>
                        </form>
                    @endif
                    <form action="{{ route('therapist.cancel', $patientTherapist->id) }}" method="POST">
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
