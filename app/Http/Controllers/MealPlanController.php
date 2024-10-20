<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MealPlan;
use App\Models\FoodItem;
use Illuminate\Support\Facades\Auth;

class MealPlanController extends Controller
{
    public function MealplanDashboard()
    {
        $mealPlans = MealPlan::with(['patient', 'nutricionist'])->get();
        return view('nutricionist.meal-plan.dashboard', compact('mealPlans'));
    }

    public function create()
    {
        $patients = User::where('role', 'patient')->get(); // Obtendo pacientes
        return view('nutricionist.meal-plan.create', compact('patients'));
    }

    public function store(Request $request)
{
    // Verifica se o usuário autenticado é um nutricionista
    if (Auth::user()->role !== 'nutricionist') {
        return redirect()->back()->withErrors('Você não tem permissão para criar planos alimentares.');
    }

    $validated = $request->validate([
        'patient_id' => 'required',
        'breakfast' => 'required|array',
        'morning_snack' => 'required|array',
        'lunch' => 'required|array',
        'afternoon_snack' => 'required|array',
        'dinner' => 'required|array',
        'supper' => 'required|array',
    ]);

    // Cria o plano alimentar
    $mealPlan = MealPlan::create([
        'nutricionist_id' => Auth::id(), // Nutricionista autenticado
        'patient_id' => $validated['patient_id'],
    ]);

    // Salva os itens de cada refeição
    $this->saveFoodItems($mealPlan->id, 'breakfast', $validated['breakfast']);
    $this->saveFoodItems($mealPlan->id, 'morning_snack', $validated['morning_snack']);
    $this->saveFoodItems($mealPlan->id, 'lunch', $validated['lunch']);
    $this->saveFoodItems($mealPlan->id, 'afternoon_snack', $validated['afternoon_snack']);
    $this->saveFoodItems($mealPlan->id, 'dinner', $validated['dinner']);
    $this->saveFoodItems($mealPlan->id, 'supper', $validated['supper']);

    return redirect()->route('nutricionist.meal-plan.dashboard')->with('success', 'Plano alimentar cadastrado com sucesso!');

}

    private function saveFoodItems($mealPlanId, $mealType, $foodItems)
    {
        foreach ($foodItems as $foodItem) {
            if (!empty($foodItem)) {
                FoodItem::create([
                    'meal_plan_id' => $mealPlanId,
                    'meal_type' => $mealType,
                    'food_item' => $foodItem,
                ]);
            }
        }
    }

    public function update(Request $request, $id)
{
    // Verifica se o usuário autenticado é um nutricionista
    if (Auth::user()->role !== 'nutricionist') {
        return redirect()->back()->withErrors('Você não tem permissão para atualizar planos alimentares.');
    }

    // Validação dos dados recebidos
    $validated = $request->validate([
        'patient_id' => 'required',
        'breakfast' => 'required|array',
        'morning_snack' => 'required|array',
        'lunch' => 'required|array',
        'afternoon_snack' => 'required|array',
        'dinner' => 'required|array',
        'supper' => 'required|array',
    ]);

    // Encontrar o plano alimentar existente
    $mealPlan = MealPlan::findOrFail($id);
    $mealPlan->patient_id = $validated['patient_id'];
    $mealPlan->save(); // Salva as mudanças no plano alimentar

    // Atualiza os itens de cada refeição
    $this->updateFoodItems($mealPlan->id, 'breakfast', $validated['breakfast']);
    $this->updateFoodItems($mealPlan->id, 'morning_snack', $validated['morning_snack']);
    $this->updateFoodItems($mealPlan->id, 'lunch', $validated['lunch']);
    $this->updateFoodItems($mealPlan->id, 'afternoon_snack', $validated['afternoon_snack']);
    $this->updateFoodItems($mealPlan->id, 'dinner', $validated['dinner']);
    $this->updateFoodItems($mealPlan->id, 'supper', $validated['supper']);

    return redirect()->route('nutricionist.meal-plan.dashboard')->with('success', 'Plano alimentar atualizado com sucesso!');
}

private function updateFoodItems($mealPlanId, $mealType, $foodItems)
{
    // Limpa os itens antigos da refeição
    FoodItem::where('meal_plan_id', $mealPlanId)->where('meal_type', $mealType)->delete();

    // Salva os novos itens
    foreach ($foodItems as $foodItem) {
        if (!empty($foodItem)) {
            FoodItem::create([
                'meal_plan_id' => $mealPlanId,
                'meal_type' => $mealType,
                'food_item' => $foodItem,
            ]);
        }
    }
}


    public function delete($id)
    {
        $mealplan = MealPlan::findOrFail($id);
        $mealplan->delete();

        toastr()->success('Plano alimentar excluído com sucesso!');
        return redirect()->route('nutricionist.meal-plan.dashboard');
    }
}
