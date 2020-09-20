<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_pesan';

    protected $fillable = [
        'no_meja',
        'tanggal_pesan',
        'id_user',
        'jumlah_harga',
        'status',
    ];
}
