<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\Request;

class DashboardVoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return view('dashboard/voucher/index', ['voucher' => Voucher::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard/voucher/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'kode_voucher' => 'required|string|max:100|unique:voucher',
            'nilai_diskon' => 'required|numeric',
            'batas_waktu' => 'required|date',
            'status' => 'required|string|in:aktif,kedaluwarsa',
            'karyawan_id' => 'required|exists:users,id',
        ]);

        $voucher = new Voucher();
        $voucher->kode_voucher = $validatedData['kode_voucher'];
        $voucher->nilai_diskon = $validatedData['nilai_diskon'];
        $voucher->batas_waktu = $validatedData['batas_waktu'];
        $voucher->status = $validatedData['status'];
        $voucher->karyawan_id = $validatedData['karyawan_id'];

        $voucher->save();

        return redirect('/dashboard/voucher')->with('success', 'Voucher berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voucher $voucher)
    {   
        $user = User::where('id', $voucher->karyawan_id)->first();

        return view('dashboard/voucher/show', [ 
            'voucher' => $voucher,
            'user' => $user,
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voucher $voucher)
    {
        return view('dashboard/voucher/edit', [
            'voucher' => $voucher
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voucher $voucher)
    {   
        $request->validate([
            'kode_voucher' => 'required|string|max:100',
            'nilai_diskon' => 'required|numeric',
            'batas_waktu' => 'required|date',
            'status' => 'required|in:aktif,kedaluwarsa',
            'karyawan_id' => 'required|exists:users,id'
        ]);

        $voucher->update([
            'kode_voucher' => $request->kode_voucher,
            'nilai_diskon' => $request->nilai_diskon,
            'batas_waktu' => $request->batas_waktu,
            'status' => $request->status,
            'karyawan_id' => $request->karyawan_id
        ]);

        return redirect('/dashboard/voucher')->with('success', 'Voucher berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voucher $voucher)
    {
        $voucher->delete();

        return redirect('/dashboard/voucher')->with('success', 'Voucher berhasil dihapus.');
    }
}
