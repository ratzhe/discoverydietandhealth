<?php

namespace App\Http\Controllers;

use App\Models\Antropometria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class AntropometriaController extends Controller
{
    public function showAntropometriaEdit($id)
    {
        $antropometria = Antropometria::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.antropometria.edit', compact('antropometria', 'patients'));
    }

    //Visualização do paciente
    public function showPatientAntropometria()
    {
        $pacienteId = Auth::id(); // ID do usuário logado
        $antropometrias = Antropometria::where('patient_id', $pacienteId)->get();

        return view('patient.antropometria.list', compact('antropometrias'));
    }

    public function showAntropometria($id) {
        // Busca a anamnese específica pelo ID
        $antropometria = Antropometria::with(['patient', 'nutricionist'])->findOrFail($id);

        return view('patient.antropometria.view', compact('antropometria'));
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

    public function downloadAntropometriaPdf($id)
    {
        // Encontra a anamnese pelo ID
        $antropometria = Antropometria::findOrFail($id);

        // Gera o PDF
        $pdf = PDF::loadView('patient.antropometria.pdf', compact('antropometria'));

        // Retorna o PDF como download
        return $pdf->download('antropometria_' . $antropometria->id . '.pdf');
    }

    public function antropometriaDashboardPatient(){
        $antropometriaList = Antropometria::with(['patient', 'nutricionist'])
                        ->where('patient_id', auth()->id()) // Filtra pelo paciente logado
                        ->get();

        return view('patient.antropometria.dashboard', compact('antropometriaList'));
    }

    public function antropometriaDashboard()
    {
        // Verifique o papel do usuário logado
        if (Auth::user()->role === 'admin') {
            // Administrador vê todas as antropometrias
            $antropometriaList = Antropometria::with(['patient', 'nutricionist'])->get();
            return view('admin/antropometria/dashboard', compact('antropometriaList'));
        } else {
            // Nutricionista vê apenas as suas próprias antropometrias
            $antropometriaList = Antropometria::with(['patient', 'nutricionist'])
                                    ->where('nutricionist_id', Auth::id())
                                    ->get();
            return view('nutricionist/antropometria/dashboard', compact('antropometriaList'));
        }
    }

    public function showAntropometriaAdmin($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        $antropometria = Antropometria::with(['patient', 'nutricionist'])->findOrFail($id);
        return view('admin/antropometria/show', compact('antropometria'));
    }


    public function showAntropometriaEditFormAdmin($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        $antropometria = Antropometria::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('admin/antropometria/edit', compact('antropometria', 'patients'));
    }

    public function updateAdmin(Request $request, $id)
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

        return redirect()->route('admin.antropometria.dashboard')->with('success', 'Avaliação Antropométrica atualizada com sucesso!');
    }

    public function destroyAdmin($id){
        $antropometria = Antropometria::findOrFail($id);
        $antropometria->delete();

        toastr()->success('Avaliação Antropométrica excluída com sucesso!');
        return redirect()->route('admin.antropometria.dashboard');
    }



}

