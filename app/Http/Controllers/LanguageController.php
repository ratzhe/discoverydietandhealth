<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class LanguageController extends Controller
{
    public function switchLang(Request $request)
    {
        // Obtém o valor do idioma enviado pelo formulário
        $locale = $request->input('locale');

        // Armazena o idioma na sessão
        Session::put('locale', $locale);

        // Redireciona para a página anterior
        return redirect()->back();
    }
}
