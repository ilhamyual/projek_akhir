<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Berkas;
use App\Models\Biodata;

class DashboardMasterController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $master_berkas = Berkas::all();
        $card_array = ['bg-info','bg-success','bg-warning','bg-danger'];


        return view('master_admin.dashboard', compact('master_berkas', 'card_array'));
    }

    public function master()
    {
        $user = auth()->user()->nik;
        
        $biodatas = Biodata::where('nik', $user)->get();
        return view('master_admin.biodatamaster', compact('biodatas'));
    }
    public function ubah($nik)
    {
        $data = Biodata::where('nik', $nik)->first();
        return view('master_admin.editmaster', compact('data'));
    }

    public function update(Request $request, $nik)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:50',
            'jekel' => 'required|in:Laki-Laki,Perempuan',
            'tgl_lahir' => 'required|date',
            'telepon' => 'nullable|string|max:13',
            'email' => 'nullable|string|email|max:50',
        ]);

        // Ambil data biodata berdasarkan NIK
        $biodata = Biodata::where('nik', $nik)->firstOrFail();

        // Update data biodata
        $biodata->update($validatedData);


        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('admin.biodata_master')->with('success', 'Biodata berhasil diperbarui.');
    }
}
