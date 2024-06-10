<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\ChartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SiteController::class, 'index'])->name('home');

Route::middleware(['auth',  'verified'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard/read', [DashboardController::class, 'read'])->name('read');
    // Route::get('/dashboard/set', [DashboardController::class, 'set'])->name('set');
    Route::get('/profil', [UserController::class, 'profile'])->name('profile');
    // make route name npk.store
    Route::post('/npk', [DashboardController::class, 'store'])->name('npk.store');
    Route::post('/profil', [UserController::class, 'updateProfile']);
    Route::resource('user', UserController::class);

    //Sensor controller
    Route::resource('dashboard', SensorController::class);

    //Chart
    Route::get('/chart', [ChartController::class, 'index']);
});