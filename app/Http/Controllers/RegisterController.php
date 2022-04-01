<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Hash;    

class RegisterController extends Controller
{
    public function index()
    {
        return view('register',[
            'css' => '/css/home.css',
            'css2' => '/css/register.css',
            'title' => 'Register'
        ]);  
    }
    public function register(Request $request)
    {
        // return $request->all();
        $validatedData = $request->validate([
            'nik' => 'required|unique:masyarakats|numeric',
            'nama' => 'required',
            'username' => 'required|unique:masyarakats',
            'password' => 'required|min:8',
            'telp' => 'required|numeric'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Masyarakat::create($validatedData);

        return redirect('/login');
    }
}
