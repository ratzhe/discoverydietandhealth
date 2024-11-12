
<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RegisterController;
use App\Http\Controllers\Backend\SeeUsersController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\AnamneseController;
use App\Http\Controllers\AntropometriaController;
use App\Http\Controllers\MealPlanController;

Route::post('admin/logout', [AdminController::class, 'logout'])
->name('logout');

//Rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])
->middleware(['auth', 'admin'])
->name('admin.dashboard');

//Rota admin ver perfil
Route::get('admin/profile', [ProfileController::class, 'index'])
->middleware(['auth', 'admin'])
->name('admin.profile');

// Rota admin para atualizar o perfil
Route::post('admin/profile/update', [ProfileController::class, 'update'])
->middleware(['auth', 'admin'])
->name('admin.profile.update');

// Rota admin para atualizar a senha do perfil
Route::post('admin/profile/update/password', [ProfileController::class, 'updatePassword'])
->middleware(['auth', 'admin'])
->name('admin.profile.password');

// Rota admin cadastrar usuários
Route::post('admin/register', [AdminController::class, 'register'])
->middleware(['auth', 'admin'])
->name('admin.register');

Route::get('admin/register', [AdminController::class, 'showRegisterForm'])
->middleware(['auth', 'admin'])
->name('admin.showRegisterForm');


Route::post('admin/register', [RegisterController::class, 'store'])
->middleware(['auth', 'admin'])
->name('admin.store');

Route::get('admin/users/{id}/edit', [SeeUsersController::class, 'editUser'])
->middleware(['auth', 'admin'])
->name('admin.editUser');

Route::get('admin/users/see', [SeeUsersController::class, 'seeUsers'])
->middleware(['auth', 'admin'])
->name('admin.seeusers');

// Rota para excluir usuário
Route::delete('admin/users/{id}', [SeeUsersController::class, 'destroy'])
->middleware(['auth', 'admin'])
->name('admin.deleteUser');

// Rota para atualizar usuário
Route::put('admin/users/{id}', [SeeUsersController::class, 'update'])
->middleware(['auth', 'admin'])
->name('admin.updateUser');

// Acessar o dashboard do usuário
Route::get('admin/nutricionist/{id}/dashboard', [AdminController::class, 'nutricionistDashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.nutricionistDashboard');

// Visualizar lista de anamneses no dashboard de administrador
Route::get('admin/anamnese', [AnamneseController::class, 'anamneseDashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.anamnese.dashboard');

// Visualizar uma anamnese específica
Route::get('admin/anamnese/{id}', [AnamneseController::class, 'showAnamneseAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.anamnese.show');

// Formulário para editar anamnese
Route::get('admin/anamnese/{id}/edit', [AnamneseController::class, 'showAnamneseEditFormAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.anamnese.edit');

// Atualizar anamnese
Route::put('admin/anamnese/{id}', [AnamneseController::class, 'updateAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.anamnese.update');

// Excluir anamnese
Route::delete('admin/anamnese/{id}', [AnamneseController::class, 'destroyAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.anamnese.delete');

// Filtro Anamnsese
Route::get('admin/anamnese/see', [AnamneseController::class, 'seeAnamnese'])
->middleware(['auth', 'admin'])
->name('admin.anamnese.see');


// Visualizar lista de antropometria no dashboard de administrador
Route::get('admin/antropometria', [AntropometriaController::class, 'antropometriaDashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.antropometria.dashboard');

// Visualizar uma antropometria específica
Route::get('admin/antropometria/{id}', [AntropometriaController::class, 'showAntropometriaAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.antropometria.show');

// Formulário para editar antropometria
Route::get('admin/antropometria/{id}/edit', [AntropometriaController::class, 'showAntropometriaEditFormAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.antropometria.edit');

// Atualizar antropometria
Route::put('admin/antropometria/{id}', [AntropometriaController::class, 'updateAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.antropometria.update');

// Excluir antropometria
Route::delete('admin/antropometria/{id}', [AntropometriaController::class, 'destroyAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.antropometria.delete');

//Plano Alimentar

// Ver plano alimentar
Route::get('admin/mealplan/dashboard', [MealPlanController::class, 'MealplanDashboardAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.mealplan.dashboard');

// Apagar plano alimentar
Route::delete('admin/mealplan/{id}', [MealPlanController::class, 'deleteAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.mealplan.delete');

// Atualizar plano alimentar
Route::put('admin/mealplan/update/{id}', [MealPlanController::class, 'updateAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.mealplan.update');


// Formulário para editar mealplan
Route::get('admin/mealplan/{id}/edit', [MealPlanController::class, 'showMealplanEditFormAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.mealplan.edit');


Route::get('admin/mealplan/update/{id}', [MealPlanController::class, 'updateAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.mealplan.update');

// Visualizar uma mealplan específica
Route::get('admin/mealplan/{id}', [MealPlanController::class, 'showMealplanAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.mealplan.show');







