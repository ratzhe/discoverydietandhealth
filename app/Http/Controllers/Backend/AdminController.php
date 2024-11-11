<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Anamnese;
use App\Models\Antropometria;
use App\Models\MealPlan;
use Carbon\Carbon;

class AdminController extends Controller
{
    //public function dashboard(){
        //$totalUsers = User::all()->count();
       // $totalAdmins = User::where('role', 'admin')->count();
       // $totalNutricionist = User::where('role', 'nutricionist')->count();
       // $totalPatient = User::where('role', 'patient')->count();

        // Passe a contagem para a view
       // return view('admin.dashboard', compact('totalUsers', 'totalAdmins', 'totalNutricionist', 'totalPatient'));
   // }

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

    public function dashboard()
    {

        $totalUsers = User::all()->count();
        $totalAdmins = User::where('role', 'admin')->count();
        $totalNutricionist = User::where('role', 'nutricionist')->count();
        $totalPatient = User::where('role', 'patient')->count();
        // Exemplo de consulta para contar as anamneses por mês
        $anamneses = Anamnese::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->groupBy('month')
                            ->get();

        $months = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
        $anamnesesPerMonth = array_fill(0, 12, 0);

        foreach ($anamneses as $anamnese) {
            $anamnesesPerMonth[$anamnese->month - 1] = $anamnese->count;
        }

        $antropometrias = Antropometria::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->groupBy('month')
                            ->get();

        $antropometriaPerMonth = array_fill(0, 12, 0);
        foreach ($antropometrias as $antropometria) {
            $antropometriaPerMonth[$antropometria->month - 1] = $antropometria->count;
        }

        $mealplans = MealPlan::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
                            ->groupBy('month')
                            ->get();

        $mealplanPerMonth = array_fill(0, 12, 0);
        foreach ($mealplans as $mealplan) {
            $mealplanPerMonth[$mealplan->month - 1] = $mealplan->count;
        }

        return view('admin.dashboard', compact('months', 'anamnesesPerMonth', 'antropometriaPerMonth', 'mealplanPerMonth', 'totalAdmins', 'totalNutricionist', 'totalPatient', 'totalUsers'));
    }



}
