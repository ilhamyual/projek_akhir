<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Biodata extends Authenticatable
{
    use HasFactory;
    protected $table = 'biodata';
    protected $fillable = [
        'nik', 'nama', 'jekel', 'kecamatan', 'desa', 'kota', 'tgl_lahir', 'password',
    ];
}
