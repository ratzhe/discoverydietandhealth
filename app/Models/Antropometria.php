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
        'skinfold_tricep',
        'skinfold_subscapular',
        // Adicione outros campos conforme necessário
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
