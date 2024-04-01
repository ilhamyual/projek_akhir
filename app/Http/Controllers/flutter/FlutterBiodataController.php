<?php

namespace App\Http\Controllers\flutter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Biodata;

class FlutterBiodataController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all();
        return response()->json($biodata, 200);
    }
}
