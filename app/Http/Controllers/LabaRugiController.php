<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beban;
use App\Models\Kategori;
use App\Models\Pendapatan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LabaRugiController extends Controller
{
    public function hitungLabaRugi()
    {
        $namaUsaha = strtoupper(Auth::user()->nama_usaha);
        // Menghitung total pendapatan
        $totalPendapatan = Pendapatan::sum('total');
        // $totalPendapatan = DB::table('pendapatans')->sum('total');

        // Menghitung total beban
        $totalBeban = Beban::sum('harga');
        // Menggunakan query builder Laravel
        $totalBeban = DB::table('bebans')->sum('harga');

        // Menghitung laba rugi
        $labaRugi = $totalPendapatan - $totalBeban;

        $kategoris = Kategori::all();


        return view('labarugi', compact('namaUsaha','totalPendapatan', 'totalBeban', 'labaRugi','kategoris'));
    }
}
