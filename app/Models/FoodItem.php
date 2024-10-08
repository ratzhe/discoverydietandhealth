<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_plan_id',
        'food_item',
    ];

    // Definindo a relação com o MealPlan
    public function mealPlan()
    {
        return $this->belongsTo(MealPlan::class);
    }
}
