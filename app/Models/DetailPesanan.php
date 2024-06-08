<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPesanan extends Model
{
    use HasFactory;
    protected $table = 'detail_pesanan';

    protected $primaryKey = 'detail_pesanan_id';

    protected $fillable = [
        'subtotal_kendaraan',
        'subtotal_antar_jemput',
        'subtotal_sopir',
        'potongan_voucher',
        'total_pembayaran',
        'pesanan_id',
    ];

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class, 'pesanan_id');
    }
}
