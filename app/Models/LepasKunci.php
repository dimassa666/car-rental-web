<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LepasKunci extends Model
{
    use HasFactory;

    protected $table = 'lepas_kunci';

    protected $fillable = [
        'tipe_antar',
        'tipe_jemput',
        'lokasi_antar',
        'lokasi_jemput',
        'biaya_antar_jemput',
    ];

    protected $primaryKey = 'lepas_kunci_id';

}
