<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_pesanan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_detail_pesan';

    protected $fillable = [
        'id_pesan',
        'id_masakan',
        'jumlah',
        'jumlah_harga',    
    ];

    public function masakan()
    {
        return $this->belongsTo('App\Models\masakan', 'id_masakan', 'id_masakan');
    }

    public function pesanan()
    {
        return $this->belongsTo('App\Models\pesanan', 'id_pesan', 'id_pesan');
    }
}
