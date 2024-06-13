<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardKendaraanController;
use App\Http\Controllers\DashboardPesananController;
use App\Http\Controllers\DashboardVoucherController;
use App\Http\Controllers\SessionController;
use App\Models\Kendaraan;
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
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/car', function () {
    return view('car');
});
Route::get('/booking', function () {
    // $kendaraan = Kendaraan::take(1)->get();
    return view('booking');
});

Route::get('/car-single', function () {
    return view('car-single');
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


Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('auth', 'isKaryawan');


// dashboard voucher
Route::resource('/dashboard/voucher', DashboardVoucherController::class)->middleware('isKaryawan');
// dashboard kendaraan
Route::resource('/dashboard/kendaraan', DashboardKendaraanController::class)->middleware('isKaryawan');
// dashb pesanan
Route::get('/dashboard/pesanan',[DashboardPesananController::class, 'index'])->middleware('isKaryawan');
Route::get('/dashboard/pesanan/{pesanan}',[DashboardPesananController::class, 'show'])->middleware('isKaryawan');
Route::put('/dashboard/pembayaran/{id}', [DashboardPesananController::class, 'update'])->name('dashboard.pembayaran.update');
