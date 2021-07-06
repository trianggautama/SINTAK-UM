<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {

        return view('auth.login');
    }

    public function login_store(Request $req)
    {
        $credentials = $req->only('username', 'password');

        if (Auth::attempt($credentials)) 
        {
            return redirect()->route('userAdmin.beranda');
        }

        return back()->withErrors([
            'data yang dimasukan tidak ditemukan ',
        ]);
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success','Anda berhasil logout');
    }
}
