<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;
use App\Models\KecamatanDesa;
use App\Models\Desa;

class BiodataDesaController extends Controller
{
    public function index()
    {
        $user = auth()->user()->nik;
        
        $biodatas = Biodata::where('nik', $user)->get();
        return view('admin.biodatadesa', compact('biodatas'));
    }
    public function ubah($nik)
    {
        $data = Biodata::where('nik', $nik)->first();
        return view('admin.ubahdesa', compact('data'));
    }

    public function update(Request $request, $nik)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama' => 'required|string|max:255',
            'jekel' => 'required|string',
            'tempat_lahir' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'idpekerjaan' => 'nullable|exists:pekerjaan,id',
            'agama' => 'required|string',
            'warganegara' => 'required|string',
            'status_nikah' => 'required|string',
            'status_warga' => 'required|string',
            'rt' => 'nullable|string|max:3',
            'rw' => 'nullable|string|max:3',
            'alamat' => 'nullable|string|max:255',
            'telepon' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:100',
            'desa' => 'nullable|string|max:100',
            // 'email' => 'nullable|string|max:255|email',
            // Tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);
            $biodata = Biodata::where('nik', $nik)->firstOrFail();

        // Update data biodata berdasarkan data yang diterima dari formulir
        $biodata->nama = $request->nama;
        $biodata->jekel = $request->jekel;
        $biodata->tempat_lahir = $request->tempat_lahir;
        $biodata->tgl_lahir = $request->tgl_lahir;
        $biodata->idpekerjaan = $request->idpekerjaan;
        $biodata->agama = $request->agama;
        $biodata->warganegara = $request->warganegara;
        $biodata->status_nikah = $request->status_nikah;
        $biodata->status_warga = $request->status_warga;
        $biodata->rt = $request->rt;
        $biodata->rw = $request->rw;
        $biodata->alamat = $request->alamat;
        $biodata->telepon = $request->telepon;
        // $biodata->email = $request->email;

        // Simpan perubahan pada database
        $biodata->save();

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->route('admin.biodata_desa')->with('success', 'Biodata berhasil diperbarui.');
    }
}
