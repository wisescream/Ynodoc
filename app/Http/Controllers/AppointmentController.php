<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Calendar; 


class AppointmentController extends Controller
{
    public function showSearchForm()
    {
        $cities = Doctor::distinct()->pluck('city');
        $specialities = Doctor::distinct()->pluck('speciality');
    // Passer les spécialités à la vue du formulaire de recherche
    return view('appointment.search', compact('specialities','cities'));
    }

    public function search(Request $request)
    {
        // Valider les données du formulaire de recherche
        $request->validate([
            'speciality' => 'required',
            'city' => 'required',
            'location' => 'required',
        ]);

        // Récupérer les paramètres de recherche
        $speciality = $request->input('speciality');
        $city = $request->input('city');
        $location = $request->input('location');

        // Recherche des médecins disponibles selon les critères de recherche
        $doctors = Doctor::where('speciality', $speciality)
                    ->where('city', $city)
                    ->where('location', $location)
                    ->get();

        // Récupérer les dates sélectionnées par les médecins
        $selectedDates = Calendar::pluck('date')->toArray();

        // Définir une variable $selectedDate (ou la date par défaut)
        $selectedDate = now()->format('Y-m-d');

        // Retourner les résultats à la vue
        return view('appointment.search_results', compact('doctors', 'selectedDate', 'selectedDates'));
    }

    public function thankyou()
    {
        return view('appointment.remerciement');
    }


    public function store(Request $request)
    {
        // Valider les données du formulaire d'enregistrement de rendez-vous
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today',
        ]);
    
        // Récupérer l'utilisateur actuellement authentifié
        $userName = auth()->user()->name; // Assurez-vous que l'utilisateur est authentifié avant d'accéder à son nom
    
        // Récupérer le médecin sélectionné
        $doctorId = $request->input('doctor_id');
        $doctor = Doctor::findOrFail($doctorId);
    
        // Créer un nouveau rendez-vous avec l'ID de l'utilisateur et du médecin
        Appointment::create([
            'user_name' => $userName, // Utilisez le nom de l'utilisateur
            'doctor_name' => $doctor->name, // Utilisez le nom du médecin
            'appointment_date' => $request->input('appointment_date'),
        ]);
    
        // Rediriger avec un message de succès
        return redirect()->route('appointments.thankyou');
    }

    public function accept(Appointment $appointment)
    {
        // Mettez à jour l'état du rendez-vous pour l'accepter
        $appointment->update(['accepted' => true]);
    
        return redirect()->back()->with('success', 'Rendez-vous accepté avec succès.');
    }
            

    public function cancel(Appointment $appointment)
    {
        // Supprimez le rendez-vous de la base de données
        $appointment->delete();
    
        return redirect()->back()->with('success', 'Rendez-vous annulé avec succès.');
    }
            
}
