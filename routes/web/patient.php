<?php

use App\Http\Controllers\Backend\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AnamneseController;

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

//Rota exames
Route::get('patient/exam', [PatientController::class, 'exam'])
->middleware(['auth', 'patient'])
->name('patient.exam.index');

Route::get('patient/exam/create', [ExamController::class, 'create'])
->middleware(['auth', 'patient'])
->name('patient.exam.create');


Route::post('patient/exam', [ExamController::class, 'store'])
->middleware(['auth', 'patient'])
->name('patient.exam.store');

// Rota para excluir exame
Route::delete('patient/exam/{id}', [ExamController::class, 'destroy'])
->middleware(['auth', 'patient'])
->name('patient.exam.deleteExam');


Route::get('patient/anamneses', [AnamneseController::class, 'showPatientAnamneses'])
->middleware(['auth', 'patient'])
->name('patient.anamneses');

Route::get('/patient/anamnese/{id}/download', [AnamneseController::class, 'downloadAnamnesePdf'])->name('patient.anamnese.download');



