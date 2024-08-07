<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\TrainerController;

//Rota treinador
Route::get('trainer/dashboard', [TrainerController::class, 'dashboard'])->middleware(['auth', 'trainer'])->name('trainer.dashboard');
