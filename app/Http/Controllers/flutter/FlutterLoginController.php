<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;

class FlutterLoginController extends Controller
{
    public function login(Request $request)
{
    // Validasi data yang diterima dari Flutter
    $request->validate([
        'nik' => 'required|numeric',
        'password' => 'required',
    ]);

    // Coba untuk melakukan login
    if (Auth::guard('biodata')->attempt($request->only('nik', 'password'))) {
        $user = Auth::guard('biodata')->user();

        // Periksa apakah pengguna memiliki peran "Pemohon"
        if ($user->role === 'Pemohon') {
            // Jika login berhasil untuk pemohon, kirim respons JSON dengan status 200
            return response()->json([
                'message' => 'Login berhasil',
                'user' => $user,
            ], 200);
        } else {
            // Jika pengguna bukan pemohon, logout dan kirim respons dengan status 403 (Forbidden)
            Auth::guard('biodata')->logout();
            return response()->json([
                'message' => 'Hanya pemohon yang dapat login.',
            ], 403);
        }
    } else {
        // Jika login gagal, kirim respons JSON dengan status 401
        return response()->json([
            'message' => 'NIK atau password salah',
        ], 401);
    }
}

}
