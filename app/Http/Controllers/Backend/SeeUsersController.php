<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SeeUsersController extends Controller
{
    public function editUser($id) {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function seeUsers() {
        $users = User::all(); // Obtenha todos os usuários
        return view('admin.seeusers', compact('users'));
    }

    public function update(Request $request, $id) {
        // Validar os dados do formulário
        $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'username' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string'],
            'role' => ['sometimes', 'string', 'in:admin,nutricionist,trainer,patient'],
            'password' => ['sometimes', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::findOrFail($id);

        // Atualizar apenas os campos que foram preenchidos
        $user->name = $request->input('name', $user->name);
        $user->email = $request->input('email', $user->email);
        $user->username = $request->input('username', $user->username);
        $user->phone = $request->input('phone', $user->phone);
        $user->role = $request->input('role', $user->role);

        // Atualizar a senha somente se for fornecida
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->save();

        // Redirecionar com uma mensagem de sucesso
        toastr()->success('Usuário atualizado com sucesso!');
        return redirect()->route('admin.seeusers');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        toastr()->success('Usuário excluído com sucesso!');
        return redirect()->route('admin.seeusers');
    }
}
