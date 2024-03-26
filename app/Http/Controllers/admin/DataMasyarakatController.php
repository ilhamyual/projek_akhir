<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataMasyarakatController extends Controller
{
    public function index()
    {
        return view('admin.datamasyarakat');
    }
}
