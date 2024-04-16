<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Biodata;

class FlutterLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('nik', 'password');

        if (Auth::guard('biodata')->attempt($credentials)) {
            $user = Auth::guard('biodata')->user();
            $token = $user->createToken('MyApp')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials',
        ], 401);
    }

public function profile($nik)
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
            'email' => $user->email,
            'nik' => $user->nik,
            'kota' => $user->kota,
            'alamat' => $user->alamat,
            'tgl_lahir' => $user->tgl_lahir,
            'jekel' => $user->jekel,
            'telepon' => $user->telepon,
        ]);
    }

}
