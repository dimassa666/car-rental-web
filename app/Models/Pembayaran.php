<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'pembayaran_id';
    protected $fillable = [
        'metode', 
        'jumlah_sudah_dibayar', 
        'waktu_pembayaran', 
        'batas_waktu_pembayaran', 
        'status_pembayaran', 
        'pesanan_id', 
        'pelanggan_id', 
        'karyawan_id',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id');
    }


    public function karyawan()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
