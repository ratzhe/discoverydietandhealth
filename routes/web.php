<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\LanguageController;
use app\http\controllers\MealPlanController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

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

Route::post('/switch-lang', [LanguageController::class, 'switchLang'])->name('switchLang');

Route::middleware('auth')->group(function () {
    Route::get('/laboratory-tests/create', [LaboratoryController::class, 'create'])->name('nutricionist.laboratory.create');
    Route::post('/laboratory-tests', [LaboratoryController::class, 'store'])->name('nutricionist.laboratory.store');
});
