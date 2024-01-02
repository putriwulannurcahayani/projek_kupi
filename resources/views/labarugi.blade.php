    @extends('layouts.app')

    @section('title', 'Laba Rugi')

    @section('contents')

    <body>
        <div class="container mt-4">
            <div class="row mb-5">
                <div class="col-md-9">
                    <div class="card bg-light mb-6">
                        <div class="card-header text-center border">
                            <h5>TOKO {{ $namaUsaha }}</h5>
                            <p>Tanggal: {{ \Carbon\Carbon::now()->format('d-m-y') }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h5 class="bg-primary text-light">Pendapatan</h5>
                                    <div class="total-pendapatan d-flex justify-content-between">
                                        <span>Total Pendapatan</span>
                                        <span>{{ $totalPendapatan }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <h5 class="bg-primary text-light">Pengeluaran</h5>
                                    <div class="card-body">
                                        @foreach ($kategoris as $kategori)
                                        <div class="d-flex justify-content-between">
                                            <span>{{ $kategori->nama }}:</span>
                                            <span>{{ $kategori->bebans->sum('harga') }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                        <div class="p-1 d-flex bg-primary text-light align-items-center justify-content-between">
                                            <h5 class="">Total Beban</h5>
                                            <h5>{{ $totalBeban }}</h5>
                                        </div>
                                    
                                    <div class="total-beban ">
                                    </div>
                                    <div class="mt-3 total-beban d-flex justify-content-between">
                                        <h5>
                                            @if ($labaRugi >= 0)
                                                Laba Bersih
                                            @else
                                                Rugi
                                            @endif
                                        </h5>
                                        <h5>{{ $labaRugi }}</h5>
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
