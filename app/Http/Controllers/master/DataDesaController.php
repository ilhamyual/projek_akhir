<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;
use App\Models\KecamatanDesa;
use App\Models\Desa;

class DataDesaController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::where('role', 'Admin Desa')->get();
        return view('master_admin.admindesa', compact('biodatas'));
    }
    public function tambah(Request $request)
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
            'telepon' => 'nullable|numeric|max:13',
            'kodepos' => 'nullable|numeric|max:20',
            'alamat' => 'nullable|string',
            'email' => 'nullable|email|max:50',
        ]);

        // Ambil ID kecamatan dan desa dari formulir
        $kecamatanId = $validatedData['kecamatan'];
        $desaId = $validatedData['desa'];

        // Ambil nama kecamatan dan desa berdasarkan ID
        $kecamatan = KecamatanDesa::find($kecamatanId);
        $desa = Desa::find($desaId);

        $biodata = Biodata::create([
                'nik' => $validatedData['nik'],
                'nama' => $validatedData['nama'],
                'jekel' => $validatedData['jekel'],
                'kecamatan' => $kecamatan->nama,
                'desa' => $desa->nama,
                'kota' => $validatedData['kota'],
                'tgl_lahir' => $validatedData['tgl_lahir'],
                'password' => Hash::make($validatedData['password']),
                'alamat' => $validatedData['alamat'],
                'telepon' => $validatedData['nohp'],
                'kodepos' => $validatedData['kodepos'],
                'email' => $validatedData['email'],
                'role' => 'Admin Desa',
            ]);

            dd($request->all());
                 
            return redirect()->back()->with('success', 'Registrasi berhasil');
        
    }
    public function update(Request $request, $nik)
    {
        // Validasiasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'nama' => 'required|string|max:50',
            'jekel' => 'required|in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'alamat' => 'nullable|string',
            'telepon' => 'nullable|string|max:13',
            'email' => 'nullable|string|email|max:50',
            'kecamatan' => 'required|string',
            'desa' => 'required|string',
            'website' => 'nullable|string|max:10',
            'kodepos' => 'nullable|string|max:10',
        ]);

        // Ambil data biodata berdasarkan NIK
        $biodata = Biodata::where('nik', $nik)->firstOrFail();

        // Update data biodata
        $biodata->update($validatedData);


        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('admin.data_admindesa')->with('success', 'Biodata berhasil diperbarui.');
    }
    public function destroy($nik)
    {
        $biodata = Biodata::where('nik', $nik)->first();
        $biodata->delete();
        return redirect()->route('admin.data_admindesa')->with('success', 'Pejabat berhasil dihapus');
    }
}
