<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class DashboardKendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard/kendaraan/index', ['kendaraan' => Kendaraan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/kendaraan/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:10|in:mobil,minibus',
            'jenis' => 'required|string|max:20',
            'merk' => 'required|string|max:50',
            'tipe' => 'required|string|max:50',
            'transmisi' => 'required|string|max:10|in:otomatis,manual',
            'tahun_produksi' => 'required|string|max:5',
            'harga_sewa' => 'required|numeric',
            'plat_nomor' => 'required|string|max:10',
            'status' => 'required|in:tersedia,tidak',
        ]);

        Kendaraan::create([
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'transmisi' => $request->transmisi,
            'tahun_produksi' => $request->tahun_produksi,
            'harga_sewa' => $request->harga_sewa,
            'plat_nomor' => $request->plat_nomor,
            'status' => $request->status,
        ]);

        return redirect('/dashboard/kendaraan')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kendaraan $kendaraan)
    {
        return view('dashboard/kendaraan/edit', [
            'kendaraan' => $kendaraan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kendaraan $kendaraan)
    {
        $request->validate([
            'kategori' => 'required|string|max:10|in:mobil,minibus',
            'jenis' => 'required|string|max:20',
            'merk' => 'required|string|max:50',
            'tipe' => 'required|string|max:50',
            'transmisi' => 'required|string|max:10|in:otomatis,manual',
            'tahun_produksi' => 'required|string|max:5',
            'harga_sewa' => 'required|numeric',
            'plat_nomor' => 'required|string|max:10',
            'status' => 'required|in:tersedia,tidak',
        ]);

        $kendaraan->update([
            'kategori' => $request->kategori,
            'jenis' => $request->jenis,
            'merk' => $request->merk,
            'tipe' => $request->tipe,
            'transmisi' => $request->transmisi,
            'tahun_produksi' => $request->tahun_produksi,
            'harga_sewa' => $request->harga_sewa,
            'plat_nomor' => $request->plat_nomor,
            'status' => $request->status,
        ]);

        return redirect('/dashboard/kendaraan')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        $kendaraan->delete();

        return redirect('/dashboard/kendaraan')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
