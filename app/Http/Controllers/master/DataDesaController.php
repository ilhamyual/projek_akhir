<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;

class DataDesaController extends Controller
{
    public function index()
    {
        $biodatas = Biodata::where('role', 'Admin Desa')->get();
        return view('master_admin.admindesa', compact('biodatas'));
    }
}
