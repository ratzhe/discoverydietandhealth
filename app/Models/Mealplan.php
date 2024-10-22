<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealPlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nutricionist_id',
        'patient_id',
        'mealplan_date',
    ];

    // Relacionamento com os itens de comida
    public function foodItems()
    {
        return $this->hasMany(FoodItem::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }


    public function nutricionist() {
        return $this->belongsTo(User::class, 'nutricionist_id');
    }
}

