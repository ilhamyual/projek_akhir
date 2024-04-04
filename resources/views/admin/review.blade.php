@extends('layouts.app')

@section('title', 'Detail Request')

@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Request</h1>
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
                            <form action="{{ route('request.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_request" value="{{ $data->id_request }}">
                                
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="keperluan">Catatan</label>
                                                <input type="text" name="keperluan" class="form-control" autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <button type="submit" name="ubah" class="btn btn-info">
                                                <i class="fas fa-edit"></i> Kirim
                                            </button>
                                            <a href="#" class="btn btn-secondary">
                                                Batal
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card " style="background-color: #cce5ff;">
                                                <div class="card-header">
                                                    <h3 class="card-title">Detail Request</h3>
                                                </div>
                                                <div class="card-body">
                                                    <!-- Isi Detail Request -->
                                                    <div class="form-group">
                                                        <label>Keterangan</label>
                                                        <input type="text" name="keterangan" value="{{ $data->keterangan ?? '' }}" class="form-control" placeholder="Keterangan">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tanggal Request</label>
                                                        <input type="text" name="tanggal_request" value="{{ $data->tanggal_request ?? '' }}" class="form-control" placeholder="Tanggal Request" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Form Tambahan</label>
                                                        <textarea class="form-control" name="form_tambahan" rows="5" placeholder="Form Tambahan">{{ $data->form_tambahan ?? '' }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="number" name="nik" value="{{ $data->nik }}" class="form-control" placeholder="NIK Anda.." autofocus readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="nama" value="{{ $data->nama ?? '' }}" class="form-control" placeholder="Nama Lengkap Anda..">
                                            </div>
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label><br />
                                                <label class="form-radio-label">
                                                    <input class="form-radio-input" type="radio" name="jekel" value="Laki-Laki" {{ $data->jekel == "Laki-Laki" ? 'checked' : '' }}>
                                                    <span class="form-radio-sign">Laki-Laki</span>
                                                </label>
                                                <label class="form-radio-label ml-3">
                                                    <input class="form-radio-input" type="radio" name="jekel" value="Perempuan" {{ $data->jekel == "Perempuan" ? 'checked' : '' }}>
                                                    <span class="form-radio-sign">Perempuan</span>
                                                </label>
                                            </div>
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tempat_lahir" value="{{ $data->tempat_lahir ?? '' }}" class="form-control" placeholder="Tempat Lahir Anda..">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" name="tgl_lahir" value="{{ $data->tgl_lahir ?? '' }}" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Agama</label>
                                                <select name="agama" class="form-control">
                                                    <option value="Islam" {{ $data->agama == "Islam" ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen" {{ $data->agama == "Kristen" ? 'selected' : '' }}>Kristen</option>
                                                    <option value="Katolik" {{ $data->agama == "Katolik" ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu" {{ $data->agama == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Budha" {{ $data->agama == "Budha" ? 'selected' : '' }}>Budha</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Status Warga</label>
                                                <select name="status_warga" class="form-control">
                                                    <option value="Sekolah" {{ $data->status_warga == "Sekolah" ? 'selected' : '' }}>Sekolah</option>
                                                    <option value="Kerja" {{ $data->status_warga == "Kerja" ? 'selected' : '' }}>Kerja</option>
                                                    <option value="Bekerja" {{ $data->status_warga == "Bekerja" ? 'selected' : '' }}>Bekerja</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <input type="text" name="kecamatan" value="{{ $data->kecamatan ?? '' }}" class="form-control" placeholder="Kecamatan Anda.." readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label>Desa</label>
                                                <input type="text" name="desa" value="{{ $data->desa ?? '' }}" class="form-control" placeholder="Desa Anda.." readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label>RT</label>
                                                <input type="text" name="rt" value="{{ $data->rt ?? '' }}" class="form-control" placeholder="RT Anda.." readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label>RW</label>
                                                <input type="text" name="rw" value="{{ $data->rw ?? '' }}" class="form-control" placeholder="RW Anda.." readonly="">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment">Alamat</label>
                                                <textarea class="form-control" name="alamat" rows="5">{{ $data->alamat ?? '' }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
