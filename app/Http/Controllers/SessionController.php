<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    // form email dan password
    function index(){
        return view('session/login');
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

    function register(){
        return view('session/register');
    }

    function create(Request $request){
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'no_telepon' => 'required|max:15',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar, gunakan email lain',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'no_telepon.required' => 'Nomor telepon wajib diisi',
            'no_telepon.max' => 'Nomor telepon maksimal 15 karakter',
        ]);
    
        // jika yang mendaftar karyawan maka ubah rolenya
        $role = Auth::check() && Auth::user()->role == 'karyawan' ? 'karyawan' : 'pelanggan';
    
        // buat user baru dengan role yang ditentukan
        User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'no_telepon' => $validatedData['no_telepon'],
            'role' => $role,
        ]);
    
        return redirect('/session/berhasil');
        //setelah logout maka akan dikembalikan ke halaman login
    }
    
    function berhasil(){
        return view('/session/berhasil');
    }
}
