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
    .selected {
        background-color: #ccc; /* Couleur grise pour les dates sélectionnées */
        cursor: pointer; /* Définir le curseur sur pointer pour indiquer que les dates sont cliquables */
    }
    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    #calendar {
        margin-top: 100px; /* Ajouter un espacement entre le titre h1 et le calendrier */
    }

</style>
</head>

@section('content')
<div class="sidenav">
    <a href="{{ route('doctor.dashboard') }}">Dashboard</a>
    <a href="{{ route('doctor.dashboard.calendar') }}">Voir le calendrier</a>
</div>
<div class="center-content">
    <div class="container">
        <h2>Calendrier :</h2>
        <div id="calendar" class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Lun</th>
                        <th scope="col">Mar</th>
                        <th scope="col">Mer</th>
                        <th scope="col">Jeu</th>
                        <th scope="col">Ven</th>
                        <th scope="col">Sam</th>
                        <th scope="col">Dim</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $startOfMonth = now()->startOfMonth();
                        $endOfMonth = now()->endOfMonth();
                        $currentDate = $startOfMonth->copy()->startOfWeek()->subDay();
                    @endphp
                    @while($currentDate->lte($endOfMonth))
                        <tr>
                            @for($i = 0; $i < 7; $i++)
                                @php
                                    $currentDate->addDay();
                                    $disabled = in_array($currentDate->format('Y-m-d'), $reservedDates) ? 'disabled' : '';
                                @endphp
                                <td class="calendar-day {{ $disabled }}" data-date="{{ $currentDate->format('Y-m-d') }}">
                                    {{ $currentDate->format('d') }}
                                </td>
                            @endfor
                        </tr>
                    @endwhile
                    </tbody>
            </table>
        </div>
        
        <!-- Formulaire pour enregistrer les dates sélectionnées -->
        <form id="save-calendar-form" action="{{ route('doctor.store.calendar') }}" method="POST">
            @csrf
            <input type="hidden" name="selected_dates" id="selected-dates-input">
            <button type="button" id="save-button" class="btn btn-primary mt-3">Enregistrer</button>

        </form>
    </div>
    </div>        

    <script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarDays = document.querySelectorAll('.calendar-day');
    const saveButton = document.getElementById('save-button');
    const selectedDatesInput = document.getElementById('selected-dates-input');
    let selectedDates = []; // Initialise le tableau des dates sélectionnées

    calendarDays.forEach(day => {
        day.addEventListener('click', function() {
            if (!day.classList.contains('selected') && !day.classList.contains('disabled')) {
                day.classList.add('selected');
                selectedDates.push(day.dataset.date); // Ajoute la date sélectionnée au tableau
            } else {
                day.classList.remove('selected');
                const index = selectedDates.indexOf(day.dataset.date);
                if (index > -1) {
                    selectedDates.splice(index, 1); // Retire la date sélectionnée du tableau
                }
            }

            // Met à jour la valeur de l'input avec les dates sélectionnées
            selectedDatesInput.value = selectedDates.join(','); // Convertit le tableau en chaîne de caractères séparée par des virgules
        });
    });

    saveButton.addEventListener('click', function() {
        // Envoyer les dates sélectionnées au serveur pour enregistrement
        document.getElementById('save-calendar-form').submit();
    });
});
    </script>
@endsection
