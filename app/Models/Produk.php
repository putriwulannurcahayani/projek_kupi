<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produks';

    protected $fillable = [
        'kode_produk', 'nama_produk', 'harga', 'stok'
        // Kolom lain yang ingin diisi secara massal
    ];

    // Contoh relasi dengan model lain
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}