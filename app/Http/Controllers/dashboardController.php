<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Beban;
use App\Models\Pendapatan;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
 
    public function index(): View
    {   
        $totalPendapatan = Pendapatan::sum('total');
        $totalBeban = Beban::sum('harga');
        $labaRugi = $totalPendapatan - $totalBeban;
        // dd($labaRugi);

        $pendapatan = Pendapatan::orderBy('created_at', 'desc')->count();
        // Fetch monthly data for chart
        $monthlyData = Pendapatan::selectRaw('
                MONTH(pendapatans.created_at) as month,
                SUM(pendapatans.total) - COALESCE(SUM(bebans.harga), 0) as laba_rugi'
            )
            ->leftJoin('bebans', function ($join) {
                $join->on(DB::raw('MONTH(pendapatans.created_at)'), '=', DB::raw('MONTH(bebans.created_at)'));
                $join->on(DB::raw('YEAR(pendapatans.created_at)'), '=', DB::raw('YEAR(bebans.created_at)'));
            })
            ->whereYear('pendapatans.created_at', Carbon::now()->year)
            ->groupBy(DB::raw('MONTH(pendapatans.created_at)'))
            ->orderBy(DB::raw('MONTH(pendapatans.created_at)'))
            ->pluck('laba_rugi', 'month')
            ->toArray();
    
        // Initialize data array with 0 values for all months
        $monthlyChartData = array_fill(1, 12, 0);
    
        foreach ($monthlyData as $month => $labaRugi) {
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
    
        return view('dashboard', compact('chartOptions','totalPendapatan','totalBeban','pendapatan','labaRugi'));
    }

}
