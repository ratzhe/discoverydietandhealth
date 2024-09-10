<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard(){
        $totalUsers = User::all()->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalNutricionist = User::where('role', 'nutricionist')->count();
        $totalPatient = User::where('role', 'patient')->count();

        // Passe a contagem para a view
        return view('admin.dashboard', compact('totalUsers', 'totalAdmins', 'totalNutricionist', 'totalPatient'));
    }

    public function login(){

        return view('admin/auth/login');
    }

    public function forgot(){
        return view('admin/auth/forgot-password');
    }

    public function register(){
        return view('admin/register');
    }

    public function showRegisterForm() {
        return view('admin.register');
    }

    public function seeUsers() {
        return view('admin.seeusers');
    }

    // Adicione o método logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin/auth/login');
    }

    public function nutricionistDashboard($id) {
        $nutricionista = User::findOrFail($id); // Obtém o nutricionista pelo ID ou retorna erro 404 se não encontrado
        $totalPatient = User::where('role', 'patient')->count();

        return view('nutricionist.dashboard', compact('nutricionista', 'totalPatient'));
    }
}
