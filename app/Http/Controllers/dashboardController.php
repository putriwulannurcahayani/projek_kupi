<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beban;
use App\Models\Pendapatan;
use App\Models\Saldo;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
 
    public function index(): View
    { 
        $namaUsaha = strtoupper(Auth::user()->usaha->nama_usaha);  
        
        $cekSaldo = Saldo::where('id_usaha', auth()->user()->id_usaha)->first();

        $kasMasuk = Pendapatan::where('id_usaha', auth()->user()->id_usaha)->sum('total');
        $kasMasukFormat = 'Rp ' . number_format($kasMasuk, 0, ',', '.');
        
        $kasKeluar = Beban::where('id_usaha', auth()->user()->id_usaha)->sum('harga');
        $kasKeluarFormat = 'Rp ' . number_format($kasKeluar, 0, ',', '.');


        if($cekSaldo){
            $saldoAkhir = $cekSaldo->saldo - $kasKeluar;
        }else{
            $saldoAkhir = 0;
        }

        $pendapatan = Pendapatan::where('id_usaha', auth()->user()->id_usaha)->orderBy('created_at', 'desc')->count();

        $allLabaRugi = $kasMasuk - $kasKeluar;
        $allLabaRugiFormat = 'Rp ' . number_format($allLabaRugi, 0, ',', '.');

        // Mengambil data pendapatan dan beban untuk setiap bulan
        $monthlyData = Pendapatan::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->where('id_usaha', auth()->user()->id_usaha)
            ->get()
            ->keyBy('month')
            ->toArray();
    
        $monthlyExpenses = Beban::selectRaw('MONTH(created_at) as month, SUM(harga) as harga')
            ->groupBy('month')
            ->orderBy('month')
            ->where('id_usaha', auth()->user()->id_usaha)
            ->get()
            ->keyBy('month')
            ->toArray();
    
        // Inisialisasi data array dengan nilai 0 untuk semua bulan
        $monthlyChartData = array_fill(1, 12, 0);
    
        // Menghitung laba/rugi untuk setiap bulan
        foreach (range(1, 12) as $month) {
            $totalPendapatan = $monthlyData[$month]['total'] ?? 0;
            $totalBeban = $monthlyExpenses[$month]['harga'] ?? 0;
            $labaRugi = $totalPendapatan - $totalBeban;
    
            $monthlyChartData[$month] = $labaRugi;
        }
    
        $chartOptions = [
            'chart' => [
                'type' => 'line'
            ],
            'series' => [
                [
                    'name' => 'Laba Rugi',
                    'data' => array_values($monthlyChartData)
                ]
            ],
            'xaxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            ]
        ];
    
        return view('dashboard', compact('kasKeluarFormat','kasMasukFormat','allLabaRugiFormat','chartOptions','totalPendapatan','totalBeban','pendapatan','allLabaRugi','cekSaldo','kasMasuk','kasKeluar','saldoAkhir','namaUsaha'));
    }    

}
