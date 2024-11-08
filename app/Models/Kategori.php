<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori','gambar_kategori'];

    public function produk()
    {
        return $this->hasMany(Produk::class, 'kategori_id');
    }

    // Tambahkan event 'deleting' untuk menghapus produk saat kategori dihapus
    protected static function booted()
    {
        static::deleting(function ($kategori) {
            $kategori->produk()->delete(); // Menghapus semua produk terkait
        });
    }
}
