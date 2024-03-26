@extends('layouts.app')
@php
    $title = 'Template Surat';
@endphp
@section('title', 'Template Surat')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Template Surat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active">Template Surat</li>
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
                  <button class="btn btn-sm btn-success" id="btn-add-new " type="button" data-toggle="modal" data-target="#modalTambahTemplate">
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
                          <th>Judul Berkas</th>
                          <th>Kode Berkas</th>
                          <th>Kode Belakang</th>
                          <th style="width: 10%">Action</th>
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
  <!-- modal  -->
  <div class="modal fade" id="modalTambahTemplate" tabindex="-1" role="dialog" aria-labelledby="modalTambahTemplateLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTambahTemplateLabel">FORM TAMBAH TEMPLATE SURAT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="jenis" name="judul_berkas" class="form-control" placeholder="Jenis Surat..">
                    </div>
                    <div class="form-group">
                        <label>Kode Berkas</label>
                        <input type="kode_berkas" name="kode_berkas" class="form-control" placeholder="Kode Berkas.." autofocus>
                    </div>
                    <div class="form-group">
                        <label>Kode Belakang</label>
                        <input type="kode_belakang" name="kode_belakang" class="form-control" placeholder="Kode Belakang..">
                    </div>
                    <div class="form-group">
                        <label>Template Surat</label>
                        <div class="form-group">
                            <textarea name="content" id="template" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <script src="/asset/ckeditor/ckeditor.js"></script>
                        <script>
                            CKEDITOR.replace('content');
                        </script>
                        <label>*Jika menambahkan data supaya menggunakan $</label>
                    </div>
                    <div class="form-group">
                        <label>Form Tambahan</label>
                        <input type="form_tambahan" name="form_tambahan" class="form-control" placeholder="Form Tambahan.."></input>
                        <label>*Jika menambahkan Form tambahan supaya menggunakan Spasi</label>
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