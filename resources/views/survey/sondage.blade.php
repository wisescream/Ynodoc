<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondage</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez vos propres styles CSS personnalisés ici */
        /* Par exemple */
        body {
            padding-top: 50px; /* Espacement pour la barre de navigation fixe */
        }
        .container {
            max-width: 800px; /* Ajustez la largeur de la container selon vos besoins */
            margin: auto;
        }

        .arrow {
            position: relative;
            left:20px;
        }

        /* Ajoutez d'autres styles personnalisés si nécessaire */
    </style>
</head>
<body>
    <div class="arrow">
        <!-- Flèche de retour -->
        <a href="/" class="btn btn-outline-primary mb-3"><i class="bi bi-arrow-left"></i> Retour à l'accueil</a>
    </div>
    <div class="container">
        <h1>Sondage</h1>

        <form action="{{ route('survey.submit') }}" method="POST">
            @csrf

            <h2>Questions sur le thérapeute :</h2>
            @foreach($therapistQuestions as $question)
                <div class="form-group">
                    <label for="therapist_question_{{ $question['id'] }}">{{ $question['question'] }}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="therapist_question_{{ $question['id'] }}" id="therapist_question_{{ $question['id'] }}_true" value="true">
                        <label class="form-check-label" for="therapist_question_{{ $question['id'] }}_true">Vrai</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="therapist_question_{{ $question['id'] }}" id="therapist_question_{{ $question['id'] }}_false" value="false">
                        <label class="form-check-label" for="therapist_question_{{ $question['id'] }}_false">Faux</label>
                    </div>
                </div>
            @endforeach

            <h2>Questions sur l'appointment du docteur :</h2>
            @foreach($doctorQuestions as $question)
                <div class="form-group">
                    <label for="doctor_question_{{ $question['id'] }}">{{ $question['question'] }}</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doctor_question_{{ $question['id'] }}" id="doctor_question_{{ $question['id'] }}_true" value="true">
                        <label class="form-check-label" for="doctor_question_{{ $question['id'] }}_true">Vrai</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="doctor_question_{{ $question['id'] }}" id="doctor_question_{{ $question['id'] }}_false" value="false">
                        <label class="form-check-label" for="doctor_question_{{ $question['id'] }}_false">Faux</label>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>

    <!-- Bootstrap JS (optionnel si vous n'utilisez pas de composants JS de Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
