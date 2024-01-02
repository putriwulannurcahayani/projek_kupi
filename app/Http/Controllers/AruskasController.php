<?php

namespace App\Http\Controllers;

use App\Models\Beban;
use App\Models\Kategori;
use App\Models\Pendapatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArusKasController extends Controller
{
    public function index()
    {
        // $arusses = ArusKasControllers::all();
        $kategoris = Kategori::all();
        $totalPendapatan = Pendapatan::sum('total');

        // Menggunakan query builder Laravel
        $totalBeban = DB::table('bebans')->sum('harga');

        return view('aruskas',compact('kategoris','totalPendapatan'));
    }

    // public function create()
    // {
    //     return view('arusses.create');
    // }
}
