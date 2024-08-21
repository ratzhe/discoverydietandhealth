<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        // Verificar se o usuário autenticado é um administrador
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Acesso não autorizado.');
        }

        return view('admin.showRegisterForm');
    }

    /**
     * Handle the registration request.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar os dados do formulário
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'username' => ['string', 'max:255'],
            'phone' => ['string'],
            'role' => ['required', 'string', 'in:admin,nutricionist,patient'],
            'password' => [
                'required',
                'confirmed',
                Rules\Password::min(8)
                    ->mixedCase()
                    ->letters()
                    ->numbers()
                    ->symbols()
            ],
        ]);

        // Criar o novo usuário
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        toastr()->success('Usuário cadastrado com sucesso!');
        return redirect()->route('admin.seeusers');
    }
}
