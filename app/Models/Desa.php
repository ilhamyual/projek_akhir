<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KecamatanDesa;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desas';
    protected $fillable = [
        'nama',
        'kecamatan_id',
        'created_at',
        'updated_at',
    ];

    //relasi antara desa dan kecamatan
    public function kecamatan()
    {
        return $this->belongsTo(KecamatanDesa::class, 'kecamatan_id', 'id');
    }
}