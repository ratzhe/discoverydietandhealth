<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anamnese;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
//use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf;


class AnamneseController extends Controller
{
    public function anamneseDashboard()
{
    // Verifique o papel do usuário logado
    if (Auth::user()->role === 'admin') {
        // Administrador vê todas as anamneses
        $anamneseList = Anamnese::with(['patient', 'nutricionist'])->get();
        return view('admin/anamnese/dashboard', compact('anamneseList'));
    } else {
        // Nutricionista vê apenas as suas próprias anamneses
        $anamneseList = Anamnese::with(['patient', 'nutricionist'])
                                ->where('nutricionist_id', Auth::id())
                                ->get();
        return view('nutricionist/anamnese/dashboard', compact('anamneseList'));
    }
}

        public function anamneseCreate(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'anamnese_date' => 'required|date'
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

    public function anamneseCreateAdmin(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'nutricionist_id' => 'required|exists:users,id',
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
            'anamnese_date' => 'required|date'
        ]);

        $anamnese = new Anamnese();
        $anamnese->patient_id = $request->input('patient_id');
        $anamnese->nutricionist_id = $request->input('nutricionist_id'); // Nutricionista selecionado pelo admin
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

        return redirect()->route('admin.anamnese.dashboard')->with('success', 'Anamnese cadastrada com sucesso!');
    }


    public function showAnamneseForm()
    {
        $patients = User::where('role', 'patient')->get();
        return view('nutricionist.anamnese.create', compact('patients'));
    }

    public function showAnamneseFormAdmin()
    {
        $patients = User::where('role', 'patient')->get(); // Selecionando os pacientes
        $nutricionists = User::where('role', 'nutricionist')->get(); // Selecionando os nutricionistas
        return view('admin.anamnese.create', compact('patients', 'nutricionists'));
    }

    public function showAnamneseEditFormAdmin($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        $anamnese = Anamnese::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('admin/anamnese/edit', compact('anamnese', 'patients'));
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

    public function updateAdmin(Request $request, $id)
    {
        $anamnese = Anamnese::findOrFail($id);

        $request->validate([
            'weight' => 'required|numeric',
            'height' => 'required|numeric',
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

        return redirect()->route('admin.anamnese.dashboard')->with('success', 'Anamnese atualizada com sucesso!');
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

        toastr()->success('Anamnese excluída com sucesso!');
        return redirect()->route('nutricionist.anamnese.dashboard');
    }

    public function destroyAdmin($id){
        $anamnese = Anamnese::findOrFail($id);
        $anamnese->delete();

        toastr()->success('Anamnese excluída com sucesso!');
        return redirect()->route('admin.anamnese.dashboard');
    }


    public function showAnamneseEdit($id)
    {
        $anamnese = Anamnese::findOrFail($id);
        $patients = User::where('role', 'patient')->get(); // Busque os pacientes
        return view('nutricionist.anamnese.edit', compact('anamnese', 'patients'));
    }

    //Visualização do paciente
    public function showPatientAnamneses()
    {
        $pacienteId = Auth::id(); // ID do usuário logado
        $anamneses = Anamnese::where('patient_id', $pacienteId)->get();

        return view('patient.anamnese.list', compact('anamneses'));
    }

    public function showAnamnese($id) {
        // Busca a anamnese específica pelo ID
        $anamnese = Anamnese::with(['patient', 'nutricionist'])->findOrFail($id);

        return view('patient.anamnese.view', compact('anamnese'));
    }

    public function showAnamneseAdmin($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        $anamnese = Anamnese::with(['patient', 'nutricionist'])->findOrFail($id);
        return view('admin/anamnese/show', compact('anamnese'));
    }


    public function downloadAnamnesePdf($id)
    {
        // Encontra a anamnese pelo ID
        $anamnese = Anamnese::findOrFail($id);

        // Gera o PDF
        $pdf = PDF::loadView('patient.anamnese.pdf', compact('anamnese'));

        // Retorna o PDF como download
        return $pdf->download('anamnese_' . $anamnese->id . '.pdf');
    }

    public function anamneseDashboardPatient(){
        $anamneseList = Anamnese::with(['patient', 'nutricionist'])
                        ->where('patient_id', auth()->id())
                        ->get();

        return view('patient.anamnese.dashboard', compact('anamneseList'));
    }

    public function seeAnamnese(Request $request) {
        $search = $request->search;

        // Busca anamneses com pacientes e nutricionistas correspondentes
        $anamneseList = Anamnese::with('patient', 'nutricionist')
            ->whereHas('patient', function ($query) use ($search) {
                if ($search) {
                    $query->where('name', 'LIKE', "%{$search}%")
                          ->orWhere('email', 'LIKE', "%{$search}%");
                }
            })
            ->get();

        return view('admin.anamnese', compact('anamneseList'));
    }


}
