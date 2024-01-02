<?php

namespace App\Http\Controllers;

use App\Models\Beban;
use App\Models\Kategori;
use App\Models\Pendapatan;
use App\Models\Saldo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArusKasController extends Controller
{
    public function index()
    {
        $cekSaldo = Saldo::where('user_id', auth()->user()->id)->first();
        // $arusses = ArusKasControllers::all();
        $kategoris = Kategori::all();

        $totalPendapatan = Pendapatan::sum('total');

        // Menggunakan query builder Laravel
        $totalBeban = DB::table('bebans')->sum('harga');

        // Menghitung laba rugi
        $labaRugi = $totalPendapatan - $totalBeban;

        return view('aruskas',compact('kategoris','totalPendapatan','cekSaldo','labaRugi'));
    }

    // public function create()
    // {
    //     return view('arusses.create');
    // }
}
