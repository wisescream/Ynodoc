<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyController extends Controller
{
    public function show()
    {
        // Supposons que vous utilisez maintenant des questions statiques dans le contrôleur
        // Vous pouvez ajuster cette logique pour obtenir des questions dynamiquement si nécessaire
        $therapistQuestions = [
            ['id' => 1, 'question' => "Le thérapeute était-il ponctuel?"],
            ['id' => 2, 'question' => "Le thérapeute était-il amical et attentionné?"],
            // Ajoutez d'autres questions sur le thérapeute selon le même modèle
        ];

        $doctorQuestions = [
            ['id' => 1, 'question' => "Le médecin était-il à l'heure pour votre rendez-vous?"],
            ['id' => 2, 'question' => "Le médecin vous a-t-il écouté attentivement?"],
            // Ajoutez d'autres questions sur le médecin selon le même modèle
        ];

        return view('survey.sondage', compact('therapistQuestions', 'doctorQuestions'));
    }

    public function submit(Request $request)
    {
        // Valider les réponses soumises
        $request->validate([
            // Ajoutez ici les règles de validation pour les réponses soumises
            // Par exemple, vous pouvez utiliser par exemple le validateur 'required' pour vérifier si une réponse a été fournie.
        ]);

        // Traiter les réponses soumises
        foreach ($request->all() as $key => $value) {
            // Si la clé commence par 'therapist_question' ou 'doctor_question', c'est une réponse à une question
            if (strpos($key, 'therapist_question') === 0 || strpos($key, 'doctor_question') === 0) {
                // Récupérer la question associée à la réponse
                $questionId = substr($key, strrpos($key, '_') + 1);

                // Obtenir le nom de l'utilisateur actuellement authentifié
                $userName = auth()->user()->name; // Assurez-vous que l'utilisateur est authentifié avant d'accéder à son nom

                // Enregistrer la réponse dans la table 'surveys'
                Survey::create([
                    'user_name' => $userName, // Utilisez le nom de l'utilisateur
                    'response' => $value, // Stockez la réponse dans la colonne 'response'
                    'question' => $this->getQuestionText($questionId), // Obtenez le texte de la question basée sur l'ID
                ]);
            }
        }
                                
        // Rediriger vers une page de confirmation ou une autre action appropriée
        return redirect()->route('survey.thankyou');
    }

    public function thankyou()
    {
        return view('survey.remerciement');
    }

    private function getQuestionText($questionId)
    {
        // Vous devez implémenter cette méthode pour obtenir le texte de la question basée sur l'ID
        // Par exemple, vous pouvez récupérer les questions à partir d'une base de données
        // ou les stocker dans un tableau et les rechercher par ID.
        // Pour cet exemple, nous supposons que vous stockez les questions dans un tableau statique.

        $questions = [
            1 => "Le thérapeute était-il ponctuel?",
            2 => "Le thérapeute était-il amical et attentionné?",
            3 => "Le médecin était-il à l'heure pour votre rendez-vous?",
            4 => "Le médecin vous a-t-il écouté attentivement?"
        ];

        return $questions[$questionId] ?? null;
    }
}
