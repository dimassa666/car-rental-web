<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    function index()
    {
        $limaKendaraan = Kendaraan::orderBy('harga_sewa', 'desc')->take(5)->get();        
        $totalKendaraan = Kendaraan::count();
        
        // Kirim data ke view
        return view('index', [
            'limaKendaraan' => $limaKendaraan,
            'totalKendaraan' => $totalKendaraan,
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function kontak()
    {
        return view('kontak');
    }

    public function kendaraan(Request $request)
    {
        $query = Kendaraan::query();

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('tipe', 'like', '%' . $request->search . '%')
                ->orWhere('merk', 'like', '%' . $request->search . '%')
                ->orWhere('tahun_produksi', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('transmisi')) {
            $query->where('transmisi', $request->transmisi);
        }

        if ($request->filled('harga_min')) {
            $query->where('harga_sewa', '>=', $request->harga_min);
        }

        if ($request->filled('harga_max')) {
            $query->where('harga_sewa', '<=', $request->harga_max);
        }

        if ($request->filled('sort')) {
            switch ($request->sort) {
                case 'harga_terendah':
                    $query->orderBy('harga_sewa', 'asc');
                    break;
                case 'harga_tertinggi':
                    $query->orderBy('harga_sewa', 'desc');
                    break;
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $kendaraan = $query->paginate(9);

        $kendaraan->appends($request->all());

        return view('kendaraan/index', compact('kendaraan'));
    }

    public function showKendaraan($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.show', compact('kendaraan'));
    }
}
