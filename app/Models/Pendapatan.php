<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\KurangiStokProduk;

class Pendapatan extends Model
{
    protected $table = 'pendapatans';

    protected $guarded = ['id'];
    public function orders()
    {
        // return $this->hasMany(Produk::class);
        return $this->belongsTo(Produk::class);
    }
}
