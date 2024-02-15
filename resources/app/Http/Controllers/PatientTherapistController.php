<?php

namespace App\Http\Controllers;

use App\Models\PatientTherapist;
use App\Models\Therapist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PatientTherapistController extends Controller
{
    public function index()
    {
        $therapists = Therapist::all();
        return view('therapeute.therapeute', compact('therapists'));
    }

    public function store(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'therapist_id' => 'required|exists:therapists,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'pack' => 'required',
        ]);
    
        // Mettre à jour ou créer une entrée pour le patient
        PatientTherapist::updateOrCreate(
            ['email' => $request->email], // Conditions de mise à jour
            [
                'therapist_id' => $request->therapist_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'pack' => $request->pack,
            ]
        );
    
        return redirect()->route('success')->with('success', 'Patient Therapist information stored successfully.');
    }
    }    