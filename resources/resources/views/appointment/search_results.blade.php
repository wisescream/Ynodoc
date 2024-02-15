<!-- resources/views/appointments/search_results.blade.php -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ynovdocs</title>

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> 

    <script src="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>


    </head>

<style>
    /* Ajoutez cette classe pour représenter l'état de sélection */
    .calendar-day.selected {
        background-color: green; /* Changer la couleur des dates sélectionnées en vert */
    }
    .calendar-day.reserved {
        background-color: gray; /* Changer la couleur des dates réservées en gris */
    }

    .calendar-day:not(.reserved) {
    cursor: not-allowed; /* Empêcher l'utilisateur de cliquer sur les dates non réservées */
}

    .calendar-day-link {
        color:black;
        text-decoration: none;
    }

    .calendar {
        border-radius: 5px;
        font-size: 0.8rem; /* Reduce font size for the entire calendar */
    }

    .month {
        font-size: 1rem; /* Reduce font size of the month */
        margin-bottom: 5px; /* Reduce margin bottom */
    }

    .calendar ol li {
        float: left;
        width: 12%; /* Reduce the width of each day */
    }

    .calendar .day-names li {
        margin-bottom: 0.2rem; /* Reduce margin bottom for day names */
    }

    .calendar .days li {
        min-height: 5rem; /* Reduce the height of each day */
    }

    .calendar .days li .date {
        margin: 0.2rem 0; /* Reduce margin for date */
        padding: 0.3rem; /* Reduce padding for date */
        font-size: 0.7rem; /* Reduce font size for date */
    }

    .calendar .days li .event {
        font-size: 0.5rem; /* Reduce font size for event */
        padding: 0.2rem; /* Reduce padding for event */
        margin-bottom: 0.3rem; /* Reduce margin bottom for event */
    }

    .calendar .days li .event.begin {
        border-radius: 0.3rem 0 0 0.3rem; /* Adjust border radius for begin event */
    }

    .calendar .days li .event.end {
        border-radius: 0 0.3rem 0.3rem 0; /* Adjust border radius for end event */
    }
.calendar .days li .event.clear {
  background: none;
}

.calendar .days li:nth-child(n+29) {
  border-bottom: none;
}

.calendar .days li.outside .date {
  color: #ddd;
}
</style>

@if($doctors->count() > 0)
    <h2 class="mt-3 mb-4">Résultats de la recherche:</h2>
    <div class="list-group">
        @foreach($doctors as $doctor)
            <div class="list-group-item">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="mb-1"> Dr {{ $doctor->name }}</h4>
                        <p class="mb-1">{{ $doctor->speciality }}</p>
                        <p class="mb-1">{{ $doctor->location }} - {{ $doctor->city }}</p>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0 text-md-right">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Lundi</th>
                                    <th scope="col">Mardi</th>
                                    <th scope="col">Mercredi</th>
                                    <th scope="col">Jeudi</th>
                                    <th scope="col">Vendredi</th>
                                    <th scope="col">Samedi</th>
                                    <th scope="col">Dimanche</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $week_start = now()->startOfWeek()->subDay(); // Start from previous Sunday
                                @endphp
                                @for ($i = 0; $i < 6; $i++)
                                    <tr>
                                        @for ($j = 0; $j < 7; $j++)
                                            @php
                                                $day = $week_start->addDay();
                                                $selected = in_array($day->format('Y-m-d'), $selectedDates) ? 'reserved' : ''; // Vérifie si la date est réservée
                                            @endphp
                                            <td class="calendar-day {{ $selected }}" data-date="{{ $day->format('Y-m-d') }}">
                                                <a href="#" class="calendar-day-link">{{ $day->format('d') }}</a>
                                            </td>
                                        @endfor
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <form id="appointment-form" action="{{ route('appointments.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                            <input type="hidden" name="appointment_date" id="selected-date" value="{{ $selectedDate }}">
                            <button type="submit" class="btn btn-primary mt-3">Enregistrer rendez-vous</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <p class="mt-3">Aucun médecin trouvé pour les critères de recherche donnés.</p>
@endif

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarDays = document.querySelectorAll('.calendar-day');

    calendarDays.forEach(day => {
        day.addEventListener('click', function(event) {
            event.preventDefault();
            if (day.classList.contains('reserved')) {
                const selectedDate = day.getAttribute('data-date');
                const appointmentDateInput = document.getElementById('selected-date');
                
                // Mettre à jour la valeur de l'input caché avec la date sélectionnée
                appointmentDateInput.value = selectedDate;

                // Réinitialiser la couleur de fond de toutes les journées
                calendarDays.forEach(day => {
                    day.classList.remove('selected');
                    day.style.backgroundColor = ''; 
                });

                // Mettre en surbrillance la journée sélectionnée en vert
                day.classList.add('selected');
                day.style.backgroundColor = 'green';
            }
        });
    });
});
</script>
</body>
</html>
