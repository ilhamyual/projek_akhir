<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berkas;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $surats = [
            [
                'judul_berkas' => 'Surat Keterangan Domisili Duplikat',
                'kode_berkas' => '2023',
                'kode_belakang' => '',
                'template' => '<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:11pt">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan , Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="height:251px; width:578px">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>Nama</td>\r\n\t\t\t<td>: $nama</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>NIK</td>\r\n\t\t\t<td>: $nik</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Jenis Kelamin</td>\r\n\t\t\t<td>: $jekel</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Tempat, Tanggal Lahir</td>\r\n\t\t\t<td>: $tempat_lahir, $tanggal_lahir</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Warganegara/Agama</td>\r\n\t\t\t<td>: $warganegara, $agama</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Pekerjaan</td>\r\n\t\t\t<td>: $pekerjaan</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Status Pernikahan</td>\r\n\t\t\t<td>: $status_nikah</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Alamat<br />\r\n\t\t\t<br />\r\n\t\t\t&nbsp;</td>\r\n\t\t\t<td>: $alamat RT.$rt RW.$rw<br />\r\n\t\t\t&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n\t\t\t&nbsp; Kabupaten Malang</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:11pt">Dengan ini menerangkan bahwa benar yang bersangkutan berdomisili $alamat sesuai dengan alamat sebagaimana tersebut di atas.&nbsp;di $alamat_domisili. $domisili_sejak. Sejak tahun $domisili_sejak sampai dengan sekarang. Surat Keterangan ini dibuat untuk $tujuan_permohonan. $keterangan_tambahan</span></span></p>\r\n\r\n<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:11pt">Demikian surat keterangan ini dibuat, atas perhatian dan kerjasamanya kami ucapkan terima kasih.</span></span></p>\r\n',
                'form_tambahan' => 'Alamat_Domisili,Domisili_Sejak,Tujuan_Permohonan,Keterangan_Tambahan'
            ],
            [
                'judul_berkas' => 'Surat Rekomendasi',
                'kode_berkas' => '207',
                'kode_belakang' => '26.2009/VI',
                'template' => '<p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:11pt">Yang bertanda tangan dibawah ini $jabatan Desa $desa, Kecamatan $kecamatan , Kabupaten Malang menerangkan dengan sebenarnya, bahwa:</span></span></p>\r\n\r\n<table border="1" cellpadding="1" cellspacing="1" style="height:251px; width:578px">\r\n\t<tbody>\r\n\t\t<tr>\r\n\t\t\t<td>Nama</td>\r\n\t\t\t<td>: $nama</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>NIK</td>\r\n\t\t\t<td>: $nik</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Jenis Kelamin</td>\r\n\t\t\t<td>: $jekel</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Tempat, Tanggal Lahir</td>\r\n\t\t\t<td>: $tempat_lahir, $tanggal_lahir</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Warganegara/Agama</td>\r\n\t\t\t<td>: $warganegara, $agama</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Pekerjaan</td>\r\n\t\t\t<td>: $pekerjaan</td>\r\n\t\t</tr>\r\n\t\t<tr>\r\n\t\t\t<td>Status Pernikahan</td>\r\n\t\t\t<td>: $status_nikah</td>\r\n\t\t</tr>\r\n\t\t\n\t\t<tr>
                <td>Alamat<br />\r\n\t\t\t<br />\r\n\t\t\t&nbsp;</td>\r\n\t\t\t<td>: $alamat RT.$rt RW.$rw<br />\r\n\t\t\t&nbsp; Desa $desa, Kecamatan $kecamatan<br />\r\n\t\t\t&nbsp; Kabupaten Malang</td>\r\n\t\t</tr>\r\n\t</tbody>\r\n</table>\r\n\r\n<p>Surat rekomendasi ini dibuat untuk $tujuan_permohonan $keterangan_tambahan.</p>\r\n\r\n<p>Demikian rekomendasi ini dibuat dan diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya</p>\r\n',
                'form_tambahan' => 'Tujuan_Permohonan,Keterangan_Tambahan'
            ],
            // sisa data surat
        ];

        foreach ($surats as $surat) {
            Berkas::create($surat);
        }
    }
}
