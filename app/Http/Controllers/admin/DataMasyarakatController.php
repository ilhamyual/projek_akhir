<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;

class DataMasyarakatController extends Controller
{

public function index()
{
    // Ambil desa pengguna
    $userDesa = auth()->user()->desa;

    // Ambil data masyarakat berdasarkan desa pengguna
    $biodatas = Biodata::where('desa', $userDesa)->where('role', 'Pemohon')->get();

    return view('admin.datamasyarakat', compact('biodatas'));
}

}
