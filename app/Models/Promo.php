<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi',
        'diskon',
        'tanggal_mulai',
        'tanggal_berakhir',
    ];

    /**
     * Scope untuk mendapatkan promo yang aktif saat ini.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAktif($query)
    {
        return $query->whereDate('tanggal_mulai', '<=', now())
                     ->whereDate('tanggal_berakhir', '>=', now());
    }
}
