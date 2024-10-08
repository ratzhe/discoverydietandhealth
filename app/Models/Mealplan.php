<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mealplan extends Model

{
    use HasFactory;

    protected $table = 'meal_plans';

    protected $fillable = ['nutricionist_id', 'patient_id', 'meal_type'];

    public function nutritionist()
    {
        //return $this->belongsTo(Nutritionist::class);
        return $this->belongsTo(User::class, 'nutricionist_id');
    }

    public function patient()
    {
        //return $this->belongsTo(Patient::class);
        return $this->belongsTo(User::class, 'patient_id');
    }

    public function foodItems()
    {
        return $this->hasMany(FoodItem::class);
    }
}
