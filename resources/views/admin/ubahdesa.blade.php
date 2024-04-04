@extends('layouts.app')

@section('title', 'Edit Biodata')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Biodata</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('biodata.update', $data->nik) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control" value="{{ $data->nik }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama" value="{{ $data->nama }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jekel" class="form-control">
                                                <option disabled selected>Pilih Jenis Kelamin</option>
                                                <option value="Laki-Laki" {{ $data->jekel == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                                <option value="Perempuan" {{ $data->jekel == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" value="{{ $data->tempat_lahir }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir" value="{{ $data->tgl_lahir }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan</label>
                                            <select name="idpekerjaan" class="form-control">
                                                <option value="">Pilih Pekerjaan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Agama</label>
                                            <select name="agama" class="form-control">
                                                <option value="">Pilih Agama Anda</option>
                                                <option value="Islam" {{ $data->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                <option value="Katolik" {{ $data->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                <option value="Kristen" {{ $data->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                <option value="Hindu" {{ $data->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                <option value="Budha" {{ $data->agama == 'Budha' ? 'selected' : '' }}>Budha</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Warganegara</label>
                                            <select name="warganegara" class="form-control">
                                                <option disabled selected>Pilih Warganegara</option>
                                                <option value="WNI" {{ $data->warganegara == 'WNI' ? 'selected' : '' }}>WNI</option>
                                                <option value="WNA" {{ $data->warganegara == 'WNA' ? 'selected' : '' }}>WNA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Pernikahan</label>
                                            <select name="status_nikah" class="form-control">
                                                <option disabled selected>Pilih Status Pernikahan</option>
                                                <option value="Belum Kawin" {{ $data->status_nikah == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                                <option value="Kawin" {{ $data->status_nikah == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                                <option value="Cerai Mati" {{ $data->status_nikah == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Status Warga</label>
                                            <select name="status_warga" class="form-control">
                                                <option disabled selected>Pilih Status Warga</option>
                                                <option value="Sekolah" {{ $data->status_warga == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                                                <option value="Kerja" {{ $data->status_warga == 'Kerja' ? 'selected' : '' }}>Kerja</option>
                                                <option value="Belum Bekerja" {{ $data->status_warga == 'Belum Bekerja' ? 'selected' : '' }}>Belum Bekerja</option>
                                            </select>
                                        </div>
                                        <!-- Tambahkan field lain sesuai dengan struktur tabel di database -->
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select name="kecamatan" id="kecamatan" class="form-control">
                                            <!-- Looping untuk menampilkan opsi kecamatan -->
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Desa</label>
                                        <select name="desa" class="form-control">
                                            <!-- Looping untuk menampilkan opsi desa -->
                                            
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="number" name="rt" class="form-control" value="{{ $data->rt }}" placeholder="RT Anda..">
                                    </div>
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="number" name="rw" class="form-control" value="{{ $data->rw }}" placeholder="RW Anda..">
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Alamat</label>
                                        <textarea class="form-control" name="alamat" rows="3">{{ $data->alamat }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="number" name="telepon" class="form-control" value="{{ $data->telepon }}" placeholder="Telepon Anda..">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ $data->email }}" placeholder="Email Anda..">
                                    </div>
                                        <!-- Tambahkan field lain sesuai dengan struktur tabel di database -->
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="#" class="btn btn-default">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
@endsection
