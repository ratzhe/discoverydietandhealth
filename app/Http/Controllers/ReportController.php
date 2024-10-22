<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class ReportController extends Controller
{
    public function index()
    {
        // Obtendo todos os usuários cadastrados
        $users = User::all();
        return view('admin.users-report', compact('users'));
    }

    public function exportExcel()
    {
        //return Excel::download(new UsersExport, 'users_report.xlsx');
    }
}

