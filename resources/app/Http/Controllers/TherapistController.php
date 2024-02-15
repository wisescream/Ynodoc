<?php

namespace App\Http\Controllers;

use App\Models\Therapist;
use App\Models\PatientTherapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TherapistController extends Controller
{
    public function showLoginForm()
    {
        return view('therapeute.therapeute-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('therapist')->attempt($credentials)) {
            // Si l'authentification réussit, redirigez le thérapeute vers la page d'accueil
            return redirect()->route('therapist.dashboard');
        }

        // Si l'authentification échoue, redirigez le thérapeute vers le formulaire de connexion avec un message d'erreur
        return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function showRegistrationForm()
    {
        return view('therapeute.therapeute-register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:therapists,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $therapistData = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        Therapist::create($therapistData);

        // Connectez automatiquement le thérapeute nouvellement enregistré
        Auth::guard('therapist')->attempt($request->only('email', 'password'));

        return redirect()->route('therapist.dashboard')
                         ->with('success', 'Therapist registered successfully.');
    }
    
    public function dashboard()
    {
        $patientTherapists = PatientTherapist::all();
        return view('therapeute.dashboard', compact('patientTherapists'));
    }

    public function appointment()
    {
        // Récupérer les rendez-vous du médecin actuellement authentifié
        $patientTherapists = PatientTherapist::all();
        return view('therapeute.appointment', compact('patientTherapists'));
    }

                    
    
    public function accept(PatientTherapist $patientTherapist)
    {
        // Mettez à jour l'état du rendez-vous pour l'accepter
        $patientTherapist->update(['accepted' => true]);
    
        return redirect()->back()->with('success', 'Rendez-vous accepté avec succès.');
    }
            

    public function cancel(PatientTherapist $patientTherapist)
    {
        // Supprimez le rendez-vous de la base de données
        $patientTherapist->delete();
    
        return redirect()->back()->with('success', 'Rendez-vous annulé avec succès.');
    }

}
