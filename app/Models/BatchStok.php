<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchStok extends Model
{
    use HasFactory;

    protected $table = 'batch_stok';

    protected $fillable = [
        'produk_id',
        'jumlah',
        'tgl_kadaluarsa',
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
