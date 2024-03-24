<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KecamatanDesa;
use App\Models\Desa;

class KecamatanDesaController extends Controller
{
    public function getKecamatan()
    {
        $kecamatans = KecamatanDesa::all('id', 'nama'); // Mengambil semua kecamatan dari database
        return response()->json($kecamatans);
    }

    public function getDesaByKecamatan($id_kec)
    {
        // \Log::info('Mengambil data desa untuk kecamatan dengan ID: ' . $id_kec); //untuk melihat log pakah sesuai ato tidak
        $desas = Desa::where('kecamatan_id', $id_kec)->select('id', 'nama')->get();
        return response()->json($desas);
        // \Log::info('Data desa yang diambil: ' . $desas); //untuk melihat log pakah sesuai ato tidak
    }
    
}
