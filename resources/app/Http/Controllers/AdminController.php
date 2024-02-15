<?php

// Contrôleur pour le tableau de bord de l'administrateur
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // Importez la classe ValidationException
use App\Models\User;
use App\Models\Doctor;
use App\Models\Therapist;
use App\Models\Survey;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $doctors = Doctor::all();
        $therapists = Therapist::all();
        $surveyResponses = Survey::all();
    
        return view('admin.dashboard', compact('users', 'doctors', 'therapists', 'surveyResponses'));
    }
    
    public function dashboard()
    {
        $users = User::all();
        $doctors = Doctor::all();
        $therapists = Therapist::all();
        $surveyResponses = Survey::all();

        return view('admin.dashboard', compact('users', 'doctors', 'therapists', 'survey'));
    }

    // Méthode pour afficher la vue des utilisateurs
    public function user()
    {
        $users = User::all();
        return view('admin.user', compact('users'));
    }

    // Méthode pour afficher la vue des docteurs
    public function doctor()
    {
        $doctors = Doctor::all();
        return view('admin.doctor', compact('doctors'));
    }

    // Méthode pour afficher la vue des thérapeutes
    public function therapist()
    {
        $therapists = Therapist::all();
        return view('admin.therapist', compact('therapists'));
    }

    public function survey()
    {
            // Récupérer tous les utilisateurs
    $users = User::all();
    
    // Pour chaque utilisateur, récupérer ses réponses aux sondages
    foreach ($users as $user) {
        $user->surveyResponses = Survey::where('user_name', $user->name)->get();
    }
        $surveyResponses = Survey::all();
        return view('admin.survey', compact('surveyResponses', 'users'));
    }
        

    public function acceptUser(User $user)
    {
        // Mettez à jour l'utilisateur pour l'accepter (vous pouvez ajouter un champ dans la table des utilisateurs pour indiquer s'ils sont acceptés ou non)
        $user->update(['accepted' => true]);

        return redirect()->back()->with('success', 'Utilisateur accepté avec succès.');
    }

    public function deleteUser(User $user)
    {
        // Supprimez l'utilisateur de la base de données
        $user->delete();

        return redirect()->back()->with('success', 'Utilisateur supprimé avec succès.');
    }


    public function acceptDoctor(Doctor $doctor)
    {
        // Mettez à jour le docteur pour l'accepter (vous pouvez ajouter un champ dans la table des docteurs pour indiquer s'ils sont acceptés ou non)
        $doctor->update(['accepted' => true]);

        return redirect()->back()->with('success', 'Docteur accepté avec succès.');
    }

    public function deleteDoctor(Doctor $doctor)
    {
        // Supprimez le docteur de la base de données
        $doctor->delete();

        return redirect()->back()->with('success', 'Docteur supprimé avec succès.');
    }

    public function acceptTherapist(Therapist $therapist)
    {
        // Mettez à jour le thérapeute pour l'accepter (vous pouvez ajouter un champ dans la table des thérapeutes pour indiquer s'ils sont acceptés ou non)
        $therapist->update(['accepted' => true]);

        return redirect()->back()->with('success', 'Thérapeute accepté avec succès.');
    }

    public function deleteTherapist(Therapist $therapist)
    {
        // Supprimez le thérapeute de la base de données
        $therapist->delete();

        return redirect()->back()->with('success', 'Thérapeute supprimé avec succès.');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if ($credentials['email'] == 'admin@admin.com' && $credentials['password'] == 'admin') {
            Auth::loginUsingId(1); 
            return redirect()->intended('admin/dashboard');
        }
    
        // Si les informations d'identification ne correspondent pas, lancez une exception de validation
        throw ValidationException::withMessages([
            'email' => ['Les informations d\'identification sont incorrectes.'],
        ]);
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    }


