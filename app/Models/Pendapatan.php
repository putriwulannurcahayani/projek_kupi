<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendapatan extends Model
{
    protected $table = 'produks';

    protected $fillable = [
        'tanggal', 'produk', 'jumlah_produk', 'total'
        // Kolom lain yang ingin diisi secara massal
    ];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
