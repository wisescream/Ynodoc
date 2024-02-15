<!-- resources/views/emails/confirmation.blade.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remerciement</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>

</head>
<body>
<div class="container text-center">
        <div>
            <h1 class="display-3">Confirmation de paiement</h1>
            <div class="lead">
            <p>Merci d'avoir souscrit à une psychothérapie avec notre établissement.</p>
            <p>Un e-mail de confirmation a été envoyé à votre adresse e-mail. Veuillez consulter votre boîte de réception pour les détails du paiement.</p>
            <p>Merci et à bientôt!</p>
            </div>
            <p class="arrow">
               <a href="/" class="btn btn-outline-primary mb-3"><i class="bi bi-arrow-left"></i> Retour à l'accueil</a>
            </p>
        </div>

</div>
</body>
</html>
