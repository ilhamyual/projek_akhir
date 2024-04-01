@extends('layouts.app')
@php
    $title = 'Permohonan Surat';
@endphp
@section('title', 'Permohonan Surat')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DAFTAR REQUEST {{ strtoupper($judul_berkas) }}</h1>
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
              

              <div class="float-right">
                <button class="btn btn-sm btn-success" id="btn-add-new"  type="button" data-toggle="modal" data-target="#modalTambahMasyarakat">
                      <i class="fas fa-plus"></i>
                      Tambah Request
                </button>
              </div>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped table-hover" id="table-list">
                      <thead>
                        <th>No.</th>
                        <th>Tanggal Request</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Catatan</th>
                        <th>Status</th>
                        <th style="width: 15%">Action</th>
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