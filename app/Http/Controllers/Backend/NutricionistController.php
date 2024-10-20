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
            'antropometria_date' => 'required|date',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'bmi' => 'required|numeric',
            'lean_mass' => 'required|numeric',
            'fat_mass' => 'required|numeric',
            'shoulder_circumference' => 'required|numeric',
            'chest_circumference' => 'required|numeric',
            'hip_circumference' => 'required|numeric',
            'waist_circumference' => 'required|numeric',
            'abdomen_circumference' => 'required|numeric',
            'right_arm_circumference' => 'required|numeric',
            'right_forearm_circumference' => 'required|numeric',
            'right_thigh_circumference' => 'required|numeric',
            'right_calf_circumference' => 'required|numeric',
            'left_arm_circumference' => 'required|numeric',
            'left_forearm_circumference' => 'required|numeric',
            'left_thigh_circumference' => 'required|numeric',
            'left_calf_circumference' => 'required|numeric',
            'skinfold_chest' => 'required|numeric',
            'skinfold_axillary' => 'required|numeric',
            'skinfold_suprailiac' => 'required|numeric',
            'skinfold_abdominal' => 'required|numeric',
            'skinfold_thigh' => 'required|numeric',
            'skinfold_calves' => 'required|numeric',
            'skinfold_subscapular' => 'required|numeric',
            'skinfold_tricep' => 'required|numeric'
        ]);

        $antropometria = new Antropometria();
        $antropometria->patient_id = $request->input('patient_id');
        $antropometria->nutricionist_id = Auth::id(); // ID do nutricionista logado
        $antropometria->antropometria_date = $request->input('antropometria_date');
        $antropometria->weight = $request->input('weight');
        $antropometria->height = $request->input('height');
        $antropometria->bmi = $request->input('bmi');
        $antropometria->lean_mass = $request->input('lean_mass');
        $antropometria->fat_mass = $request->input('fat_mass');
        $antropometria->shoulder_circumference = $request->input('shoulder_circumference');
        $antropometria->chest_circumference = $request->input('chest_circumference');
        $antropometria->waist_circumference = $request->input('waist_circumference');
        $antropometria->abdomen_circumference = $request->input('abdomen_circumference');
        $antropometria->hip_circumference = $request->input('hip_circumference');
        $antropometria->right_arm_circumference = $request->input('right_arm_circumference');
        $antropometria->right_forearm_circumference = $request->input('right_forearm_circumference');
        $antropometria->right_thigh_circumference = $request->input('right_thigh_circumference');
        $antropometria->right_calf_circumference = $request->input('right_calf_circumference');
        $antropometria->left_arm_circumference = $request->input('left_arm_circumference');
        $antropometria->left_forearm_circumference = $request->input('left_forearm_circumference');
        $antropometria->left_thigh_circumference = $request->input('left_thigh_circumference');
        $antropometria->left_calf_circumference = $request->input('left_calf_circumference');
        $antropometria->skinfold_chest = $request->input('skinfold_chest');
        $antropometria->skinfold_axillary = $request->input('skinfold_axillary');
        $antropometria->skinfold_suprailiac = $request->input('skinfold_suprailiac');
        $antropometria->skinfold_abdominal = $request->input('skinfold_abdominal');
        $antropometria->skinfold_thigh = $request->input('skinfold_thigh');
        $antropometria->skinfold_calves = $request->input('skinfold_calves');
        $antropometria->skinfold_subscapular = $request->input('skinfold_subscapular');
        $antropometria->skinfold_tricep = $request->input('skinfold_tricep');

        $antropometria->save();

        return redirect()->route('nutricionist.antropometria.dashboard')->with('success', 'Avaliação Antropométrica cadastrada com sucesso!');
    }

    public function showAntropometriaEditForm($id)
    {
        $antropometria = Antropometria::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.antropometria.edit', compact('antropometria', 'patients'));
    }

    public function antropometriaUpdate(Request $request, $id)
    {
        $antropometria = Antropometria::findOrFail($id);

        $request->validate([
            'antropometria_date' => 'required|date',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'bmi' => 'required|numeric',
            'lean_mass' => 'required|numeric',
            'fat_mass' => 'required|numeric',
            'shoulder_circumference' => 'required|numeric',
            'chest_circumference' => 'required|numeric',
            'waist_circumference' => 'required|numeric',
            'abdomen_circumference' => 'required|numeric',
            'hip_circumference' => 'required|numeric',
            'right_arm_circumference' => 'required|numeric',
            'right_forearm_circumference' => 'required|numeric',
            'right_thigh_circumference' => 'required|numeric',
            'right_calf_circumference' => 'required|numeric',
            'left_arm_circumference' => 'required|numeric',
            'left_forearm_circumference' => 'required|numeric',
            'left_thigh_circumference' => 'required|numeric',
            'left_calf_circumference' => 'required|numeric',
            'skinfold_chest' => 'required|numeric',
            'skinfold_axillary' => 'required|numeric',
            'skinfold_suprailiac' => 'required|numeric',
            'skinfold_abdominal' => 'required|numeric',
            'skinfold_thigh' => 'required|numeric',
            'skinfold_calves' => 'required|numeric',
            'skinfold_subscapular' => 'required|numeric',
            'skinfold_tricep' => 'required|numeric'
        ]);

        // Atualize os campos
        $antropometria->antropometria_date = $request->input('antropometria_date');
        $antropometria->weight = $request->input('weight');
        $antropometria->height = $request->input('height');
        $antropometria->bmi = $request->input('bmi');
        $antropometria->lean_mass = $request->input('lean_mass');
        $antropometria->fat_mass = $request->input('fat_mass');
        $antropometria->shoulder_circumference = $request->input('shoulder_circumference');
        $antropometria->chest_circumference = $request->input('chest_circumference');
        $antropometria->waist_circumference = $request->input('waist_circumference');
        $antropometria->abdomen_circumference = $request->input('abdomen_circumference');
        $antropometria->hip_circumference = $request->input('hip_circumference');
        $antropometria->right_arm_circumference = $request->input('right_arm_circumference');
        $antropometria->right_forearm_circumference = $request->input('right_forearm_circumference');
        $antropometria->right_thigh_circumference = $request->input('right_thigh_circumference');
        $antropometria->right_calf_circumference = $request->input('right_calf_circumference');
        $antropometria->left_arm_circumference = $request->input('left_arm_circumference');
        $antropometria->left_forearm_circumference = $request->input('left_forearm_circumference');
        $antropometria->left_thigh_circumference = $request->input('left_thigh_circumference');
        $antropometria->left_calf_circumference = $request->input('left_calf_circumference');
        $antropometria->skinfold_chest = $request->input('skinfold_chest');
        $antropometria->skinfold_axillary = $request->input('skinfold_axillary');
        $antropometria->skinfold_suprailiac = $request->input('skinfold_suprailiac');
        $antropometria->skinfold_abdominal = $request->input('skinfold_abdominal');
        $antropometria->skinfold_thigh = $request->input('skinfold_thigh');
        $antropometria->skinfold_calves = $request->input('skinfold_calves');
        $antropometria->skinfold_subscapular = $request->input('skinfold_subscapular');
        $antropometria->skinfold_tricep = $request->input('skinfold_tricep');
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
