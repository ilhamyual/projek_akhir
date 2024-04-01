<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Biodata;
use App\Models\KecamatanDesa;
use App\Models\Desa;

class FlutterRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|numeric|unique:biodata',
            'nama' => 'required|string|max:100',
            'jekel' => 'required|in:Laki-Laki,Perempuan',
            'kecamatan' => 'required|string|max:100',
            'desa' => 'required|string|max:100',
            'kota' => 'required|string|max:6',
            'tgl_lahir' => 'required|date',
            'password' => 'required|string|min:8',
        ]);

        // Ambil nama kecamatan dan desa dari formulir
        $kecamatanNama = $validatedData['kecamatan'];
        $desaNama = $validatedData['desa'];

        // Ambil kecamatan dan desa dari database
        $kecamatan = KecamatanDesa::where('nama', $kecamatanNama)->first();
        $desa = Desa::where('nama', $desaNama)->first();

        if ($kecamatan && $desa) {
            $biodata = Biodata::create([
                'nik' => $validatedData['nik'],
                'nama' => $validatedData['nama'],
                'jekel' => $validatedData['jekel'],
                'kecamatan' => $kecamatan->nama,
                'desa' => $desa->nama,
                'kota' => $validatedData['kota'],
                'tgl_lahir' => $validatedData['tgl_lahir'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'Pemohon',
            ]);
            
            return response()->json([
                'message' => 'Registrasi berhasil',
                'user' => $biodata,
            ], 200);
        } else {
            return response()->json([
                'error' => 'Kecamatan atau desa tidak valid'
            ], 400);
        }
    }
}
