<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;

class PengaduanController extends Controller
{
    public function storeDataPengaduan(Request $request){
        $validatedData = $request->validate([
            'nik' => 'required',
            'isi_laporan' => 'required',
            'photo' => 'required|image'
        ]);
        
        $validatedData['photo'] = $request->file('photo')->store('photo-pengaduan'); 
        
        
        Pengaduan::create($validatedData);
        return redirect('/')->with('laporandibuat', 'Laporan Terkirim !');
    }
}
