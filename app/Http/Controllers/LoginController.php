<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Petugas;
use App\Models\Masyarakat;

class LoginController extends Controller
{
    public function index()
    {
        return view('login',[
            'css' => '/css/login.css',
            'css2' => '/css/home.css',
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // MASYRAKAT LOGIN
        $userinfo = Masyarakat::where('username', $request->username)->first();
        if(!$userinfo){
            return back()->with('fail', 'Username/Password Salah!');
        }else {
            // CHECK PASSWORD
            if(Hash::check($request->password, $userinfo->password)){
                $request->session()->put('userlogin', $userinfo->nik);

                return redirect('/')->with('successLogin', 'Login Berhasil !');
            }else {
                return back()->with('fail', 'Username/Password Salah!');
            }
        }
        // =================================================================

        
        // if(!$petugasinfo){
        //     return back()->with('with', 'Username/Password Salahh');
        // }else {
        //     if(Hash::check($request->username, $petugasinfo->username)){
        //         $request->session()->put('userlogin', $petugasinfo->id_petugas);

        //         return redirect('/');
        //     }else {
        //         return back()->with('fail', 'Username/Password Salahh!');
        //     }
        // }

    }

    public function logout()
    {
        if(session()->has('userlogin')){
            session()->pull('userlogin');
            session()->pull('successLogin');
            return redirect('/')->with('successLogout', 'Logout Berhasil !');
        }
    }
}
