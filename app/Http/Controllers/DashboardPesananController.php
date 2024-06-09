<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardPesananController extends Controller
{
    public function index()
    {   
        $pesanan = Pesanan::with(
            ['users' => function ($query) {
            $query->select('id','nama');
        }, 'kendaraan' => function ($query) {
            $query->select('kendaraan_id','merk', 'tipe', 'tahun_produksi', 'transmisi','plat_nomor');
        }])->get();

        return view('dashboard/pesanan/index', ['pesanan' => $pesanan]);
    }

    public function show(Pesanan $pesanan)
    {
        $pesanan->load(['users', 'kendaraan', 'lepasKunci', 'detailPesanan', 'pembayaran']);
        return view('dashboard/pesanan/show', ['pesanan' => $pesanan]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:sudah,terverifikasi',
            'karyawan_id' => 'required|exists:users,id',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'status_pembayaran' => $request->status_pembayaran,
            'karyawan_id' => $request->karyawan_id,
        ]);

        // ubah status pesanan
        $pesanan = $pembayaran->pesanan;
        if ($request->status_pembayaran == 'terverifikasi') {
            $pesanan->update(['status_pesanan' => 'diterima']);
        } elseif ($request->status_pembayaran == 'sudah') {
            $pesanan->update(['status_pesanan' => 'dicek']);
        }

        return redirect('/dashboard/kendaraan')->with('success', 'Status pembayaran dan pesanan berhasil diperbarui.');
    }

}
