@extends('layouts.app')
@section('title', 'Laporan')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active">Laporan</li>
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
              Laporan

              <div class="float-right">
                <button class="btn btn-sm btn-danger" id="btn-save-pdf">
                      <i class="fas fa-save"></i>
                      Simpan ke PDF
                  </button>
                  <!-- Tombol untuk mencetak -->
                  <button class="btn btn-sm btn-warning" id="btn-print">
                      <i class="fas fa-print"></i>
                      Cetak
                  </button>
              </div>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-list">
                      <thead>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal ACC</th>
                        <th scope="col">Nik</th>
												<th scope="col">Nama</th>
												<th scope="col">Permohonan</th>
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
    
@endsection