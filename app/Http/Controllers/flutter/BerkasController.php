<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller; // Import Controller class dari namespace yang benar
use Illuminate\Http\Request;
use App\Models\Berkas;

class BerkasController extends Controller
{
    public function index()
    {
        $judul_berkas = Berkas::pluck('judul_berkas')->toArray();
        return response()->json([
            'success' => true,
            'judul_berkas' => $judul_berkas,
        ]);
    }
}
