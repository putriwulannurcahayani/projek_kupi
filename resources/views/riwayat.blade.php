@extends('layouts.app')

@section('title', 'Riwayat Pendapatan')

@section('contents')

<div class="main">
    <div class="tanggal">
        <p id="tanggal"></p>
    </div>

    <div class="mb-3">
        @if (auth()->user()->role->nama_role == 'admin')
        <a href="{{ route('riwayat.index') }}" class="btn btn-primary">Pendapatan</a>  
        <a href="{{ route('riwayatbeban') }}" class="btn btn-secondary">Pengeluaran</a>
        @endif
    </div>
    {{-- <div class="input-group mb-3">
        <input type="text" class="form-control" id="startDate" placeholder="dd/mm/yy">
        <span class="input-group-text">-</span>
        <input type="text" class="form-control" id="endDate" placeholder="dd/mm/yy">
    </div> --}}

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Nama</th>
                <th>Jumlah Produk</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendapatan as $p)
            <tr>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->produk->nama_produk }}</td>
                <td>{{ $p->jumlah_produk }}</td>
                <td>{{ $p->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
