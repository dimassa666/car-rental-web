<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $primaryKey = 'pesanan_id';

    protected $fillable = [
        'waktu_mulai',
        'waktu_selesai',
        'jumlah_hari',
        'status_pesanan',
        'sopir',
        'pelanggan_id',
        'kendaraan_id',
        'lepas_kunci_id',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function lepasKunci()
    {
        return $this->belongsTo(LepasKunci::class, 'lepas_kunci_id');
    }
}
