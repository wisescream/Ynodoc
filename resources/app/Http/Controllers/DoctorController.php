<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Calendar; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;


class DoctorController extends Controller
{
    // Afficher le formulaire d'enregistrement pour le médecin
    public function showRegistrationForm()
    {
        return view('doctor.doctorregister');
    }

    public function register(Request $request)
    {
        // Validation des données saisies par le médecin
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:doctors',
            'password' => 'required|string|min:8|confirmed',
            'speciality' => 'required|string|max:255',
            'working_hours' => 'required|string',
            'location' => 'required|string|in:Au cabinet,A domicile,À la clinique',
            'city' => 'required|string|max:255',
        ]);

        // Création d'un nouvel utilisateur médecin
        $doctor = Doctor::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'speciality' => $validatedData['speciality'],
            'working_hours' => $validatedData['working_hours'],
            'location' => $validatedData['location'],
            'city' => $validatedData['city'],
        ]);

        // Vérification de la création du médecin et connexion automatique
        if ($doctor) {
            Auth::guard('doctor')->login($doctor);
            return Redirect::to('/doctor/dashboard');
        } else {
            // En cas d'échec de la création du médecin, rediriger vers le formulaire d'enregistrement avec un message d'erreur
            return redirect()->route('doctor.register.form')->withErrors(['email' => 'Problème lors de la création du médecin.']);
        }
    }
                    
    // Afficher le formulaire de connexion pour le médecin
    public function showLoginForm()
    {
        return view('doctor.doctorlogin');
    }

    // Gérer le processus de connexion pour le médecin
    public function login(Request $request)
    {
        // Validation des informations de connexion saisies par le médecin
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Authentification du médecin
        if (Auth::guard('doctor')->attempt($credentials)) {
            // En cas de réussite de l'authentification, rediriger vers '/'
            return Redirect::to('/doctor/dashboard');
        } else {
            // En cas d'échec de l'authentification, rediriger vers le formulaire de connexion avec un message d'erreur
            return redirect()->route('doctor.login.form')->withErrors(['email' => 'Email ou mot de passe incorrect.']);
        }
    }

    public function dashboard()
    {
        // Récupérer les rendez-vous du médecin actuellement authentifié
        $doctor = Auth::guard('doctor')->user();
        $appointments = $doctor->appointments()->orderBy('appointment_date', 'asc')->get();
    
        return view('doctor.dashboard', compact('appointments'));
    }


    public function appointment()
    {
        // Récupérer les rendez-vous du médecin actuellement authentifié
        $doctor = Auth::guard('doctor')->user();
        $appointments = $doctor->appointments()->orderBy('appointment_date', 'asc')->get();
        return view('doctor.appointment', compact('appointments'));
    }

    public function dashboardWithCalendar()
    {
        // Récupérer le médecin actuellement authentifié
        $doctor = Auth::guard('doctor')->user();
    
        // Récupérer tous les rendez-vous du médecin
        $appointments = $doctor->appointments()->get();
    
        // Initialiser un tableau pour stocker les dates réservées
        $reservedDates = [];
    
        // Parcourir tous les rendez-vous et ajouter les dates au tableau des dates réservées
        foreach ($appointments as $appointment) {
            $reservedDates[] = \Carbon\Carbon::parse($appointment->appointment_date)->format('Y-m-d');
        }
    
        // Retourner la vue avec les dates réservées
        return view('doctor.dashboard_with_calendar', compact('reservedDates'));
    }
    
        
    public function storeCalendar(Request $request)
    {
        // Convertir la chaîne de caractères de dates en un tableau
        $selectedDates = explode(',', $request->selected_dates);
    
        // Valider chaque date individuellement
        foreach ($selectedDates as $date) {
            $validator = Validator::make(['date' => $date], [
                'date' => 'required|date', // Validez chaque date individuellement
            ]);
    
            if ($validator->fails()) {
                // Gérer les erreurs de validation
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }
    
        // Récupérer le médecin actuellement authentifié
        $doctor = Auth::guard('doctor')->user();
    
        // Stocker les dates sélectionnées dans la table Calendar
        foreach ($selectedDates as $date) {
            // Vérifier si la date existe déjà dans la table Calendar pour ce médecin
            $existingDate = Calendar::where('doctor_id', $doctor->id)
                                    ->where('date', $date)
                                    ->first();
    
            // Si la date n'existe pas encore, l'ajouter à la table Calendar
            if (!$existingDate) {
                Calendar::create([
                    'doctor_id' => $doctor->id,
                    'date' => $date,
                ]);
            }
        }
    
        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Les dates ont été enregistrées avec succès dans le calendrier.');
    }
                                    
    
    // Déconnexion du médecin
    public function logout()
    {
        Auth::guard('doctor')->logout();
        return redirect('/');
    }
}
