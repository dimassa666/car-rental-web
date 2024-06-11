<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kendaraan;
use App\Models\Pesanan;
use App\Models\Voucher;
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
    public function create($kendaraan_id)
    {
        $kendaraan = Kendaraan::find($kendaraan_id);
        return view('pesanan.create', compact('kendaraan'));
    }

    public function checkVoucher(Request $request)
    {
        $voucherCode = $request->input('voucher');
        $voucher = Voucher::where('kode_voucher', $voucherCode)->first();

        if ($voucher) {
            return response()->json(['valid' => true, 'value' => $voucher->nilai_diskon]);
        } else {
            return response()->json(['valid' => false, 'value' => 0]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     // Validasi dan simpan data booking
    //         $data = $request->validate([
    //             'start_date' => 'required|date',
    //             'end_date' => 'required|date|after_or_equal:start_date',
    //             'start_time' => 'required',
    //             'tipe_antar' => 'required',
    //             'alamat_antar' => 'nullable|string',
    //             'tipe_jemput' => 'required',
    //             'alamat_jemput' => 'nullable|string',
    //             'sopir' => 'required',
    //             'voucher' => 'nullable|string'
    //         ]);

    //         // Hitung total biaya
    //         $kendaraan = Kendaraan::find($request->input('kendaraan_id'));
    //         $days = (strtotime($request->input('end_date')) - strtotime($request->input('start_date'))) / (60 * 60 * 24) + 1;
    //         $vehicleSubtotal = $days * $kendaraan->harga_sewa;
    //         $deliveryPickupSubtotal = ($request->input('tipe_antar') == 'toko' ? 50000 : 0) + ($request->input('tipe_jemput') == 'toko' ? 50000 : 0);
    //         $driverSubtotal = $request->input('sopir') == 'ya' ? 100000 * $days : 0;
    //         $total = $vehicleSubtotal + $deliveryPickupSubtotal + $driverSubtotal;

    //         // Cek dan terapkan voucher
    //         $voucher = Voucher::where('kode_voucher', $request->input('voucher'))->first();
    //         $discount = 0;
    //         if ($voucher) {
    //             $discount = $total * ($voucher->nilai_diskon / 100);
    //         }
    //         $finalTotal = $total - $discount;

    //         // Simpan data booking
    //         $booking = Booking::create([
    //             'kendaraan_id' => $kendaraan->id,
    //             'user_id' => auth()->id(),
    //             'start_date' => $request->input('start_date'),
    //             'end_date' => $request->input('end_date'),
    //             'start_time' => $request->input('start_time'),
    //             'tipe_antar' => $request->input('tipe_antar'),
    //             'alamat_antar' => $request->input('alamat_antar'),
    //             'tipe_jemput' => $request->input('tipe_jemput'),
    //             'alamat_jemput' => $request->input('alamat_jemput'),
    //             'sopir' => $request->input('sopir'),
    //             'voucher' => $request->input('voucher'),
    //             'total_biaya' => $finalTotal,
    //         ]);

    //         return redirect()->route('booking.success', ['booking' => $booking->id]);
    //     }
    // }

    /**
     * Display the specified resource.
     */
    public function show(Pesanan $pesanan)
    {
        return view('pesanan/show');
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
