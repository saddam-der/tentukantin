<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masakan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'id_masakan';

    protected $fillable = [
        'nama_masakan',
        'harga',
        'gambar',
        'status',
    ];

    public function detail_order()
    {
        return $this->hasMany('App\Models\detail_pesanan', 'id_masakan', 'id_masakan');
    }
}
