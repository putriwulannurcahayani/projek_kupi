@extends('layouts.app')

@section('title', 'Laba Rugi')

@section('contents')

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-9">
                <div class="card bg-light mb-6">
                    <div class="card-header text-center">
                        <h5>TOKO {{ $namaUsaha }}</h5>
                        <p>Tanggal: {{ \Carbon\Carbon::now()->format('d-m-y') }}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Pendapatan</h5>
                                <div class="total-pendapatan d-flex justify-content-between">
                                    <span>Total Pendapatan</span>
                                    <span>{{ $totalPendapatan }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h5>Pengeluaran</h5>
                                <div class="card-body">
                                    @foreach ($kategoris as $kategori)
                                    <div class="beban-kategori mb-8">
                                        <span style="margin-right: 31rem;">{{ $kategori->nama }}:</span>
                                        <span>{{ $kategori->bebans->sum('harga') }}</span>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="total-beban d-flex justify-content-between">
                                    <span>Total Beban</span>
                                    <span>{{ $totalBeban }}</span>
                                </div>
                                <div class="total-beban d-flex justify-content-between">
                                    <span>
                                        @if ($labaRugi >= 0)
                                            Laba Bersih
                                        @else
                                            Rugi
                                        @endif
                                    </span>
                                    <span>{{ $labaRugi }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

@endsection
