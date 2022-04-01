
@extends('dashboard.layout.template')
@section('container')
<h3 class="mt-3">Riwayat Laporan</h3>
<hr>

<div class="d-flex ">
  <button class="btn btn-success my-2 print-button" onclick="window.print()"><i class="bi bi-printer"></i> Print</button>

{{-- FILTER --}}
<div class="dropdown my-2 filter-button" style="margin-left: 3px;">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Filter <i class="bi bi-funnel"></i>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding: 0px;">
    <li style="border-bottom: 1px solid grey"><a class="dropdown-item @if(Request::is("dashboardLaporan")) bg-dark @endif" href="/dashboardRiwayatLaporan"><i class="bi bi-clipboard2"></i> Semua Laporan</a></li>
    <li><a class="dropdown-item @if(Request::is("dashboardRiwayatLaporan/0")) bg-dark text-white @endif" href="/dashboardRiwayatLaporan/{{ '0' }}" style="color: rgb(100, 100, 100)"></i><i class="bi bi-clock-history"></i> Sedang verifikasi </a></li>
    <li><a class="dropdown-item @if(Request::is("dashboardRiwayatLaporan/proses")) bg-dark @endif" href="/dashboardRiwayatLaporan/{{ 'proses' }}" style="color: rgba(255, 208, 0, 0.986);"><i class="bi bi-arrow-clockwise"></i> Sedang diproses </a></li>
    <li><a class="dropdown-item @if(Request::is("dashboardRiwayatLaporan/selesai")) bg-dark @endif" href="/dashboardRiwayatLaporan/{{ 'selesai' }}" style="color: green;"><i class="bi bi-check2"></i> Selesai</a></li>
  </ul>
</div>
</div>

<table class="table" border="1px" style="margin-bottom: 100px;">
    <thead class="table-dark">
      <tr>
        <th scope="col">No</th>
        <th scope="col">NIK</th>
        <th scope="col">Photo</th>
        <th scope="col">Isi Laporan</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
        @foreach($laporan as $item)
        @if ($item->status == $filter)
          @if ($item->status == '0' &&  $item->nik == session('userlogin'))
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $item->nik }}</td>
            <td><img class="img-fluid" src="/storage/{{ $item->photo }}" width="150" height="100"></td>
            <td>{{ $item->isi_laporan }}</td>
            @if($item->status == '0' && $item->nik == session('userlogin'))
            <td><h6 class="btn btn-outline-secondary">Sedang diverifikasi</h6></td>
            @elseif($item->status == 'proses' && $item->nik == session('userlogin'))
            <td><h6 class="btn btn-outline-warning">Diproses</h6></td>
            @else
            <td><h6 class="btn btn-outline-success"><i class="bi bi-check2"></i> Selesai</h6></td>
            @endif
          </tr>
          @elseif($item->status == 'proses' &&  $item->nik == session('userlogin'))
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $item->nik }}</td>
            <td><img class="img-fluid" src="/storage/{{ $item->photo }}" width="150" height="100"></td>
            <td>{{ $item->isi_laporan }}</td>
            @if($item->status == '0' && $item->nik == session('userlogin'))
            <td><h6 class="btn btn-outline-secondary">Sedang diverifikasi</h6></td>
            @elseif($item->status == 'proses' && $item->nik == session('userlogin'))
            <td><h6 class="btn btn-outline-warning">Diproses</h6></td>
            @else
            <td><h6 class="btn btn-outline-success"><i class="bi bi-check2"></i> Selesai</h6></td>
            @endif
          </tr>
          @elseif($item->status == 'selesai' &&  $item->nik == session('userlogin'))
          <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $item->nik }}</td>
            <td><img class="img-fluid" src="/storage/{{ $item->photo }}" width="150" height="100"></td>
            <td>{{ $item->isi_laporan }}</td>
            @if($item->status == '0' && $item->nik == session('userlogin'))
            <td><h6 class="btn btn-outline-secondary">Sedang diverifikasi</h6></td>
            @elseif($item->status == 'proses' && $item->nik == session('userlogin'))
            <td><h6 class="btn btn-outline-warning">Diproses</h6></td>
            @else
            <td>
              <h6 class="btn btn-outline-success"><i class="bi bi-check2"></i> Selesai</h6>
              <br>
              <p> <strong>Pesan : </strong><i>"{{ $item->tanggapan->tanggapan }}"</i></p>
            </td>
            @endif
          </tr>
          @endif
        @endif
        @endforeach
    </tbody>
  </table>
@endsection