@extends('layouts.app')
@php
    $title = 'Pejabat Desa';

@endphp
@section('title', 'Pejabat Desa')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pejabat Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active">Pejabat Desa</li>
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
                  <button class="btn btn-sm btn-success" id="btn-add-new"  type="button" data-toggle="modal" data-target="#modalTambahPejabat">
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
                          <th>NIP</th>
                          <th>Nama Pejabat</th>
                          <th>Jabatan</th>
                          <th>Opsi</th>
                      </thead>
                      <tbody>

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
<div class="modal fade" id="modalTambahPejabat" tabindex="-1" role="dialog" aria-labelledby="modalTambahPejabatLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahPejabatLabel">FORM TAMBAH PEJABAT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIP</label>
                        <input type="number" name="nip" class="form-control" placeholder="NIP.." autofocus>
                    </div>
                    <div class="form-group">
                        <label>Nama Pejabat</label>
                        <input type="nama" name="nama" class="form-control" placeholder="Nama..">
                    </div>
                    <div class="form-group">
                        <label>Jabatan</label>
                        <select name="jabatan" class="form-control" id="jabatan">
                            <option disabled="" selected="">Pilih Jabatan</option>
                            <option value="Kepala Desa">Kepala Desa</option>
                            <option value="Sekretaris Desa">Sekretaris Desa</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                    </div>
                    <div class="form-group" id="jblain">
                        <label>Isikan Jabatan Lainnya</label>
                        <input name="jblain" class="form-control" placeholder="Jabatan..">
                    </div>
                    <div class="form-group">
                        <label>Pangkat</label>
                        <input name="pangkat" class="form-control" placeholder="Pangkat..">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button name="simpan" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection