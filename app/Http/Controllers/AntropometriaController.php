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
        // Busca as anamneses do paciente logado, com os pacientes e nutricionistas relacionados
        $antropometriaList = Antropometria::with(['patient', 'nutricionist'])
                        ->where('patient_id', auth()->id()) // Filtra pelo paciente logado
                        ->get();

        return view('patient.antropometria.dashboard', compact('antropometriaList'));
    }



}

