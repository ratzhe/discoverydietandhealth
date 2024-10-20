<?php

use App\Http\Controllers\AnamneseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\NutricionistController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SeeUsersController;
use App\Http\Controllers\MealPlanController;

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

//Rota nutricionistaa
Route::get('nutricionist/anamnese/dashboard', [AnamneseController::class, 'anamneseDashboard'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.anamnese.dashboard');

//Rota nutricionista
Route::get('nutricionist/anamnese/create', [AnamneseController::class, 'showAnamneseForm'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.anamnese.create');

Route::post('nutricionist/anamnese/store', [AnamneseController::class, 'anamneseCreate'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.anamnese.store');

Route::put('nutricionist/anamnese/update/{id}', [AnamneseController::class, 'update'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.anamnese.update');

Route::get('nutricionist/anamnese/edit/{id}', [AnamneseController::class, 'showAnamneseEdit'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.anamnese.edit');

// Ver relatório
Route::get('nutricionist/relatorio', [SeeUsersController::class, 'seerelatorio'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.relatorio');

// Rota para excluir usuário
Route::delete('nutricionist/ananmese/{id}', [AnamneseController::class, 'destroy'])
->middleware(['auth', 'nutricionist'])
->name('nutricionist.anamnese.delete');

// Rota nutricionista para o dashboard de antropometria
Route::get('nutricionist/antropometria/dashboard', [NutricionistController::class, 'antropometriaDashboard'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.antropometria.dashboard');

// Rota para mostrar o formulário de criação de antropometria
Route::get('nutricionist/antropometria/create', [NutricionistController::class, 'showAntropometriaForm'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.antropometria.create');

// Rota para armazenar dados de antropometria
Route::post('nutricionist/antropometria/store', [NutricionistController::class, 'antropometriaCreate'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.antropometria.store');

// Rota para mostrar o formulário de edição de antropometria
Route::get('nutricionist/antropometria/edit/{id}', [NutricionistController::class, 'showAntropometriaEditForm'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.antropometria.edit');

// Rota para atualizar os dados de antropometria
Route::put('nutricionist/antropometria/update/{id}', [NutricionistController::class, 'antropometriaUpdate'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.antropometria.update');

// Rota para excluir antropometria
Route::delete('nutricionist/antropometria/{id}', [NutricionistController::class, 'antropometriaDestroy'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.antropometria.delete');

Route::get('nutricionist/antropometria/see', [NutricionistController::class, 'seeAntropometria'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.antropometria.index');

//////////////////
// Rota nutricionista para o dashboard de plano alimentar
Route::get('nutricionist/mealplan/dashboard', [NutricionistController::class, 'mealplanDashboard'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.mealplan.dashboard');

// Rota para mostrar o formulário de criação de plano alimentar
Route::get('nutricionist/mealplan/create', [NutricionistController::class, 'showmealplanForm'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.mealplan.create');

// Rota para armazenar dados de plano alimentar
Route::post('nutricionist/mealplan/store', [NutricionistController::class, 'mealplanCreate'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.mealplan.store');

// Rota para mostrar o formulário de edição de plano alimentar
Route::get('nutricionist/mealplan/edit/{id}', [NutricionistController::class, 'showmealplanEditForm'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.mealplan.edit');

// Rota para atualizar os dados de plano alimentar
Route::put('nutricionist/mealplan/update/{id}', [NutricionistController::class, 'mealplanUpdate'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.mealplan.update');

// Rota para excluir plano alimentar
Route::delete('nutricionist/mealplan/{id}', [NutricionistController::class, 'mealplanDestroy'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.mealplan.delete');

// Ver plano alimentar
Route::get('nutricionist/mealplan/see', [NutricionistController::class, 'seemealplan'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.mealplan.index');

// teste
Route::get('nutricionist/meal-plan/create', [MealPlanController::class, 'create'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.meal-plan.create');


Route::get('nutricionist/meal-plan/store', [MealPlanController::class, 'store'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.meal-plan.store');

Route::post('nutricionist/meal-plan/store', [MealPlanController::class, 'store'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.meal-plan.store');

// Ver plano alimentar
Route::get('nutricionist/meal-plan/dashboard', [MealPlanController::class, 'MealplanDashboard'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.meal-plan.dashboard');


Route::delete('nutricionist/meal-plan/{id}', [MealPlanController::class, 'delete'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.meal-plan.delete');

Route::put('nutricionist/meal-plan/update/{id}', [MealPlanController::class, 'update'])
    ->middleware(['auth', 'nutricionist'])
    ->name('nutricionist.anamnese.update');
