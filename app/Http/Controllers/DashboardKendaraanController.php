<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'jenis' => 'required|string|max:20|in:suv,mpv,sedan,sport,convertible,elektrik,lcgc,minibus',
            'merk' => 'required|string|max:50',
            'tipe' => 'required|string|max:50',
            'transmisi' => 'required|string|max:10|in:otomatis,manual',
            'tahun_produksi' => 'required|string|max:4',
            'harga_sewa' => 'required|numeric',
            'plat_nomor' => 'required|string|max:10',
            'status' => 'required|in:tersedia,tidak',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('foto');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('imgkendaraan', $filename);

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
            'foto' => $path,
        ]);

        return redirect('/dashboard/kendaraan')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kendaraan $kendaraan)
    {
        return view('dashboard/kendaraan/show', [ 
            'kendaraan' => $kendaraan,
         ]);
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
            'jenis' => 'required|string|max:20|in:suv,mpv,sedan,sport,convertible,elektrik,lcgc,minibus',
            'merk' => 'required|string|max:50',
            'tipe' => 'required|string|max:50',
            'transmisi' => 'required|string|max:10|in:otomatis,manual',
            'tahun_produksi' => 'required|string|max:4',
            'harga_sewa' => 'required|numeric',
            'plat_nomor' => 'required|string|max:10',
            'status' => 'required|in:tersedia,tidak',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $kendaraan->foto;
        // jika foto juga diubah
        if ($request->hasFile('foto')) {
            // hapus foto
            if ($kendaraan->foto) {
                Storage::delete($kendaraan->foto);
            }
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('imgkendaraan', $filename);
        }

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
            'foto' => $path,
        ]);

        return redirect('/dashboard/kendaraan')->with('success', 'Kendaraan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kendaraan $kendaraan)
    {
        Storage::delete($kendaraan->foto);

        $kendaraan->delete();

        return redirect('/dashboard/kendaraan')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
