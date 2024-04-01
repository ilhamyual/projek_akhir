<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Biodata;

class DataRequest extends Model
{
    use HasFactory;
    protected $table = 'data_requests';
    protected $primaryKey = 'id_request';
    public $timestamps = true;

    protected $fillable = [
        'id_berkas',
        'nik',
        'nip',
        'keperluan',
        'keterangan',
        'status',
        'acc',
        'form_tambahan',
        'no_urut',
        'id_kec',
        'id_desa'
    ];
    public function berkas()
    {
        return $this->belongsTo(Berkas::class, 'id_berkas', 'id_berkas');
    }

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, 'nik', 'nik');
    }
}
