<?php

use App\Http\Controllers\Backend\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;

//Rota patient
Route::get('patient/dashboard', [PatientController::class, 'dashboard'])
->middleware(['auth', 'patient'])
->name('patient.dashboard');

//Rota paciente ver perfil
Route::get('patient/profile', [ProfileController::class, 'index'])
->middleware(['auth', 'patient'])
->name('patient.profile');

// Rota patient para atualizar o perfil
Route::post('patient/profile/update', [ProfileController::class, 'update'])
->middleware(['auth', 'patient'])
->name('patient.profile.update');

// Rota admin para atualizar a senha do perfil
Route::post('patient/profile/update/password', [ProfileController::class, 'updatePassword'])
->middleware(['auth', 'patient'])
->name('patient.profile.password');

