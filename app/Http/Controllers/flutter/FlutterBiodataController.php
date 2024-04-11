<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Biodata;

class FlutterBiodataController extends Controller
{
    public function index()
    {
        $user = Biodata::where('nik', $nik)->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'name' => $user->nama,
            'kecamatan' => $user->kecamatan,
            'desa' => $user->desa,
            'nik' => $user->nik,
        ]);
    }
}
