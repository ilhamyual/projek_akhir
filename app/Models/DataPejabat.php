<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPejabat extends Model
{
    use HasFactory;
    protected $table = 'data_pejabats';

    protected $fillable = [
        'nip',
        'nm_pejabat',
        'nm_pejabat',
        'jabatan',
        'pangkat',
        'id_desa',
        'id_kec'
    ];

}
