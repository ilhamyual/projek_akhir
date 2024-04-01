<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\flutter\FlutterLoginController;
use App\Http\Controllers\flutter\FlutterRegisterController;
use App\Http\Controllers\flutter\FlutterBiodataController;
use App\Http\Controllers\KecamatanDesaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login_flutter', [FlutterLoginController::class, 'login']);
Route::post('/register_flutter', [FlutterRegisterController::class, 'register']);
Route::get('/kecamatan', [KecamatanDesaController::class, 'getKecamatan']);
Route::get('/desa/{id_kec}', [KecamatanDesaController::class, 'getDesaByKecamatan']);
Route::get('/biodata', [FlutterBiodataController::class, 'index']);

// Route::get('/login', [LoginController::class, 'index'])->name('login');