<?php

namespace App\Http\Controllers;

use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function storeDataTanggapan($id, Request $request)
    {   
        $validatedData = $request->validate([
            'tanggapan' => 'required|min:2|max:255'
        ]);
        $validatedData['id_pengaduan'] = $request->id_pengaduan;
        $validatedData['id_petugas'] = $request->id_petugas;
        
        Tanggapan::create($validatedData);

        return redirect('/setselesai'. '/' . $id);
    }
}
