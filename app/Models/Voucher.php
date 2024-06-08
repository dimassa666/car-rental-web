<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';
    protected $primaryKey = 'voucher_id';

    protected $fillable = [
        'kode_voucher',
        'nilai_diskon',
        'batas_waktu',
        'status',
        'karyawan_id',
    ];

    public function karyawan()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
