<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DataPejabat;

class PejabatDesaController extends Controller
{
    public function index()
    {
        
        $pejabats = DataPejabat::where('id_kec', auth()->user()->kecamatan)
                            ->where('id_desa', auth()->user()->desa)
                            ->get();
        return view('admin.pejabatdesa', compact('pejabats'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nip' => 'required|numeric',
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'pangkat' => 'required|string',
        ]);
        $jabatan = $request->jabatan;
        if ($jabatan == 'Lainnya') {
            $jabatan = $request->jblain;
        }
        // Buat pejabat baru berdasarkan input yang diberikan
        DataPejabat::create([
            'nip' => $request->nip,
            'nm_pejabat' => $request->nama,
            'jabatan' => $jabatan,
            'pangkat' => $request->pangkat,
            // Jika jabatan adalah 'Lainnya', simpan juga jabatan yang diberikan
            'id_desa' => auth()->user()->desa, // Ini hanya contoh, sesuaikan dengan kebutuhan Anda
            'id_kec' => auth()->user()->kecamatan, // Ini hanya contoh, sesuaikan dengan kebutuhan Anda
        ]);

        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Pejabat berhasil ditambahkan.');
    }
    public function edit($nip)
    {
        $pejabat = DataPejabat::where('nip', $nip)->first();
        return view('admin.pejabatdesa', compact('pejabat'));
    }

    public function update(Request $request, $nip)
    {
        $pejabat = DataPejabat::where('nip', $nip)->first();
        $pejabat->nm_pejabat = $request->input('nm_pejabat');
        $pejabat->jabatan = $request->input('jabatan');
        $pejabat->pangkat = $request->input('pangkat');
        // Jika jabatan adalah Lainnya, set jabatan menjadi nilai dari input jblain
        if ($request->input('jabatan') == 'Lainnya') {
            $pejabat->jabatan = $request->input('jblain');
        }
        $pejabat->save();

        return redirect()->route('admin.pejabat_desa')->with('success', 'Pejabat berhasil diubah');
    }

    // Metode destroy untuk menghapus pejabat
    public function destroy($nip)
    {
        $pejabat = DataPejabat::where('nip', $nip)->first();
        $pejabat->delete();
        return redirect()->route('admin.pejabat_desa')->with('success', 'Pejabat berhasil dihapus');
    }
}
