<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remerciement</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            background: #f8f9fa;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
            text-align: center;
            padding: 15px;
        }

        .content {
            animation: fadeIn 1s;
        }

        .arrow {
            margin-top: 30px;
            animation: bounce 2s infinite;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-30px); }
            60% { transform: translateY(-15px); }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1 class="display-3">Merci pour votre rendez-vous!</h1>
        <p class="lead"><strong>Votre rendez-vous a été enregistré avec succès. Nous vous remercions pour votre confiance.</strong></p>
        <p class="arrow">
            <a href="/" class="btn btn-primary mb-3"><i class="bi bi-arrow-left"></i> Retour à l'accueil</a>
        </p>
    </div>
</div>
</body>
</html>