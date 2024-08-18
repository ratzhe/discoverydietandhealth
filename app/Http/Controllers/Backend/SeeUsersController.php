<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();

        //return redirect()->route('admin.seeusers')->with('success', 'Usuário excluído com sucesso!');
        toastr()->success('Usuário excluído com sucesso!');
        return redirect()->route('admin.seeusers');
    }

}
