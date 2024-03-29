@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header bg-primary-gradient">
                    <h3 class="card-title">Halo Admin Desa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($master_berkas as $berkas)
                            <div class="col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon 
                                        @if($loop->index >= 5)
                                            {{ $card_array[$loop->index % 5] }}
                                        @else
                                            {{ $card_array[$loop->index] }}
                                        @endif
                                    ">
                                        <i class="flaticon-envelope-1"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">{{ $berkas->judul_berkas }}</span>
                                        @php
                                            $jumlah_req = App\Models\DataRequest::where('id_berkas', $berkas->id_berkas)
                                                ->where('status', 0)
                                                ->whereHas('biodata', function ($query) {
                                                    $query->where('id_kec', auth()->user()->kecamatan)
                                                        ->where('id_desa', auth()->user()->desa);
                                                })
                                                ->count();
                                        @endphp
                                        <span class="info-box-number">{{ $jumlah_req }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
@endsection
