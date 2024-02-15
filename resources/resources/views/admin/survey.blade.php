@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mt-5">Réponses aux Sondages par Utilisateur</h1>
    <div class="row">
        <div class="sidenav">
            <a href="{{ route('admin.dashboard') }}" class="list-group-item">Dashboard</a>
            <a href="{{ route('admin.user') }}" class="list-group-item">Utilisateurs</a>
            <a href="{{ route('admin.doctor') }}" class="list-group-item">Docteurs</a>
            <a href="{{ route('admin.therapist') }}" class="list-group-item">Thérapeutes</a>
        </div>
        <div class="col-md-9">
            @foreach ($users as $user)
                <div class="mt-3">
                    <h3>{{ $user->name }}</h3>
                    <ul class="list-group">
                        @foreach ($user->surveyResponses as $response)
                            <li class="list-group-item">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $response->created_at->format('Y-m-d H:i:s') }}</h5>
                                </div>
                                <p class="mb-1">Question: {{ $response->question }}</p>
                                <p class="mb-1">Réponse: {{ $response->response }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
