<?php

use App\Http\Controllers\Backend\PatientController;
use Illuminate\Support\Facades\Route;

//Rota patient
Route::get('patient/dashboard', [PatientController::class, 'dashboard'])->middleware(['auth', 'patient'])->name('patient.dashboard');
