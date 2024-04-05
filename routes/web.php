<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\pemohon\BerandaController;
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
    Route::get('/dashboard_master/{id_berkas}/{judul_berkas}', [DashboardMasterController::class, ''])->name('master.request');
    Route::get('/data_admindesa', [DataDesaController::class, 'index'])->name('admin.data_admindesa');
    Route::get('/templatesurat', [TemplateSuratController::class, 'index'])->name('admin.templatesurat');
    Route::post('/templatesurat/store', [TemplateSuratController::class, 'store'])->name('berkas.store');
    Route::delete('/berkas/{judul_berkas}/delete', [TemplateSuratController::class, 'destroy'])->name('berkas.delete');
    Route::get('/laporan_master', [LaporanMasterController::class, 'index'])->name('admin.laporan_master');
    Route::get('/biodata_master', [DashboardMasterController::class, 'master'])->name('admin.biodata_master');
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::middleware(['auth:biodata', 'adminDesa'])->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/dashboard/{id_berkas}/{judul_berkas}', [DashboardController::class, 'adminRequest'])->name('admin.request');
    Route::get('/request/{id_berkas}/{judul_berkas}/{id_request}', [DashboardController::class, 'edit'])->name('detail.request');
    Route::get('/request/{id_request}/edit', [DashboardController::class, 'edit'])->name('request.edit');
    Route::put('/request', [DashboardController::class, 'update'])->name('request.update');
    Route::get('/data_masyarakat', [DataMasyarakatController::class, 'index'])->name('admin.data_masyarakat');
    Route::get('/berkas_permohonan', [BerkasPermohonanController::class, 'index'])->name('admin.berkas_permohonan');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('admin.laporan');
    Route::get('/biodata_desa', [BiodataDesaController::class, 'index'])->name('admin.biodata_desa');
    Route::get('/biodata_desa/{nik}', [BiodataDesaController::class, 'ubah'])->name('ubah.desa');
    Route::put('/biodata_desa/{nik}', [BiodataDesaController::class, 'update'])->name('biodata.update');
    Route::get('/pejabat_desa', [PejabatDesaController::class, 'index'])->name('admin.pejabat_desa');

    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});
Route::middleware(['auth:biodata', 'isPemohon'])->group(function(){
    Route::get('/beranda', [BerandaController::class, 'index'])->name('pemohon.dashboard');
    Route::get('/request/{id_berkas}/{judul_berkas}', [BerandaController::class, 'newRequest'])->name('user.request');
    Route::post('/request', [BerandaController::class, 'tambahRequest'])->name('user.tambah.request');
});
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/ckeditor', [TemplateSuratController::class, 'showCKEditor']);