<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $table = 'berkas';
    protected $primaryKey = 'id_berkas';

    protected $fillable = [
        'id_berkas',
        'judul_berkas',
        'kode_berkas',
        'kode_belakang',
        'template',
        'form_tambahan',
    ];
    protected $guarded = [];

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function jumlahRequestByKecamatanDesa($id_kec, $id_desa)
    {
        return $this->requests()->where('id_kec', $id_kec)
                                ->where('id_desa', $id_desa);
                                // ->count();
    }
    public static function getFormTambahanById($id_berkas)
    {
        $berkas = self::where('id_berkas', $id_berkas)->first();
        if ($berkas) {
            return explode(',', $berkas->form_tambahan);
        } else {
            return [];
        }
    }
}
// ->where('status', 0)
