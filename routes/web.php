<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\NutricionistController;
use App\Http\Controllers\Backend\PatientController;
use App\Http\Controllers\Backend\TrainerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('admin.dashboard');
//Rota nutricionista
Route::get('nutricionist/dashboard', [NutricionistController::class, 'dashboard'])->middleware(['auth', 'nutricionist'])->name('nutricionist.dashboard');
//Rota treinador
Route::get('trainer/dashboard', [TrainerController::class, 'dashboard'])->middleware(['auth', 'trainer'])->name('trainer.dashboard');
//Rota patient
Route::get('patient/dashboard', [PatientController::class, 'dashboard'])->middleware(['auth', 'nutricionist'])->name('patient.dashboard');
