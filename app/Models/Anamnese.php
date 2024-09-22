<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anamnese extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'user_id',
        'weight',
        'height',
        'diseases',
        'allergies',
        'medications',
        'family_history',
        'meals_per_day',
        'water_intake',
        'alcohol',
        'caffeine',
        'exercise',
        'exercise_frequency',
        'snacks',
        'diet_history',
        'short_term_goal',
        'long_term_goal',
    ];

    /**
     * Get the patient associated with the anamnese.
     */
    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }


    public function nutricionist() {
        return $this->belongsTo(User::class, 'nutricionist_id');
    }


    /**
     * Get the user (nutricionista) who created the anamnese.
     */
   // public function user()
    //{
      //  return $this->belongsTo(User::class, 'user_id');
    //}

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
