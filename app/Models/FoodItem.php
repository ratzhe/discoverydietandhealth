<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\mealPlan;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_plan_id',
        'meal_type',
        'food_item',
    ];

    // Relacionamento com o plano alimentar
    public function mealPlan()
    {
        return $this->belongsTo(MealPlan::class);
    }
}
