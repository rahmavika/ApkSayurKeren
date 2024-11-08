<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = ['nama','harga','masa_tahan','gambar','kategori_id','keterangan'];

    public function stok()
    {
        return $this->hasOne(Stok::class, 'produk_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
