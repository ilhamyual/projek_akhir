@extends('layouts.app')
@section('title', 'Biodata Admin Desa')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Biodata Admin Desa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active">Biodata Admin Desa</li>
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
              Biodata Admin Desa
              <div class="float-right">
                  <button class="btn btn-sm btn-success" id="btn-add-new"  type="button" data-toggle="modal" data-target="#modalBiodataModalt">
                      <i class="fas fa-edit"></i>
                      Ubah Biodata
                  </button>
              </div>
          </div>
          <div class="card-body">
              <div class="table-responsive">
              <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                
                                <td></td>
                            </tr>
                            <tr>
                                <th>NAMA</th>
                                
                                <td></td>
                            </tr>
                            <tr>
                                <th>EMAIL</th>
                                
                                <td></td>
                            </tr>
                            <tr>
                                <th>TEMPAT, TANGGAL LAHIR</th>
                               
                                <td></td>
                            </tr>
                            <tr>
                                <th>NO HP</th>
                                                               
                                <td></td>
                            </tr>
                            <tr>
                                <th>JENIS KELAMIN</th>
                                
                                <td></td>
                            </tr>
                            <tr>
                                <th>AGAMA</th>
                                
                                <td></td>
                            </tr>
                            <tr>
                                <th>KECAMATAN</th>
                                
                                <td></td>
                            </tr>
                            <tr>
                                <th>DESA</th>
                                
                                <td></td>
                            </tr>
                            <tr>
                                <th>ALAMAT</th>
                                <td></td>
                            </tr>
                            
                            
                            
                            </thead>
                    </table>
              </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
    
@endsection