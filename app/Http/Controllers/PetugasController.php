<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;

class PetugasController extends Controller
{
    public function index()
    {
        return view('adminLogin',[
            'css' => '/css/login.css',
            'css2' => '/css/home.css',
            'title' => 'ADMIN LOGIN'
        ]);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // MASYRAKAT LOGIN
        $admininfo = Petugas::where('username', $request->username)->first();
        if(!$admininfo){
            return back()->with('fail', 'Username/Password Salah!');
        }else {
            // CHECK PASSWORD
            if(Hash::check($request->password, $admininfo->password)){
                $request->session()->put('adminlogin', $admininfo->id_petugas);

                return redirect('/dashboardHome')->with('successLogin', 'Login Berhasil !');
            }else {
                return back()->with('fail', 'Username/Password Salah!');
            }
        }
    }

    public function logout()
    {
        if(session()->has('adminlogin')){
            session()->pull('adminlogin');
            return redirect('/')->with('successLogout', 'Logout Berhasil !');
        }
    }

    public function regisPetugas()
    {
        return view('dashboard.registerpetugas',[
            'css' => '/css/dashboard.css',
            'css2' => '/css/regispetugas.css',
            'title' => 'Buat Akun Petugas'
            
        ]);
    }

    public function storeDataRegis(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|min:5|max:50|unique:petugas',
            'nama_petugas' => 'required',
            'password' => 'required|min:8|max:50',
            'telp' => 'required|min:11',
            'level' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Petugas::create($validatedData);

        return redirect('/registerpetugas')->with('berhasilregis', 'Akun Berhasil dibuat !');
    }
}
