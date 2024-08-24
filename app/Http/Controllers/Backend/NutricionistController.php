<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class NutricionistController extends Controller
{
    public function dashboard(){
        $totalPatient = User::where('role', 'patient')->count();

        return view('nutricionist/dashboard', compact('totalPatient'));
    }


}
