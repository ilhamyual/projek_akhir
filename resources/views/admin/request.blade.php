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
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="float-right">
                                <button class="btn btn-sm btn-success" id="btn-add-new" type="button"
                                    data-toggle="modal" data-target="#modalTambahMasyarakat">
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
                                        @foreach($requests as $index => $request)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $request->tanggal_request }}</td>
                                            <td>{{ $request->nik }}</td>
                                            <td>{{ $request->nama }}</td>
                                            <td>{{ $request->keperluan }}</td>
                                            <td>
                                                @if($request->status == 0)
                                                Pending
                                                @elseif($request->status == 1)
                                                Telah di ACC
                                                @elseif($request->status == 2)
                                                Sudah di print
                                                @elseif($request->status == 3)
                                                Selesai
                                                @else
                                                Status tidak valid
                                                @endif
                                            </td>
                                            <td>
                                                @if($request->status == 1)
                                                <a href="#" class="btn btn-sm btn-success">
                                                    <i class="fas fa-print"> Print</i>
                                                </a>
                                                @else
                                                <a href="#" class="btn btn-sm btn-primary">
                                                    <i class="fas fa-check"></i>
                                                </a>
                                                <a href="{{ route('detail.request', ['id_berkas' => $id_berkas, 'judul_berkas' => $judul_berkas, 'nik' => $request->nik, 'id_request' => $request->id_request]) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-pencil-alt">Edit</i>
                                                </a>
                                                @endif
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
@endsection
