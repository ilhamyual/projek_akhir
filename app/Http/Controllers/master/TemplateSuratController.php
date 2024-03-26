<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TemplateSuratController extends Controller
{
    public function index()
    {
        return view('master_admin.templatesurat');
    }
    public function showCKEditor()
{
    $title = "Editor CKEditor";
    return view('ckeditor', compact('title'));
}
}
