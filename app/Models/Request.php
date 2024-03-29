<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $table = 'request';

    protected $guarded = [];
    protected $fillable = [
        'nik', 'id_berkas', 'keterangan', 'form_tambahan', 'id_kec', 'id_desa'
    ];
}
