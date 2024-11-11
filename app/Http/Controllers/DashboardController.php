<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Anamnese;
use App\Models\Antropometria;
use App\Models\MealPlan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show($id)
    {
        $user = User::find($id);
        $dateOfBirth = Carbon::parse($user->date_birth);
        $age = $dateOfBirth->age;  // Calculando a idade

        // Carregar informações de Anamnese, Antropometria e Plano Alimentar
        $anamneses = Anamnese::where('id', $user)->get();
        $avaliacoesAntropometricas = Antropometria::where('id', $user)->get();
        $planosAlimentares = MealPlan::where('id', $user)->get();

        return view('nutricionist.dashboard.dashboardPaciente', compact('user', 'anamneses', 'avaliacoesAntropometricas', 'planosAlimentares'));
    }
}
