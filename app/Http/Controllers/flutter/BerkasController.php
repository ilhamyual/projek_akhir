<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller; // Import Controller class dari namespace yang benar
use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\DataRequest;

class BerkasController extends Controller
{
    public function index()
    {
        // Mengambil semua kolom dari model Berkas
        $berkas = Berkas::all();

        // Mengonversi koleksi berkas menjadi array yang berisi judul_berkas dan id_berkas
        $judul_dan_id_berkas = $berkas->map(function($item) {
            return [
                'id_berkas' => $item->id_berkas,
                'judul_berkas' => $item->judul_berkas,
                'form_tambahan' => $item->form_tambahan
            ];
        })->toArray();

        return response()->json([
            'success' => true,
            'berkas' => $judul_dan_id_berkas,
        ]);
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'id_berkas' => 'required',
            'nik' => 'required',
            'form_tambahan' => 'required',
            'id_kec' => 'required',
            'id_desa' => 'required',
            'status' => 'required',
            'tanggal_request' => 'required',
            'keterangan' => 'required',
        ]);

        // Simpan data ke dalam database
        $requestData = DataRequest::create($validatedData);

        // Jika berhasil disimpan, kirim response berhasil
        return response()->json(['message' => 'Data berhasil disimpan'], 200);
    }
}
