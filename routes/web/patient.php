<?php

use App\Http\Controllers\Backend\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\AntropometriaController;
use App\Http\Controllers\MealPlanController;
use App\Models\Antropometria;

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

// Anamnese
Route::get('patient/anamnese/list', [AnamneseController::class, 'showPatientAnamneses'])
->middleware(['auth', 'patient'])
->name('patient.anamnese.list');

Route::get('patient/anamnese/dashboard', [AnamneseController::class, 'anamneseDashboardPatient'])
->middleware(['auth', 'patient'])
->name('patient.anamnese.dashboard');

Route::get('/patient/anamnese/{id}/download', [AnamneseController::class, 'downloadAnamnesePdf'])
->middleware(['auth', 'patient'])
->name('patient.anamnese.download');

Route::get('/patient/anamnese/{id}', [AnamneseController::class, 'showAnamnese'])
->middleware(['auth', 'patient'])
->name('patient.anamnese.view');


// Antropometria
Route::get('patient/antropometria/list', [AntropometriaController::class, 'showPatientAntropometria'])
->middleware(['auth', 'patient'])
->name('patient.antropometria.list');

Route::get('patient/antropometria/dashboard', [AntropometriaController::class, 'antropometriaDashboardPatient'])
->middleware(['auth', 'patient'])
->name('patient.antropometria.dashboard');

Route::get('/patient/antropometria/{id}/download', [AntropometriaController::class, 'downloadAntropometriaPdf'])
->middleware(['auth', 'patient'])
->name('patient.antropometria.download');

Route::get('/patient/antropometria/{id}', [AntropometriaController::class, 'showAntropometria'])
->middleware(['auth', 'patient'])
->name('patient.antropometria.view');

// Plano Alimentar
Route::get('patient/mealplan/dashboard', [MealPlanController::class, 'mealPlanDashboardPatient'])
->middleware(['auth', 'patient'])
->name('patient.mealplan.dashboard');

Route::get('/patient/mealplan/{id}', [MealPlanController::class, 'showMealplan'])
->middleware(['auth', 'patient'])
->name('patient.mealplan.view');

Route::get('/patient/mealplan/{id}/download', [MealPlanController::class, 'downloadMealplanPdf'])
->middleware(['auth', 'patient'])
->name('patient.mealplan.download');









