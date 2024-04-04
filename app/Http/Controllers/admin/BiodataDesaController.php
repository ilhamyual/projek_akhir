<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;

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
}
