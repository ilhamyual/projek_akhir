<?php

namespace App\Http\Controllers\Pemohon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\DataRequest;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index()
    {
        $nama = auth()->user()->nama; // Mengambil nama user dari session atau Anda bisa mengambil dari model User jika telah mengatur relasi
        $master_berkas = Berkas::select('id_berkas', 'judul_berkas')->get();
        return view('pemohon.dashboard', compact('nama', 'master_berkas'));
    }
    public function newRequest(Request $request, $id_berkas, $judul_berkas)
    {
        $user = auth()->user(); // Mendapatkan data user yang sedang login
        $nik = $user->nik;
        $nama = $user->nama;

        $form_tambahan = Berkas::getFormTambahanById($id_berkas);
        return view('pemohon.request', [
            'nik' => $nik,
            'nama' => $nama,
            'id_berkas' => $id_berkas,
            'judul_berkas' => $judul_berkas,
            'form_tambahan' => $form_tambahan,
        ]);

        
    }
    public function tambahRequest(Request $request)
    {
        // Validasi data jika diperlukan
        $validatedData = $request->validate([
            'id_berkas' => 'required|string|max:20',
            'nik' => 'required|string|max:16',
            'keterangan' => 'required|string',
            'form_tambahan' => 'nullable|string|max:255',
            // tambahkan validasi untuk input lainnya sesuai kebutuhan
        ]);
        // Inisialisasi variabel untuk menyimpan data form tambahan
        $masukan = '';
        foreach ($request->all() as $key => $value) {
            if (!in_array($key, ['_token', 'nik', 'id_berkas', 'keterangan'])) {
                $variabel = str_replace(" ", "_", $key);
                $masukan .= $variabel . ':' . $value . ',';
            }
        }


        // Simpan data request ke database
        $dataRequest = new DataRequest();
        $dataRequest->nik = $request->nik;
        $dataRequest->id_berkas = $validatedData['id_berkas'];
        $dataRequest->keterangan = $validatedData['keterangan'];
        $dataRequest->form_tambahan = $masukan;
        $dataRequest->status = 0;
        // $dataRequest->form_tambahan = json_encode($form_tambahan);
        $dataRequest->id_kec = auth()->user()->kecamatan;
        $dataRequest->id_desa = auth()->user()->desa;
        $dataRequest->save();

        // Redirect ke halaman beranda jika berhasil
        return redirect()->route('pemohon.dashboard')->with('success', 'Request berhasil dikirim');
 

    }
}
