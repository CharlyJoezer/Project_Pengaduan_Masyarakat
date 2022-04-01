@extends('dashboard.layout.template')
@section('container')

<h4 class="mt-4">Konfirmasi Laporan Selesai</h4>
<hr>

<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-4">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboardlaporan">Daftar Laporan</a></li>
      <li class="breadcrumb-item active" aria-current="page">Konfrimasi Laporan Selesai</li>
    </ol>
  </nav>

  <h5 class="mt-3">Data Laporan</h5>

  <div class="d-flex list-data-laporan mt-4">
    <img src="/storage/{{ $laporan->photo }}" width="80" height="70" alt="">
    <ul class="item-data-laporan">
        <li>{{ $laporan->isi_laporan }}</li>
        <li>NIK : {{ $laporan->nik }}</li>
        <li style="color: #999">{{ $laporan->created_at }}</li>
    </ul>
  </div>

  <h5 class="mt-4">Beri Tanggapan</h5>
  <div class="form-tanggapan mb-3">
    <form action="/kirimtanggapan/{{ $laporan->id_pengaduan }}" method="post">
        @csrf
        <input type="hidden" name="id_pengaduan" value="{{ $laporan->id_pengaduan }}">
        <input type="hidden" name="id_petugas" value="{{ session('adminlogin') }}">
        <textarea class="form-control @error('tanggapan') is-invalid @enderror" rows="2" placeholder="Masukkan tanggapan untuk pelapor" name="tanggapan" required></textarea>
        @error('tanggapan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <button type="submit" class="btn btn-primary w-100 mt-2">Konfirmasi Laporan</button>
    </form>
  </div>

@endsection