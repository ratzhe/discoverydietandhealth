<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\NutricionistController;

//Rota nutricionista
Route::get('nutricionist/dashboard', [NutricionistController::class, 'dashboard'])->middleware(['auth', 'nutricionist'])->name('nutricionist.dashboard');
