<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTherapist extends Model
{
    use HasFactory;

    protected $fillable = [
        'therapist_id', // Utilisez therapist_id comme clé étrangère
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'pack',
        'accepted'
    ];
    
    // Définissez le nom de la table explicitement
    protected $table = 'patient-therapists';

    public function therapist()
    {
        return $this->belongsTo(Therapist::class);
    }

    // Ajoutez cette méthode pour récupérer le nom du thérapeute
    public function therapistName()
    {
        return $this->therapist->name;
    }
}
