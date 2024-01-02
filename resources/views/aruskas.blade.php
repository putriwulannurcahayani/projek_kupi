@extends('layouts.app')

@section('title', 'Arus Kas')

@section('contents')

<body>
    {{-- <label for="nama">Tanggal :</label><br> --}}
    <div class="mb-3">
        <input type="date" placeholder="Tanggal" readonly required name="tanggal" value="{{ old('tanggal', \Carbon\Carbon::now()->format('Y-m-d')) }}">
        @error('tanggal')
            <p class="text-red">Tanggal tidak boleh lebih dari hari ini.</p>
        @enderror
    </div>
    
    <main>
        <section class="aktivitas-operasional">
            <h5 class="bg-primary text-light"> Aktivitas Operasional</h5>
            <table>
                <thead>
                    <tr>
                        <th colspan="2">Kas yang dikeluarkan:</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <td colspan="2"> <!-- Added missing td tags --> --}}
                        {{-- <div class="card-body"> --}}
                            @foreach ($kategoris as $kategori)
                            <tr>
                                <td>{{ $kategori->nama }}:</td>
                                <td>{{ $kategori->bebans->sum('harga') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><strong>Total:</strong></td>
                            <td><strong>{{ $kategoris->sum(function($kategori) { return $kategori->bebans->sum('harga'); }) }}</strong></td>
                        </tr>
                        
                        {{-- </div> --}}
                        {{-- </td> --}}
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th colspan="2">Kas yang diterima:</th>
                    </tr>
                </thead>
                <tbody>
                    <tr> <!-- Added missing tr tag -->
                        <td colspan="2"> <!-- Added missing td tags -->
                            <div class="total-pendapatan d-flex justify-content-between">
                            <tr>
                                <td><strong>Total Pendapatan</strong></td>
                                <td><strong>{{ $totalPendapatan }}</strong></td>
                            </tr>    
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <p>Total aliran kas bersih dari operasi: Rp. xxxxx</p>
        </section>

        <section class="saldo">
            <h2>Saldo</h2>
            <p>Saldo Awal: Rp. xxxxx</p>
            <p>Saldo Akhir: Rp. xxxxx</p>
        </section>
    </main>
</body>
@endsection
