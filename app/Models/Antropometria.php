<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antropometria extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'nutricionist_id',
        'weight',
        'height',
        'antropometria_date',
        'waist_circumference',
        'hip_circumference',
        'bmi',
        'lean_mass',
        'fat_mass',
        'shoulder_circumference',
        'chest_circumference',
        'abdomen_circumference',
        'right_arm_circumference',
        'right_forearm_circumference',
        'right_thigh_circumference',
        'right_calf_circumference',
        'left_arm_circumference',
        'left_forearm_circumference',
        'left_thigh_circumference',
        'left_calf_circumference',
        'skinfold_chest',
        'skinfold_axillary',
        'skinfold_suprailiac',
        'skinfold_abdominal',
        'skinfold_thigh',
        'skinfold_calves',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function nutricionist()
    {
        return $this->belongsTo(User::class, 'nutricionist_id');
    }
}
