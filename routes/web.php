<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\KecamatanDesaController;
use App\Http\Controllers\auth\LogoutController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/login', [LoginController::class, 'login']); //route post untuk login
Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/register', [RegisterController::class, 'register'])->name('register'); //route post untuk register
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/kecamatan', [KecamatanDesaController::class, 'getKecamatan']);
Route::get('/desa/{id_kec}', [KecamatanDesaController::class, 'getDesaByKecamatan']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:biodata');
Route::middleware(['auth:biodata', 'check.role'])->group(function () {
    Route::get('/dashboard_master', [DashboardController::class, 'index_master'])->name('admin.dashboard_master');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');