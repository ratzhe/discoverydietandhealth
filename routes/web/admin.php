
<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\RegisterController;
use App\Http\Controllers\Backend\SeeUsersController;
use App\Http\Middleware\Admin;
use App\Http\Controllers\AnamneseController;


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

// Criar anamnese
Route::post('admin/anamnese/store', [AnamneseController::class, 'anamneseCreateAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.anamnese.store');

// Rota para exibir o formulário de cadastro de anamnese
Route::get('admin/anamnese/create', [AnamneseController::class, 'showAnamneseFormAdmin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.anamnese.create');










