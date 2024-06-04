<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/home', function () {
    return redirect('/');
});

// MENGENAI SESSION (LOGIN DAN LOGOUT)
// jika sudah login maka tidak boleh akses halaman untuk login, sehingga akan meredirect ke /home
Route::get('/session',[SessionController::class, 'index'])->name('login')->middleware('guest');
// hanya tamu dan karyawan untuk membuat akun khusus karyawan lainnya
Route::get('/session/register',[SessionController::class, 'register'])->middleware('guestOrKaryawan'); 

Route::post('/session/login',[SessionController::class, 'login']);
Route::post('/session/create',[SessionController::class, 'create']);
Route::get('/session/berhasil',[SessionController::class, 'berhasil']);
Route::get('/logout',[SessionController::class, 'logout'])->middleware('auth');
// AKHIR SESSION


Route::get('/admin',[AdminController::class, 'index'])->middleware('auth', 'isKaryawan');
