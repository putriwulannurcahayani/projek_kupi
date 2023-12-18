<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use App\Models\Beban;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(): View
    {
        $pendapatan = Pendapatan::orderBy('created_at', 'desc')->get();
        $beban = Beban::orderBy('created_at', 'desc')->get();

        return view('riwayat', [
            'pendapatan' => $pendapatan,
            'beban' => $beban,
        ]);
        
        $riwayats = $pendapatan->merge($beban);

        return view('riwayat', ['riwayats' => $riwayats]);
    }
    
}