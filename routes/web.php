<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardKendaraanController;
use App\Http\Controllers\DashboardPesananController;
use App\Http\Controllers\DashboardVoucherController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

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
// redirect ke tampilan utama
Route::get('/home', function () { return redirect('/'); });


// HALAMAN UTAMA ATAU HOMEPAGE
Route::get('/',[HomepageController::class, 'index']);
Route::get('/about', [HomepageController::class, 'about']);
Route::get('/kontak', [HomepageController::class, 'kontak']);
Route::get('/kendaraan', [HomepageController::class, 'kendaraan'])->name('kendaraan');
Route::get('/kendaraan/{id}', [HomepageController::class, 'showKendaraan']);
// AKHIR HALAMAN UTAMA ATAU HOMEPAGE


// UNTUK PESANAN
Route::middleware(['auth'])->group(function () {
    Route::resource('/pesanan', PesananController::class)->except(['destroy']);
    Route::get('/pesanan/buat/{kendaraan_id}', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('/pesanan/bayar/{pesanan_id}', [PesananController::class, 'showPembayaran'])->name('pesanan.bayar');
    Route::post('/pesanan/bayar/{pesanan_id}', [PesananController::class, 'submitPembayaran'])->name('pesanan.submitPembayaran');
    Route::post('/submit-booking', [PesananController::class, 'store'])->name('booking.submit');
    Route::post('/api/check-voucher', [PesananController::class, 'checkVoucher']);
});
// AKHIR UNTUK PESANAN



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


// UNTUK DASHBOARD KARYAWAN
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware('isKaryawan');
    // dashboard/voucher
Route::resource('/dashboard/voucher', DashboardVoucherController::class)->middleware('isKaryawan');
    // dashboard/kendaraan
Route::resource('/dashboard/kendaraan', DashboardKendaraanController::class)->middleware('isKaryawan');
    // dashborad/pesanan
Route::get('/dashboard/pesanan',[DashboardPesananController::class, 'index'])->middleware('isKaryawan');
Route::get('/dashboard/pesanan/{pesanan}',[DashboardPesananController::class, 'show'])->middleware('isKaryawan');
Route::put('/dashboard/pembayaran/{id}', [DashboardPesananController::class, 'update'])->name('dashboard.pembayaran.update');
// AKHIR UNTUK DASHBOARD KARYAWAN


//METODE POST UNTUK MENGIRIM PROMPT KE BACKEND GOLANG
Route::post('/api/send-prompt', function (Illuminate\Http\Request $request) {
    $response = Http::post('http://127.0.0.1:8080/gemini', [
        'prompt' => $request->input('prompt')
    ]);
    return $response->json();
});

Route::get('/prompt', function () {
    return view('prompt');
});