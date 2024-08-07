<
<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;

//Rota admin
Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('admin.dashboard');
