<?php

namespace App\Http\Controllers;

use App\Models\DetailPesanan;
use App\Models\Kendaraan;
use App\Models\LepasKunci;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        if (auth()->check()) {
            $userId = auth()->id();
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

        $pesanan = DB::table('pesanan')
            ->where('kendaraan_id', $kendaraan_id)
            ->whereIn('status_pesanan', ['diterima', 'dicek', 'dibuat'])
            ->get();

        $unavailableDates = [];
        foreach ($pesanan as $order) {
            $startDate = strtotime($order->waktu_mulai);
            $endDate = strtotime($order->waktu_selesai);

            // Tambahkan semua tanggal dalam rentang start_date hingga end_date ke array
            for ($date = $startDate; $date <= $endDate; $date = strtotime('+1 day', $date)) {
                $unavailableDates[] = date('Y-m-d', $date);
            }
        }

        return view('pesanan.create', compact('kendaraan', 'unavailableDates'));
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

    public function store(Request $request)
    {   
        // return dd($request);

        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'start_time' => 'required',
            'delivery' => 'nullable',
            'delivery_address_input' => 'required_if:delivery,on|nullable|string',
            'pickup' => 'nullable',
            'pickup_address_input' => 'required_if:pickup,on|nullable|string',
            'driver' => 'nullable',
            'metode_pembayaran' => 'required',
            'voucher' => 'nullable|string',
        ]);

        // hitung total biaya
        $kendaraan = Kendaraan::find($request->input('kendaraan_id'));
        $days = (strtotime($request->input('end_date')) - strtotime($request->input('start_date'))) / (60 * 60 * 24);
        $vehicleSubtotal = $days * $kendaraan->harga_sewa;
        $deliveryPickupSubtotal = ($request->input('delivery') == 'on' ? 50000 : 0) + ($request->input('pickup') == 'on' ? 50000 : 0);
        $driverSubtotal = $request->input('driver') == 'on' ? 100000 * $days : 0;
        $total = $vehicleSubtotal + $deliveryPickupSubtotal + $driverSubtotal;

        // cek voucher
        $voucher = Voucher::where('kode_voucher', $request->input('voucher'))->first();
        $discount = 0;
        if ($voucher) {
            $discount = $total * ($voucher->nilai_diskon / 100);
        }
        $finalTotal = $total - $discount;

        // gabung tanggal dan waktu
        $startDateTime = $request->input('start_date') . ' ' . $request->input('start_time');
        $endDateTime = $request->input('end_date') . ' ' . $request->input('start_time');

        // simpan lepas kunci
        if( $request->input('delivery') == 'on' ){
            $tipe_antar = 'bebas';
            if($request->input('delivery_address_input')){
                $lokasi_antar = $request->input('delivery_address_input');
            }
            else{
                $lokasi_antar = 'Belum ditentukan';
            }
        } else {
            $tipe_antar = 'toko';
            $lokasi_antar = 'toko';
        }

        if( $request->input('pickup') == 'on' ){
            $tipe_jemput = 'bebas';
            if($request->input('pickup_address_input')){
                $lokasi_jemput = $request->input('pickup_address_input');
            }
            else{
                $lokasi_jemput = 'Belum ditentukan';
            }
        } else {
            $tipe_jemput = 'toko';
            $lokasi_jemput = 'toko';
        }
        $lepasKunci = LepasKunci::create([
            'tipe_antar' => $tipe_antar,
            'lokasi_antar' => $lokasi_antar,
            'tipe_jemput' => $tipe_jemput,
            'lokasi_jemput' => $lokasi_jemput,
            'biaya_antar_jemput' => $deliveryPickupSubtotal,
        ]);

        $pakai_sopir = $request->input('driver') == 'on' ? 'ya' : 'tidak';

        // simpan data booking
        $pesanan = Pesanan::create([
            'waktu_mulai' => $startDateTime,
            'waktu_selesai' => $endDateTime,
            'jumlah_hari' => $days,
            'status_pesanan' => 'dibuat',
            'sopir' => $pakai_sopir,
            'pelanggan_id' => auth()->id(),
            'kendaraan_id' => $kendaraan->kendaraan_id,
            'lepas_kunci_id' => $lepasKunci->lepas_kunci_id,
        ]);
        
        Pembayaran::create([
            'metode' => $request->input('metode_pembayaran'),
            'jumlah_sudah_dibayar' => 0,
            'batas_waktu_pembayaran' => now()->addDay(),
            'status_pembayaran' => 'belum',
            'pesanan_id' => $pesanan->pesanan_id,
            'pelanggan_id' => auth()->id(),
        ]);

        DetailPesanan::create([
            'subtotal_kendaraan' => $vehicleSubtotal,
            'subtotal_antar_jemput' => $deliveryPickupSubtotal,
            'subtotal_sopir' => $driverSubtotal,
            'potongan_voucher' => $discount,
            'total_pembayaran' => $finalTotal,
            'pesanan_id' => $pesanan->pesanan_id,
        ]);
        return redirect("/pesanan/bayar/{$pesanan->pesanan_id}");
    }






    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pesanan = Pesanan::findOrFail($id);

        $kendaraan = Kendaraan::findOrFail($pesanan->kendaraan_id);
        $lepas_kunci = LepasKunci::findOrFail($pesanan->lepas_kunci_id);
        $detail_pesanan = DetailPesanan::where('pesanan_id', $id)->first();
        $pembayaran = Pembayaran::where('pesanan_id', $id)->first();

        return view('pesanan.show', compact('pesanan', 'kendaraan', 'lepas_kunci', 'detail_pesanan', 'pembayaran'));
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
        $pembayaran  =$pesanan->pembayaran;
        return view('pesanan/pembayaran', compact('pesanan', 'detail_pesanan', 'pembayaran'));
    }

    public function submitPembayaran(Request $request, $pesanan_id)
    {
        $request->validate([
            'jumlah_sudah_dibayar' => 'required|numeric',
            'waktu_pembayaran' => 'required|date',
            'foto_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        try {
            // Mulai transaksi database
            DB::beginTransaction();
    
            // Temukan pembayaran terkait
            $pembayaran = Pembayaran::findOrFail($pesanan_id);
            $pembayaran->jumlah_sudah_dibayar = $request->jumlah_sudah_dibayar;
            $pembayaran->waktu_pembayaran = $request->waktu_pembayaran;
    
            if ($request->hasFile('foto_pembayaran')) {
                $file = $request->file('foto_pembayaran');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $pembayaran->foto_pembayaran = $file->storeAs('imgpembayaran', $filename, 'public'); // Simpan ke direktori storage/app/public/imgpembayaran
            }
    
            $pembayaran->status_pembayaran = 'sudah';
            $pembayaran->save();
    
            // Temukan pesanan terkait
            $pesanan = Pesanan::findOrFail($pesanan_id);
            $pesanan->status_pesanan = 'dicek';
            $pesanan->save();
    
            // Komit transaksi database
            DB::commit();
    
            return redirect('/pesanan')->with('success', 'Bukti pembayaran berhasil dikirim.');
        } catch (\Exception $e) {
            // Batalkan transaksi jika ada kesalahan
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim bukti pembayaran. Silakan coba lagi.');
        }
    }
    

}
