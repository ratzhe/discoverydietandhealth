<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin/dashboard');
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
}
