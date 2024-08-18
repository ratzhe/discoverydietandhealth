<
<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Middleware\Admin;

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



