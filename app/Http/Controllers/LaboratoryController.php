<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboratoryController extends Controller
{
    // Exibe o formulário para o usuário escolher os exames
    public function create()
    {
        return view('nutricionist.laboratory.create');
    }

    // Armazena o exame no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'test_type' => 'required',
            'results' => 'required|array',
        ]);

        Laboratory::create([
            'user_id' => Auth::id(),
            'test_type' => $request->test_type,
            'results' => $request->results,
        ]);

        return redirect()->back()->with('success', 'Exame registrado com sucesso!');
    }
}
