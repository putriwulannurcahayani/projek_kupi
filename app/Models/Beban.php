<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beban extends Model
{
    protected $table = 'bebans';

    protected $fillable = [
        'tanggal', 'nama','kategori', 'jumlah', 'total_biaya',
        // Kolom lain yang ingin diisi secara massal
    ];

    // Contoh relasi dengan model lain
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
