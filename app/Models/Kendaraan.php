<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $table = 'kendaraan';
    protected $primaryKey = 'kendaraan_id';

    protected $fillable = [
        'kategori',
        'jenis',
        'merk',
        'tipe',
        'transmisi',
        'tahun_produksi',
        'harga_sewa',
        'plat_nomor',
        'status',
    ];
}
