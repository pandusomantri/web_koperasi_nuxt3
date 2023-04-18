<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Saber extends Model
{
    use HasFactory;
    protected $table = 'sabers';
    protected $fillable = [
        'nama',
        'kelas',
        'no_hp',
        'bulan',
        'jml_bayar',
        'tgl_bayar',
        'pembayaran',
        'keterangan',
    ];
}
