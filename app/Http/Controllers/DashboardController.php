<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // function index(){
    //     return view('dashboard/index');
    // }

    public function index()
    {
        $currentDateTime = now();
        // Get ongoing orders with status 'diterima'
        $ongoingOrders = Pesanan::where('status_pesanan', 'diterima')
            ->where('waktu_mulai', '<=', $currentDateTime)
            ->where('waktu_selesai', '>=', $currentDateTime)
            ->with('kendaraan', 'users')
            ->get();

        $totalUsers = User::count();
        $totalKendaraan = Kendaraan::count();
        $totalPesanan = Pesanan::count();
        $totalVoucher = Voucher::count();
        $totalPembayaran = Pembayaran::count();

        $recentPesanan = Pesanan::with('users', 'kendaraan')
            ->orderBy('pesanan_id', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard/index', compact('totalUsers', 'totalKendaraan', 'totalPesanan', 'totalVoucher', 'totalPembayaran', 'recentPesanan', 'ongoingOrders'));
    }
}
