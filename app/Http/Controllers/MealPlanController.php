<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MealPlan;
use App\Models\FoodItem; // Certifique-se de que você tenha esse modelo

class MealPlanController extends Controller
{
    public function create()
    {
        $patients = User::where('role', 'patient')->get(); // Obtendo pacientes
        return view('nutricionist.meal-plan.create', compact('patients'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nutricionist_id' => 'required',
            'patient_id' => 'required',
            'meal_type' => 'required',
            //'food_items' => 'required|array|max:6', // Limita a 6 itens de comida
        ]);

        // Cria o plano alimentar primeiro
        $mealPlan = MealPlan::create([
            'nutricionist_id' => $validated['nutricionist_id'],
            'patient_id' => $validated['patient_id'],
            'meal_type' => $validated['meal_type'],
        ]);

        // Em seguida, adiciona os itens de comida
        foreach ($validated['food_items'] as $foodItem) {
            FoodItem::create([
                'meal_plan_id' => $mealPlan->id, 
                'food_item' => $foodItem,
            ]);
        }

        return redirect()->back()->with('success', 'Plano alimentar criado com sucesso!');
    }
}
