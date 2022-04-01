<?php

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\TanggapanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home',[
        'css' => '/css/home.css',
        'css2' => '/css/home.css',
        'title' => 'Home',
        'userlogin' => Masyarakat::where('nik', session('userlogin'))->first(),
        'total' => Pengaduan::where('status', '0')->count(),
        'proses' => Pengaduan::where('status', 'proses')->count(),
        'selesai' => Pengaduan::where('status', 'selesai')->count()
    ]);
});

// KIRIM DATA PENGADUAN DARI HOME
Route::post('/mengirimDataPengaduan', [PengaduanController::class, 'storeDataPengaduan']);

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/storeDataLogin', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// ADMIN LOGIN
Route::get('/adminLogin', [PetugasController::class, 'index'])->middleware('guest');
Route::post('/storeDataAdmin', [PetugasController::class, 'login']);
Route::get('/logoutAdmin', [PetugasController::class, 'logout']);

// REGISTER
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/storeDataRegister', [RegisterController::class, 'register']);

// PETUGAS REGISTER
Route::get('/registerpetugas', [PetugasController::class, 'regisPetugas'])->middleware('admin');
Route::post('/storeDataRegis', [PetugasController::class, 'storeDataRegis']); 

// DASHBOARD
Route::get('/dashboardHome', [DashboardController::class, 'index'])->middleware('login');
Route::get('/dashboardLaporan', [DashboardController::class, 'daftarLaporan'])->middleware('admin');
Route::get('/setproses/{pengaduan}', function(Pengaduan $pengaduan){
    $data = [
        'nik' => $pengaduan->nik,
        'isi_laporan' => $pengaduan->isi_laporan,
        'photo' => $pengaduan->photo,
        'status' => 'proses'
    ];
    Pengaduan::where('id_pengaduan', $pengaduan->id_pengaduan)->update($data);

    return redirect('/dashboardLaporan')->with('notifproses', 'Berhasil diubah !');
});
Route::get('/setselesai/{pengaduan}', function(Pengaduan $pengaduan){

    $data = [
        'nik' => $pengaduan->nik,
        'isi_laporan' => $pengaduan->isi_laporan,
        'photo' => $pengaduan->photo,
        'status' => 'selesai'
    ];
    Pengaduan::where('id_pengaduan', $pengaduan->id_pengaduan)->update($data);
    return redirect('/dashboardLaporan')->with('notifselesai', 'Laporan Selesai !');
});
Route::get('/deletelaporan/{pengaduan}', function(Pengaduan $pengaduan){
    Pengaduan::where('id_pengaduan', $pengaduan->id_pengaduan)->delete();
    return redirect('/dashboardLaporan')->with('gagalverif', 'Berhasil dihapus !');
});

// BUAT LAPORAN DI DASHBOARD
Route::get('/dashboardbuatlaporan', [DashboardController::class, 'buatlaporanview'])->middleware('masyarakat');
Route::post('/storeDataLaporan', [DashboardController::class, 'buatlaporan']);

Route::get('/dashboardRiwayatLaporan', [DashboardController::class, 'riwayatLaporan'])->middleware('masyarakat');
Route::get('/konfirmasilaporan/{pengaduan:id_pengaduan}', [DashboardController::class, 'konfirmasiLaporan'])->middleware('admin');


// FILTER
Route::get('/dashboardLaporan/{filter}', [DashboardController::class, 'dashboardLaporanFilter'])->middleware('admin');
Route::get('/dashboardRiwayatLaporan/{filter}', [DashboardController::class, 'dashboardRiwayatFilter'])->middleware('masyarakat');

// KIRIM TANGGPAN
Route::post('/kirimtanggapan/{id_pengaduan}', [TanggapanController::class, 'storeDataTanggapan'])->middleware('admin');