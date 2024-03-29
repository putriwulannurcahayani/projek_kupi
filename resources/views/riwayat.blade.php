@extends('layouts.app')

@section('title', 'Riwayat Pendapatan')

@section('contents')

<div class="main">
    <div class="tanggal">
        <p id="tanggal"></p>
    </div>

    <div class="mb-3">
        @if (session()->has('success'))
    <div class="d-flex justify-content-end">
      <div class="toast my-4 bg-primary" id="myToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="15000">
        <div class="toast-header bg-primary text-light justify-content-between">
          <div class="toast-body text-ligth">
            {{ session('success') }}
          </div>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
    </div>
    @endif
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

    <table class="table table-bordered" >
        <thead class="bg-primary text-light">
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Nama Pembeli</th>
                <th>Nama Produk</th>
                <th>Jumlah Produk</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendapatan as $p)
            <tr>
                <td>{{ $p->tanggal }}</td>
                <td>{{ $p->nama_pembeli }}</td>
                <td>{{ $p->produk->nama_produk }}</td>
                <td>{{ $p->jumlah_produk }}</td>
                <td>{{ $p->harga_produk }}</td>
                <td>{{ $p->total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var myToast = new bootstrap.Toast(document.getElementById('myToast'));
    myToast.show();
  });
</script>

@endsection
