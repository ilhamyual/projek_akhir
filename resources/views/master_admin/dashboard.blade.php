@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Master Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
    <div class="row">
          @foreach($master_berkas as $berkas)
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon 
              @if($loop->index >= 5)
                  {{ $card_array[$loop->index % 5] }}
              @else
                  {{ $card_array[$loop->index] }}
              @endif
              "><i class="far fa-envelope"></i></span>

              <div class="info-box-content">
              <a href="{{ route('admin.request', ['id_berkas' => $berkas->id_berkas, 'judul_berkas' => $berkas->judul_berkas]) }}">
                <span class="info-box-text">{{ $berkas->judul_berkas }}</span>
                @php
                    $jumlah_req = App\Models\DataRequest::where('id_berkas', $berkas->id_berkas)
                        ->where('status', 0)
                            ->whereHas('biodata', function ($query) {
                        })
                          ->count();
                @endphp
                <span class="info-box-number">{{ $jumlah_req }}</span>
                </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endforeach
          
          <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection