<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beban;
use App\Models\Pendapatan;
use App\Models\Saldo;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
 
    public function index(): View
    {   

        $cekSaldo = Saldo::where('user_id', auth()->user()->id)->first();
        $totalPendapatan = Pendapatan::sum('total');
        $totalBeban = Beban::sum('harga');
        $labaRugi = $totalPendapatan - $totalBeban;
        $pendapatan = Pendapatan::orderBy('created_at', 'desc')->count();

        // Mengambil data pendapatan dan beban untuk setiap bulan
        $monthlyData = Pendapatan::selectRaw('MONTH(created_at) as month, SUM(total) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month')
            ->toArray();
    
        $monthlyExpenses = Beban::selectRaw('MONTH(created_at) as month, SUM(harga) as harga')
            ->groupBy('month')
            ->orderBy('month')
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
    
        return view('dashboard', compact('chartOptions','totalPendapatan','totalBeban','pendapatan','labaRugi','cekSaldo'));
    }    

}
