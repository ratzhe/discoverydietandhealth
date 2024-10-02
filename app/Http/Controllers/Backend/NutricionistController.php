<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Anamnese;
use App\Models\Antropometria;
use App\Models\Mealplan;

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
            'anamnese_date' => 'required|date'
            // Adicionar validações conforme necessário
        ]);

        $anamnese = new Anamnese();
        $anamnese->patient_id = $request->input('patient_id');
        $anamnese->nutricionist_id = Auth::id();
        $anamnese->anamnese_date = $request->input('anamnese_date');
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
        $anamnese->anamnese_date = $request->input(('anamnese_date'));
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

        $patients = User::where('role', 'patient')
            ->whereHas('anamnese', function ($query) {
                $query->whereNotNull('id');
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

    public function destroy($id){
        $anamnese = Anamnese::findOrFail($id);
        $anamnese->delete();

        toastr()->success('Usuário excluído com sucesso!');
        return redirect()->route('nutricionist.anamnese.dashboard');
    }

    public function seerelatorio() {
        return view('nutricionist.relatorio');
    }

    public function showAnamneseEdit($id)
    {
        $anamnese = Anamnese::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.anamnese.edit', compact('anamnese', 'patients'));
    }

    public function antropometriaDashboard()
    {
        // Busque as avaliações antropométricas com os pacientes e nutricionistas relacionados
        $antropometriaList = Antropometria::with(['patient', 'nutricionist'])->get();
        return view('nutricionist.antropometria.dashboard', compact('antropometriaList'));
    }

    public function showAntropometriaForm()
    {
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.antropometria.create', compact('patients'));
    }

    public function antropometriaCreate(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'antropometria_date' => 'required|date',
            'waist_circumference' => 'required|numeric',
            'hip_circumference' => 'required|numeric',
            'bmi' => 'required|numeric',
            'body_fat' => 'required|numeric'

        ]);

        $antropometria = new Antropometria();
        $antropometria->patient_id = $request->input('patient_id');
        $antropometria->nutricionist_id = Auth::id(); // ID do nutricionista logado
        $antropometria->antropometria_date = $request->input('antropometria_date');
        $antropometria->weight = $request->input('weight');
        $antropometria->height = $request->input('height');
        $antropometria->waist_circumference = $request->input('waist_circumference');
        $antropometria->hip_circumference = $request->input('hip_circumference');
        $antropometria->skinfold_tricep = $request->input('skinfold_tricep');
        $antropometria->skinfold_subscapular = $request->input('skinfold_subscapular');
        $antropometria->bmi = $request->input('bmi');
        $antropometria->body_fat = $request->input('body_fat');
        $antropometria->save();

        return redirect()->route('nutricionist.antropometria.dashboard')->with('success', 'Avaliação Antropométrica cadastrada com sucesso!');
    }

    public function showAntropometriaEditForm($id)
    {
        $antropometria = Antropometria::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.antropometria.edit', compact('antropometria', 'patients'));
    }

    public function updateAntropometria(Request $request, $id)
    {
        $antropometria = Antropometria::findOrFail($id);

        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'antropometria_date' => 'required|date',
            'waist_circumference' => 'required|numeric',
            'hip_circumference' => 'required|numeric',
            'bmi' => 'required|numeric',
            'body_fat' => 'required|numeric'
        ]);

        // Atualize os campos
        $antropometria->weight = $request->input('weight');
        $antropometria->height = $request->input('height');
        $antropometria->antropometria_date = $request->input('antropometria_date');
        $antropometria->waist_circumference = $request->input('waist_circumference');
        $antropometria->hip_circumference = $request->input('hip_circumference');
        $antropometria->skinfold_tricep = $request->input('skinfold_tricep');
        $antropometria->skinfold_subscapular = $request->input('skinfold_subscapular');
        $antropometria->bmi = $request->input('bmi');
        $antropometria->body_fat = $request->input('body_fat');
        $antropometria->save();

        return redirect()->route('nutricionist.antropometria.dashboard')->with('success', 'Avaliação Antropométrica atualizada com sucesso!');
    }

    public function antropometriaDestroy($id)
    {
        $antropometria = Antropometria::findOrFail($id);
        $antropometria->delete();

        toastr()->success('Avaliação antropométrica excluída com sucesso!');
        return redirect()->route('nutricionist.antropometria.dashboard');
    }

    public function seeAntropometria(Request $request) {
        //filtro
        //dd($request->search);
        //$users = User::all(); // retorna os usuários
        $search = $request->search;

        $users = User::where(function ($query) use ($search){
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();
        return view('nutricionist.antropometria.index', compact('users'));
    }

    // Plano alimentar
    public function mealplanDashboard()
    {
        // Busque os planos alimentares com os pacientes e nutricionistas relacionados
        $antropometriaList = Antropometria::with(['patient', 'nutricionist'])->get();
        return view('nutricionist.mealplan.dashboard', compact('mealplanList'));
    }

    public function showmealplanForm()
    {
        $patients = User::where('role', 'patient')->get();
        return view('nutricionist.mealplan.create', compact('patients'));
    }


    public function mealplanCreate(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'antropometria_date' => 'required|date',
            'waist_circumference' => 'required|numeric',
            'hip_circumference' => 'required|numeric',
            'bmi' => 'required|numeric',
            'body_fat' => 'required|numeric'

        ]);

        $mealplan = new Mealplan();
        $mealplan->patient_id = $request->input('patient_id');
        $mealplan->nutricionist_id = Auth::id(); // ID do nutricionista logado
        $mealplan->antropometria_date = $request->input('antropometria_date');
        $mealplan->weight = $request->input('weight');
        $mealplan->height = $request->input('height');
        $mealplan->waist_circumference = $request->input('waist_circumference');
        $mealplan->hip_circumference = $request->input('hip_circumference');
        $mealplan->skinfold_tricep = $request->input('skinfold_tricep');
        $mealplan->skinfold_subscapular = $request->input('skinfold_subscapular');
        $mealplan->bmi = $request->input('bmi');
        $mealplan->body_fat = $request->input('body_fat');
        $mealplan->save();

        return redirect()->route('nutricionist.mealplan.dashboard')->with('success', 'Plano alimentar cadastrado com sucesso!');
    }

    public function showmealplanEditForm($id)
    {
        $mealplan = Mealplan::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.mealplan.edit', compact('mealplan', 'patients'));
    }

    public function mealplanUpdate(Request $request, $id)
    {
        $mealplan = Mealplan::findOrFail($id);

        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'antropometria_date' => 'required|date',
            'waist_circumference' => 'required|numeric',
            'hip_circumference' => 'required|numeric',
            'bmi' => 'required|numeric',
            'body_fat' => 'required|numeric'
        ]);

        // Atualize os campos
        $mealplan->weight = $request->input('weight');
        $mealplan->height = $request->input('height');
        $mealplan->antropometria_date = $request->input('antropometria_date');
        $mealplan->waist_circumference = $request->input('waist_circumference');
        $mealplan->hip_circumference = $request->input('hip_circumference');
        $mealplan->skinfold_tricep = $request->input('skinfold_tricep');
        $mealplan->skinfold_subscapular = $request->input('skinfold_subscapular');
        $mealplan->bmi = $request->input('bmi');
        $mealplan->body_fat = $request->input('body_fat');
        $mealplan->save();

        return redirect()->route('nutricionist.mealplan.dashboard')->with('success', 'Plano alimentar atualizado com sucesso!');
    }

    public function mealplanDestroy($id)
    {
        $mealplan = Mealplan::findOrFail($id);
        $mealplan->delete();

        toastr()->success('Plano alimentar excluído com sucesso!');
        return redirect()->route('nutricionist.mealplan.dashboard');
    }

    public function seemealplan(Request $request) {
        //filtro
        //dd($request->search);
        //$users = User::all(); // retorna os usuários
        $search = $request->search;

        $users = User::where(function ($query) use ($search){
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();
        return view('nutricionist.mealplan.index', compact('users'));
    }

}
