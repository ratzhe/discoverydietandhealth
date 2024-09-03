<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    public function create()
{
    // Buscar os exames do paciente autenticado
    $exams = Exam::where('user_id', Auth::id())->get();

    // Passar os exames para a view
    return view('patient.exam.create', ['exams' => $exams]);
}

    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:pdf|max:2048',
        'exam_name' => 'required|string|max:255',
        'date' => 'required|date',
        'description' => 'required',
    ]);

    $file = $request->file('file');

    //dd($file->getMimeType(), $file->getClientOriginalExtension());

    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('exams', $fileName, 'public');

    Exam::create([
        'user_id' => Auth::id(),
        'file_path' => $filePath,
        'file_name' => $file->getClientOriginalName(),
        'exam_name' => $request->input('exam_name'),
        'date' => $request->input('date'),
        'description' => $request->input('description'),
    ]);

    //return redirect()->route('patient.exam.create')->with('success', 'Arquivo carregado com sucesso!');
    toastr()->success('Arquivo carregado com sucesso!');
    return redirect()->route('patient.exam.create');
}

public function destroy($id){
    $exam = Exam::findOrFail($id);
    $exam->delete();

    toastr()->success('Exame excluído com sucesso!');
    return redirect()->route('patient.exam.create');
}

public function show()
{
    $exams = Exam::all();

    foreach ($exams as $exam) {
        if (!Storage::disk('public')->exists($exam->file_path)) {
            dd('File not found: ' . $exam->file_path);
        }
    }

    return view('patient.exam.create', compact('exams'));
}

}
