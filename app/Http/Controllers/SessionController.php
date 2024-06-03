<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    // form email dan password
    function index(){
        return view('session/index');
    }

    // untuk autentikasi
    function login( Request $request ){
        // cek apakah data yang diinputkan sudah benar
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        // memasukkan request email dan password ke variabel assosiatif
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // lakukan autentikasi
        if(Auth::attempt($infologin)){
            // cek role pengguna dan redirect ke halaman tertentu
            if (Auth::user()->role == 'karyawan') {
                // jika peran pengguna adalah 'karyawan', arahkan ke halaman admin
                return redirect('/admin');
            } elseif (Auth::user()->role == 'pelanggan') {
                // jika peran pengguna adalah 'pelanggan', arahkan ke halaman pelanggan
                return redirect('/');
            }            
        } else{
            return redirect('/session')->withErrors('Email dan password yang dimasukkan tidak sesuai')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('/session');
    }
}
