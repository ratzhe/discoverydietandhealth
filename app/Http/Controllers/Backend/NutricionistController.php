<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Anamnese;

class NutricionistController extends Controller
{
    public function dashboard(){
        $totalPatient = User::where('role', 'patient')->count();

        return view('nutricionist/dashboard', compact('totalPatient'));
    }

    public function anamneseDashboard(){
        // Busque as anamneses com os pacientes e nutricionistas relacionados
        $anamneseList = Anamnese::with(['patient', 'nutricionist'])->get();
        return view('nutricionist/anamnese/dashboard', compact('anamneseList'));
    }


    //public function anamneseCreate(){
        //$patients = User::where('role', 'patient')->get();
      //  return view('nutricionist.anamnese.create', compact('patients'));

        public function anamneseCreate(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            // Adicionar validações conforme necessário
        ]);

        $anamnese = new Anamnese();
        $anamnese->patient_id = $request->input('patient_id');
        $anamnese->nutricionist_id = Auth::id(); // ID do nutricionista logado
        $anamnese->weight = $request->input('weight');
        $anamnese->height = $request->input('height');
        $anamnese->diseases = $request->input('diseases');
        $anamnese->allergies = $request->input('allergies');
        $anamnese->medications = $request->input('medications');
        $anamnese->family_history = $request->input('family_history');
        $anamnese->meals_per_day = $request->input('meals_per_day');
        $anamnese->water_intake = $request->input('water_intake');
        $anamnese->alcohol = $request->input('alcohol');
        $anamnese->caffeine = $request->input('caffeine');
        $anamnese->exercise = $request->input('exercise');
        $anamnese->exercise_frequency = $request->input('exercise_frequency');
        $anamnese->snacks = $request->input('snacks');
        $anamnese->diet_history = $request->input('diet_history');
        $anamnese->short_term_goal = $request->input('short_term_goal');
        $anamnese->long_term_goal = $request->input('long_term_goal');
        $anamnese->save();

        return redirect()->route('nutricionist.anamnese.dashboard')->with('success', 'Anamnese cadastrada com sucesso!');
    }
    //}

    public function showAnamneseForm()
    {
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.anamnese.create', compact('patients'));
    }

    public function update(Request $request, $id)
{
    $anamnese = Anamnese::findOrFail($id); // Encontre a anamnese pelo ID

    $request->validate([
        'weight' => 'required|numeric',
        'height' => 'required|numeric',
        // Adicionar validações conforme necessário
    ]);

    // Atualize os campos
    $anamnese->weight = $request->input('weight');
    $anamnese->height = $request->input('height');
    $anamnese->diseases = $request->input('diseases');
    $anamnese->allergies = $request->input('allergies');
    $anamnese->medications = $request->input('medications');
    $anamnese->family_history = $request->input('family_history');
    $anamnese->meals_per_day = $request->input('meals_per_day');
    $anamnese->water_intake = $request->input('water_intake');
    $anamnese->alcohol = $request->input('alcohol');
    $anamnese->caffeine = $request->input('caffeine');
    $anamnese->exercise = $request->input('exercise');
    $anamnese->exercise_frequency = $request->input('exercise_frequency');
    $anamnese->snacks = $request->input('snacks');
    $anamnese->diet_history = $request->input('diet_history');
    $anamnese->short_term_goal = $request->input('short_term_goal');
    $anamnese->long_term_goal = $request->input('long_term_goal');
    $anamnese->save();

    return redirect()->route('nutricionist.anamnese.dashboard')->with('success', 'Anamnese atualizada com sucesso!');
}

public function showAnamneseEditForm($id)
{
    $anamnese = Anamnese::findOrFail($id);
    return view('nutricionist.anamnese.edit', compact('anamnese'));
}

public function seePatients(Request $request)
{
    $search = $request->input('search');

    // Busque apenas pacientes que têm anamnese
    $patients = User::where('role', 'patient')
        ->whereHas('anamnese', function ($query) {
            $query->whereNotNull('id'); // Certifique-se de que a anamnese existe
        })
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        })
        ->get();

    return view('nutricionist.anamnese.dashboard', compact('patients'));
}


}
