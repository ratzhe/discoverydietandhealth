<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Anamnese;
use Carbon\Carbon;

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

    public function index() {
        $anamneses = Anamnese::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                             ->whereYear('created_at', Carbon::now()->year) // Filtra para o ano atual
                             ->groupBy('month')
                             ->orderBy('month')
                             ->get();

        // Extrair os meses e as contagens para passar para a view
        $months = $anamneses->pluck('month')->map(function($month) {
            $monthNames = [
                1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun',
                7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec'
            ];
            return $monthNames[$month];
        });

        $counts = $anamneses->pluck('count');

        return view('admin.dashboard', compact('months', 'counts')); // Passar $months e $counts para a view
    }

    public function showDashboard()
{
    // Defina a variável $months com os dados necessários, como um array de meses
    $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']; // Exemplo de dados

    // Passe para a view
    return view('admin.dashboard', compact('months'));
}



}
