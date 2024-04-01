@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('user.tambah.request') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">FORM TAMBAH REQUEST {{ strtoupper($judul_berkas) }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <input type="hidden" name="id_berkas" value="{{ $id_berkas }}">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="nama" class="form-control" value="{{ $nik . ' - ' . $nama }}" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="nik" class="form-control" value="{{ $nik }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea type="text" name="keterangan" class="form-control" placeholder="Keterangan.." rows="5" autofocus></textarea>
                                </div>
                                @foreach($form_tambahan as $field)
                                    <div class="form-group">
                                        <label>{{ str_replace("_", " ", $field) }}</label>
                                        <input type="text" name="{{ $field}}" class="form-control" placeholder="{{ str_replace("_", " ", $field) }}" autofocus>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button name="kirim" class="btn btn-success">Kirim</button>
                        <a href="{{ url()->previous() }}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
