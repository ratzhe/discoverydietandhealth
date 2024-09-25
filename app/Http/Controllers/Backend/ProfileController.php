<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class ProfileController extends Controller
{
    public function index()
    {
        // Verifique o papel do usuário e retorne a visualização apropriada
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('admin.profile.index');
        } elseif ($user->role === 'nutricionist') {
            return view('nutricionist.profile.index');
        } elseif ($user->role === 'patient') {
            return view('patient.profile.index');
        } else {
            abort(403, 'Acesso não autorizado.');
        }
    }

    public function update(Request $request)
{
    // Validação dos dados
    $request->validate([
        'name' => ['max:100'],
        'image' => ['image', 'max:2048'],
        'phone' => ['nullable', 'string'],
        'datebirth' => ['nullable', 'date'],
        'salario' => ['nullable', 'string'],
        'cep' => ['nullable', 'string'],
        'street' => ['nullable', 'string'],
        'neighborhood' => ['nullable', 'string'],
        'city' => ['nullable', 'string'],
        'state' => ['nullable', 'string', 'size:2'],
        'number' => ['nullable', 'string'],
        'complement' => ['nullable', 'string'],
    ]);

    $user = Auth::user();

    // Verifica se uma nova imagem foi enviada e deleta a anterior
    if ($request->hasFile('image')) {
        if (File::exists(public_path($user->image))) {
            File::delete(public_path($user->image));
        }

        // Move a nova imagem para a pasta uploads
        $image = $request->image;
        $imageName = rand() . '-ddh-' . $image->getClientOriginalName();
        $image->move(public_path('uploads'), $imageName);

        // Define o caminho da nova imagem
        $user->image = "/uploads/" . $imageName;
    }

    // Atualiza os dados do usuário
    $user->name = $request->name;
    $user->name = $request->name;
    $user->phone = $request->phone;
    $user->salario = $request->salario;
    $user->datebirth = $request->datebirth;
    $user->save();

    // Atualiza os dados do endereço relacionado ou cria um novo se não existir
    $address = $user->address()->first();
    if ($address) {
        $address->update([
            'cep' => $request->cep,
            'street' => $request->street,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'number' => $request->number,
            'complement' => $request->complement,
        ]);
    } else {
        $user->address()->create([
            'cep' => $request->cep,
            'street' => $request->street,
            'neighborhood' => $request->neighborhood,
            'city' => $request->city,
            'state' => $request->state,
            'number' => $request->number,
            'complement' => $request->complement,
        ]);
    }

    toastr()->success('Dados atualizados com sucesso!');
    return redirect()->back();
}

    public function updatePassword(Request $request)
    {
        // Validação da senha
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        // Atualiza a senha do usuário
        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        toastr()->success('Senha alterada com sucesso!');
        return redirect()->back();
    }
}
