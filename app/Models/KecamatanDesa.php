<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Desa;

class KecamatanDesa extends Model
{
    use HasFactory;

    protected $table = 'kecamatans';

    protected $fillable = [
        'id',
        'nama',
        'created_at',
        'updated_at',
    ];

    // relasi antara kecamatan dan desa
    public function desas()
    {
        return $this->hasMany(Desa::class, 'kecamatan_id', 'id');
    }
}