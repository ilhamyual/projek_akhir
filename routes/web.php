<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\DataMasyarakatController;
use App\Http\Controllers\admin\BerkasPermohonanController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\admin\PejabatDesaController;
use App\Http\Controllers\admin\BiodataDesaController;
use App\Http\Controllers\master\DashboardMasterController;
use App\Http\Controllers\master\DataDesaController;
use App\Http\Controllers\master\TemplateSuratController;
use App\Http\Controllers\master\LaporanMasterController;
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

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard')->middleware('auth:biodata');
Route::middleware(['auth:biodata', 'check.role'])->group(function () {
    Route::get('/dashboard_master', [DashboardMasterController::class, 'index'])->name('admin.dashboard_master');
    Route::get('/data_admindesa', [DataDesaController::class, 'index'])->name('admin.data_admindesa');
    Route::get('/templatesurat', [TemplateSuratController::class, 'index'])->name('admin.templatesurat');
    Route::get('/laporan_master', [LaporanMasterController::class, 'index'])->name('admin.laporan_master');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::middleware(['auth:biodata', 'adminDesa'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/data_masyarakat', [DataMasyarakatController::class, 'index'])->name('admin.data_masyarakat');
    Route::get('/berkas_permohonan', [BerkasPermohonanController::class, 'index'])->name('admin.berkas_permohonan');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::get('/biodata_desa', [BiodataDesaController::class, 'index'])->name('admin.biodata_desa');
    Route::get('/pejabat_desa', [PejabatDesaController::class, 'index'])->name('admin.pejabat_desa');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
// Route::middleware(['auth', 'Admin Master'])->group(function(){
//     Route::get('/dashboard_master', [DashboardMasterController::class, 'index'])->name('admin.dashboard_master');
// });
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/ckeditor', [TemplateSuratController::class, 'showCKEditor']);