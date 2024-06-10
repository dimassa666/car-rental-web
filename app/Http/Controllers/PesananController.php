<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (auth()->check()) {
            $userId = auth()->id();
            // eager loading relasi `kendaraan`, `detailPesanan`, dan `pembayaran`
            $pesanan = Pesanan::with(['kendaraan', 'detailPesanan', 'pembayaran'])
                              ->where('pelanggan_id', $userId)
                              ->latest()
                              ->get();
            return view('pesanan/index', ['pesanan' => $pesanan]);
        } else {
            return redirect('/session');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan, $pesanan_id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    public function showPembayaran($pesanan_id)
    {
        $pesanan = Pesanan::find($pesanan_id);
        $detail_pesanan = $pesanan->detailPesanan;
        return view('pesanan/pembayaran', compact('pesanan', 'detail_pesanan'));
    }

    public function submitPembayaran(Request $request, $pesanan_id)
    {
        $request->validate([
            'jumlah_sudah_dibayar' => 'required|numeric',
            'waktu_pembayaran' => 'required|date',
            'foto_bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $pesanan = Pesanan::find($pesanan_id);
        $pesanan->jumlah_sudah_dibayar = $request->jumlah_sudah_dibayar;
        $pesanan->waktu_pembayaran = $request->waktu_pembayaran;

        if ($request->hasFile('foto_bukti')) {
            $imageName = time().'.'.$request->foto_bukti->extension();
            $request->foto_bukti->storeAs('bukti_pembayaran', $imageName, 'public');
            $pesanan->foto_bukti = $imageName;
        }

        $pesanan->status_pesanan = 'menunggu_verifikasi';
        $pesanan->save();

        return redirect()->route('pesanan.index')->with('success', 'Bukti pembayaran berhasil dikirim.');
    }

}
