<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berkas;
use App\Models\DataRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $id_kec = $user->kecamatan;
        $id_desa = $user->desa;

        $master_berkas = Berkas::all();
        $card_array = ['bg-info','bg-success','bg-warning','bg-danger'];


        return view('admin.dashboard', compact('master_berkas', 'id_kec', 'id_desa', 'card_array'));
    }

    public function adminRequest(Request $request, $id_berkas, $judul_berkas)
{
    $user = auth()->user();
    $id_desa = $user->desa;

    // Ambil data permohonan yang sesuai dengan desa admin dan id_berkas yang diberikan
    $requests = DataRequest::where('id_desa', $id_desa)
                           ->where('id_berkas', $id_berkas) // Filter berdasarkan id_berkas
                           ->join('biodata', 'data_requests.nik', '=', 'biodata.nik')
                           ->select('data_requests.*', 'biodata.nama as nama')
                           ->get();

    return view('admin.request', [
        'id_berkas' => $id_berkas,
        'judul_berkas' => $judul_berkas,
        'requests' => $requests, // Mengirimkan data permohonan ke view
    ]);
}



    
}
