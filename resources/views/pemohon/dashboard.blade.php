@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halo {{ $nama }}!</h1>
                    <p>Sebelum Anda Mengajukan Surat Keterangan Lengkapi Biodata Anda, Klik Biodata Anda</p>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
            @foreach($master_berkas as $berkas)
                <div class="col-md-3">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $berkas->judul_berkas }}</h3>
                        </div>
                        <div class="card-body">
                            <!-- <h4 class="text-center">{{ $berkas->jumlah_request }}</h4> -->
                            <!-- <script>
                                console.log({{ $berkas->id_berkas }});
                            </script> -->
                            <a href="{{ route('user.request', ['id_berkas' => $berkas->id_berkas, 'judul_berkas' => $berkas->judul_berkas]) }}" class="btn btn-primary btn-block">
                                <i class="fas fa-plus-circle"></i> Request
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>


    
@endsection