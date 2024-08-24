<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\NutricionistController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SeeUsersController;

//Rota nutricionista
Route::get('nutricionist/dashboard', [NutricionistController::class, 'dashboard'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.dashboard');

//Rota nutricionista ver perfil
Route::get('nutricionist/profile', [ProfileController::class, 'index'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.profile');

// Rota nutricionist para atualizar o perfil
Route::post('nutricionist/profile/update', [ProfileController::class, 'update'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.profile.update');

// Rota admin para atualizar a senha do perfil
Route::post('nutricionist/profile/update/password', [ProfileController::class, 'updatePassword'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.profile.password');

// Ver os pacientes
Route::get('nutricionist/users/see', [SeeUsersController::class, 'seePatients'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.seepatients');
