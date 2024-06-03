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


// Middleware untuk jika sudah login maka tidak boleh akses halaman untuk login, sehingga akan meredirect ke /home
Route::middleware(['guest'])->group(function(){
    Route::get('/session',[SessionController::class, 'index'])->name('login');
    Route::post('/session',[SessionController::class, 'login']);
});
Route::get('/home', function () {
    return redirect('/');
});
Route::middleware(['auth'])->group(function(){
    Route::get('/logout',[SessionController::class, 'logout']);
});


Route::get('/admin',[AdminController::class, 'index'])->middleware('auth', 'isKaryawan');
