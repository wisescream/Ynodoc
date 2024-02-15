<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['user_name', 'question', 'response'];

    // Si vous avez une relation avec l'utilisateur, vous pouvez l'ajouter comme ceci :
    public function user()
    {
        return $this->belongsTo(User::class); // Assurez-vous que la classe User est importée (use App\Models\User)
    }
}
