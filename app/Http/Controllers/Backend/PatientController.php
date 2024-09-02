<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function dashboard(){
        return view('patient/dashboard');
    }

    public function exam(){
        return view('patient/exam/index');
    }
}
