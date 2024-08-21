<?php

use App\Http\Controllers\Backend\AdminController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Chamando rotas
foreach(File::allfiles(__DIR__.'/web') as $route_file){
    require $route_file->getPathname();
}

require __DIR__.'/auth.php';

// rota admin
Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('admin/forgot-password', [AdminController::class, 'forgot'])->name('admin.forgot');
