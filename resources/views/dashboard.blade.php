@extends('layouts.app')

@if (auth()->user()->role->nama_role == 'admin')
@section('title', "Hai, Admin $namaUsaha 🙌")
@else
@section('title', "Halo, Pegawai $namaUsaha 🖐️ ")
@endif


@section('contents')
@if (auth()->user()->role->nama_role == 'admin')
<div class="col-6">
  <form action="{{ route('saldo.store') }}" method="post"> <!-- Tambahkan method="post" untuk mengirimkan form -->
      @csrf <!-- Tambahkan CSRF token untuk keamanan form -->
      <div class="d-flex align-items-end justify-content-center mb-3">
          <label for="stok" class="flex-shrink-0 mr-2" style="color: black;">Modal Awal Usaha</label>
          <input type="number" id="stok" name="saldo" class="form-control mr-2" placeholder="Masukkan " @if ($cekSaldo) value="{{ $cekSaldo->saldo }}"
              readonly
          @endif min="0" required>
          @error('saldo') <!-- Perbaiki error message agar sesuai dengan nama input yang benar -->
              <span class="text-danger">{{ $message }}</span>
          @enderror
          @if (!$cekSaldo)
          <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah Data Anda Sudah Benar ??')">OKE</button> <!-- Tambahkan type="submit" pada tombol -->
          @endif  
      </div>
  </form>
</div>
@endif
<style>
  @import url(https://fonts.googleapis.com/css?family=Roboto);

body {
  font-family: Roboto, sans-serif;
}

.pt-4 {
  padding-top: 0 !important;
}
</style>
  <div class="row @if(auth()->user()->role->nama_role == 'pegawai')
      d-flex justify-content-center  
  @endif">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                Pendapatan</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kasMasukFormat }}</div>
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
              <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kasKeluarFormat }}</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    @if (auth()->user()->role->nama_role == 'admin')
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
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$allLabaRugiFormat}}</div>
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
@endif
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
  @if (auth()->user()->role->nama_role == 'admin')
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
  @endif
  <!-- Content Row -->
  <div class="row">
  </div>

  <script>    

document.addEventListener('DOMContentLoaded', function () {
    var myToast = new bootstrap.Toast(document.getElementById('myToast'));
    myToast.show();
  });

  let datas = @json($chartOptions);
  let kasDiterima = parseInt(@json($kasMasuk));
  let kasKeluar = parseInt(@json($kasKeluar));
  let saldoAkhir = parseInt(@json($saldoAkhir) ?? 0);
  let total = kasDiterima + kasKeluar + saldoAkhir;

  if (kasDiterima != 0 || kasKeluar != 0 || total != 0) {
    let persentaseKasDiterima = (kasDiterima / total) * 100;
    let persentaseKasKeluar = (kasKeluar / total) * 100;
    let persentaseSaldoAkhir = (saldoAkhir / total) * 100;

    var chart = new ApexCharts(document.querySelector("#chart"), datas);
    chart.render();

    var options = {
      series: [persentaseKasDiterima, persentaseKasKeluar, persentaseSaldoAkhir],
      chart: {
        type: 'donut',
      },
      labels: ['Kas Masuk', 'Kas Keluar', 'Saldo Akhir'], // Add labels here
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
  }else{

    const chart = document.getElementById("pieChart");
    const chart2 = document.getElementById("chart");

    chart.innerHTML = "Belum Ada Transaksi "
    chart2.innerHTML = "Belum Ada Transaksi "

  }
// Menghitung persentase dengan menambahkan check untuk menghindari division by zero
  </script>
@endsection
