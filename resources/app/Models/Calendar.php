<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    
    protected $table = 'calendar'; // Spécifier le nom de la table explicitement

    protected $fillable = [
        'doctor_id',
        'date',
    ];

    // Relation avec le médecin
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}
