<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NutricionistController extends Controller
{
    public function dashboard(){
        return view('nutricionist/dashboard');
    }
}
