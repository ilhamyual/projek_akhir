@extends('layouts.app')
@php
    $title = 'Admin Desa';
@endphp
@section('title', 'Data Admin Desa')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Admin Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active">Data Admin Desa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
    <div class="container-fluid">
      <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
              Daftar {{$title}}

              <div class="float-right">
                  <button class="btn btn-sm btn-success" id="btn-add-new"  type="button" data-toggle="modal" data-target="#modalTambahAdminDesa">
                      <i class="fas fa-plus"></i>
                      Tambah {{$title}}
                  </button>
              </div>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-list">
                      <thead>
                          <th>No.</th>
                          <th>NIK</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Kecamatan</th>
                          <th>Desa</th>
                          <th>Opsi</th>
                      </thead>
                      <tbody>
@foreach($biodatas as $index => $biodata)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $biodata->nik }}</td>
    <td>{{ $biodata->nama }}</td>
    <td>{{ $biodata->jekel }}</td>
    <td>{{ $biodata->kecamatan }}</td>
    <td>{{ $biodata->desa }}</td>
    <td>
        <!-- Tambahkan tombol untuk opsi, misalnya: edit, hapus, dll -->
        <!-- Contoh tombol edit -->
        <button class="btn btn-sm btn-primary" data-id="{{ $biodata->id }}" data-nik="{{ $biodata->NIK }}" data-nama="{{ $biodata->nama }}" data-email="{{ $biodata->email }}" data-kecamatan="{{ $biodata->kecamatan }}" data-desa="{{ $biodata->desa }}" data-toggle="modal" data-target="#modalEditAdminDesa">
            <i class="fas fa-edit"></i>
            Edit
        </button>
        <!-- Contoh tombol hapus -->
        <button class="btn btn-sm btn-danger" data-id="{{ $biodata->id }}" data-toggle="modal" data-target="#modalHapusAdminDesa">
            <i class="fas fa-trash"></i>
            Hapus
        </button>
    </td>
</tr>
@endforeach

                      </tbody>
                  </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
<!-- Modal -->
<div class="modal fade" id="modalTambahAdminDesa" tabindex="-1" role="dialog" aria-labelledby="modalTambahAdminDesaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahAdminDesaLabel">Tambah Admin Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulir pendaftaran admin desa -->
                <form id="registrationForm" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" class="form-control" id="nik" name="nik" required autofocus maxlength="16">
                                <small id="nikWarning" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" id="name" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jekel">Jenis Kelamin</label>
                                <select class="form-control" id="jekel" name="jekel" required>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kota">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" value="Jember" readonly>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <select class="form-control" id="kecamatan" name="kecamatan" required>
                                    <option value="">Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <select class="form-control" id="desa" name="desa" required>
                                    <option value="">Pilih Desa</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" required pattern="(?=.*\d)(?=.*[A-Z]).{8,}" title="Password harus mengandung setidaknya satu angka, satu huruf besar, dan setidaknya 8 karakter">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary float-right">Daftar</button>
</div>

                </form>
            </div>
            
        </div>
    </div>
</div>
    
@endsection