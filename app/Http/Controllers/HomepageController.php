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
}
