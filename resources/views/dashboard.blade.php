@extends('layouts.app')

@section('title', 'Hai, Admin🖐️')

@section('contents')
<div class="col-6">
  <form action="{{ route('saldo.store') }}" method="post"> <!-- Tambahkan method="post" untuk mengirimkan form -->
      @csrf <!-- Tambahkan CSRF token untuk keamanan form -->
      <div class="d-flex align-items-end justify-content-center mb-3">
          <label for="stok" class="flex-shrink-0 mr-2" style="color: black;">Modal Awal Usaha</label>
          <input type="number" id="stok" name="saldo" class="form-control mr-2" placeholder="Masukkan " @if ($cekSaldo) value="{{ $cekSaldo->saldo }}"
              readonly
          @endif required>
          @error('saldo') <!-- Perbaiki error message agar sesuai dengan nama input yang benar -->
              <span class="text-danger">{{ $message }}</span>
          @enderror
          @if (!$cekSaldo)
          <button type="submit" class="btn btn-primary">OKE</button> <!-- Tambahkan type="submit" pada tombol -->
          @endif  
      </div>
  </form>
</div>
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto);

body {
  font-family: Roboto, sans-serif;
}

.pt-4 {
  padding-top: 0 !important;
}
</style>
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Pendapatan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $totalPendapatan }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                Pengeluaran</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Rp {{ $totalBeban }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Laba Rugi
              </div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">Rp {{ $labaRugi }}</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                Total Pembelian</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendapatan }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <div class="row">

    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Grafik Laba Rugi</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="">
          <div class="chart-area">
            <div id="chart">
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-6">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Grafik Arus Kas</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
            <div id="pieChart"></div>
          </div>
          {{-- <div class="mt-4 text-center small">
            <span class="mr-2">
              <i class="fas fa-circle text-primary"></i> Direct
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-success"></i> Social
            </span>
            <span class="mr-2">
              <i class="fas fa-circle text-info"></i> Referral
            </span>
          </div> --}}
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->
  <div class="row">
  </div>

  <script>
    let datas = @json($chartOptions);
    let kasDiterima = @json($totalPendapatan);
    let kasKeluar = @json($totalBeban);
    let saldoAkhir = @json($labaRugi);

    var chart = new ApexCharts(document.querySelector("#chart"), datas);

    chart.render();

    var options = {
          series: [, 55, 41],
          chart: {
          type: 'donut',
        },
        responsive: [{
          breakpoint: 480,
          options: {
            chart: {
              width: 200
            },
            legend: {
              position: 'bottom'
            }
          }
        }]
        };

        var pieChart = new ApexCharts(document.querySelector("#pieChart"), options);
        pieChart.render();
  </script>
@endsection
