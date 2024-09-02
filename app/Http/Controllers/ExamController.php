<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function create()
    {
        return view('patient.exam.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:pdf|max:2048', // Valida que o arquivo é um PDF e tem no máximo 2MB
        'exam_name' => 'required|string|max:255', // Valida que o nome do exame é obrigatório e uma string com no máximo 255 caracteres
        'date' => 'required|date', // Valida que a data do exame é obrigatória e uma data válida
    ]);

    $file = $request->file('file');


    $fileName = time() . '_' . $file->getClientOriginalName();
    $filePath = $file->storeAs('exams', $fileName, 'public');

    Exam::create([
        'user_id' => Auth::id(), // ID do usuário autenticado
        'file_path' => $filePath,
        'file_name' => $file->getClientOriginalName(),
        'exam_name' => $request->input('exam_name'), // Adiciona o nome do exame
        'date' => $request->input('date'), // Adiciona a data do exame
    ]);

    return redirect()->route('patient.exams.create')->with('success', 'Arquivo carregado com sucesso!');
}

}
