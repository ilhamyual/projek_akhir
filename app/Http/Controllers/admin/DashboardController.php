<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berkas;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $id_kec = $user->kecamatan;
        $id_desa = $user->desa;

        $master_berkas = Berkas::all();
        $card_array = ['icon-primary','icon-success','icon-warning','icon-secondary','icon-danger'];


        return view('admin.dashboard', compact('master_berkas', 'id_kec', 'id_desa', 'card_array'));
    }

    
}
