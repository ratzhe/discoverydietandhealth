<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SeeUsersController extends Controller
{
    public function editUser($id) {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }

    public function seeUsers(Request $request) {
        //filtro
        //dd($request->search);
        //$users = User::all(); // retorna os usuários
        $search = $request->search;

        $users = User::where(function ($query) use ($search){
            if($search){
                $query->where('email', $search);
                $query->orWhere('name', 'LIKE', "%{$search}%");
            }
        })->get();
        return view('admin.seeusers', compact('users'));
    }

    public function seePatients(Request $request) {
        $search = $request->search;
        $users = User::where('role', 'patient')
            ->where(function ($query) use ($search) {
                if ($search) {
                    $query->where('email', 'LIKE', "%{$search}%")
                          ->orWhere('name', 'LIKE', "%{$search}%");
                }
            })->get();

        return view('nutricionist.seepatients', compact('users'));
    }

    public function update(Request $request, $id) {
        // Valida os dados do formulário
        $request->validate([
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email,' . $id],
            'username' => ['sometimes', 'string', 'max:255'],
            'phone' => ['sometimes', 'string'],
            'role' => ['sometimes', 'string', 'in:admin,nutricionist,trainer,patient'],
            'cpf' => ['required', 'string', 'size:14'], // Ex: 000.000.000-00
            'rg' => ['required', 'string', 'size:12'], // Ex: 00.000.000-0
            'datebirth' => ['required', 'date'],
            // Validações para os campos de endereço
            'cep' => ['required', 'string', 'size:9'], // Ex: 99999-999
            'street' => ['required', 'string', 'max:255'],
            'neighborhood' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'state' => ['required', 'string', 'size:2'], // Ex: SP
            'number' => ['required', 'string', 'max:10'],
            'complement' => ['nullable', 'string', 'max:255'],
        ]);

        // Encontra o usuário pelo ID
        $user = User::findOrFail($id);

        // Atualiza os campos do usuário
        $user->update($request->only(['name', 'email', 'username', 'phone', 'role', 'cpf', 'rg', 'datebirth']));

        // Atualiza ou cria o endereço associado
        $user->address()->updateOrCreate(
            ['user_id' => $user->id],
            $request->only(['cep', 'street', 'neighborhood', 'city', 'state', 'number', 'complement'])
        );

        return redirect()->route('admin.seeusers')->with('success', 'Usuário atualizados com sucesso!');
    }


    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        toastr()->success('Usuário excluído com sucesso!');
        return redirect()->route('admin.seeusers');
    }

    public function seerelatorio() {
        return view('nutricionist.relatorio');
    }


}
