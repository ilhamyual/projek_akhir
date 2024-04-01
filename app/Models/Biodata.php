<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Biodata extends Authenticatable
{
    use HasFactory;
    use HasApiTokens;
    protected $table = 'biodata';
    protected $fillable = [
        'id','nik', 'nama', 'jekel', 'kecamatan', 'desa', 'kota', 'tgl_lahir', 'password',
    ];
}
