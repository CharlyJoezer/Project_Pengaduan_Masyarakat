<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use App\Models\Petugas;
use App\Models\Tanggapan;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index',[
            'css' => '/css/dashboard.css',
            'title' => 'Dashboard',
            'userlogin' => Masyarakat::where('nik', session('userlogin'))->first(),
            'adminlogin' => Petugas::where('id_petugas', session('adminlogin'))->first()
        ]);
    }
    public function daftarLaporan()
    {
        return view('dashboard.daftarLaporan',[
            'no' => 1,
            'css' => '/css/dashboard.css',
            'title' => 'Daftar Laporan',
            'laporan' => Pengaduan::all()
        ]);
    }
    public function riwayatLaporan()
    {
        return view('dashboard.riwayatLaporan',[
            'no' => 1,
            'css' => '/css/dashboard.css',
            'title' => 'Riwayat Laporan',
            'laporan' => Pengaduan::where('nik', session('userlogin'))->get(),
            'tanggapan' => Tanggapan::all()
        ]);
    }
    public function dashboardLaporanFilter($filter)
    {
        return view('dashboard.filterdaftarlaporan',[
            'no' => 1,
            'css' => '/css/dashboard.css',
            'title' => 'Daftar Laporan',
            'laporan' => Pengaduan::all(),
            'petugas' => Petugas::where('id_petugas', session('adminlogin'))->get(),
            'filter' => $filter
        ]);
    }
    public function dashboardRiwayatFilter($filter)
    {
        return view('dashboard.filterriwayatlaporan',[
            'no' => 1,
            'css' => '/css/dashboard.css',
            'title' => 'Riwayat Laporan',
            'laporan' => Pengaduan::all(),
            'filter' => $filter
        ]);
    }
    public function konfirmasiLaporan(Pengaduan $pengaduan)
    {
        return view('dashboard.konfirmasilaporan',[
            'css' => '/css/dashboard.css',
            'title' => 'Konfirmasi Laporan',
            'laporan' => $pengaduan,
        ]);
    }
    public function buatlaporanview()
    {
        return view('dashboard.buatlaporan', [
            'css' => '/css/dashboard.css',
            'css2'=> '/css/buatlaporan.css',
            'title' => 'Buat Laporan',
            'userlogin' => Masyarakat::where('nik', session('userlogin'))->first()
        ]);
    }
    public function buatlaporan(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required',
            'isi_laporan' => 'required',
            'photo' => 'required|image'
        ]);
        
        $validatedData['photo'] = $request->file('photo')->store('photo-pengaduan'); 
        
        
        Pengaduan::create($validatedData);
        return redirect('/dashboardbuatlaporan')->with('laporandibuat', 'Laporan Terkirim !');
    }
}
