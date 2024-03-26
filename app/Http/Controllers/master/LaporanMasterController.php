<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanMasterController extends Controller
{
    public function index()
    {
        return view('master_admin.laporan');
    }
}
