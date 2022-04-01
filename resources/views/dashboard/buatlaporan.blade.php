@extends('dashboard.layout.template')
@section('container')

      @if(session()->has('laporandibuat'))
      <div class="notif-login alert-success" data-aos="fade-down">
        <div class="text-center">
          <strong>{{ session('laporandibuat') }}</strong>
        </div>
      </div>
      @endif

<div class="row mt-3">
  <div class="col-lg-12">
    <h4>Buat Laporan</h4>
  </div>
</div>
<hr>
<div class="space-row" id="buatlaporan">
  <form action="/storeDataLaporan" method="post" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <input type="hidden" class="form-control" name="nik" id="nik" aria-describedby="emailHelp" value="{{ $userlogin->nik }}">
      </div>
      <div class="mb-3">
        <label for="isilaporan" class="form-label">Isi Laporan</label>
        <textarea class="form-control" name="isi_laporan" id="isilaporan" rows="3"></textarea>
      </div>
      <div class="mb-3">
          <label for="formFile" class="form-label">Foto/Bukti</label>
          <input class="form-control" name="photo" type="file" id="formFile">
      </div>
      <button type="submit" class="btn btn-primary mt-3">Kirim Laporan</button>
  </form>
</div>
@endsection
