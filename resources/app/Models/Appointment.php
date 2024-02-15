<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['user_name', 'doctor_name', 'appointment_date', 'accepted'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_name', 'name');
    }    
    
}
