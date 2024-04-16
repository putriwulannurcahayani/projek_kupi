@extends('layouts.app')

@section('title', 'Pendapatan')

@section('contents')

<div class="row m-auto">
    <div class="col-md-6 offset-md-3">
        <form action="{{ route('pendapatan.store') }}" class="signup-form" method="POST">
            @csrf

            <label for="nama">Tanggal :</label><br>
            <div class="mb-3">
                <input type="date" placeholder="Tanggal" required name="tanggal" value="{{ old('tanggal') }}" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                @error('tanggal')
                    <p class="text-red">Tanggal tidak boleh lebih dari hari ini.</p>
                @enderror
            </div>
            <!-- Existing Code ... -->

            <div class="mb-3">
                <label for="nama">Nama Pembeli :</label><br>
                <input type="text" placeholder="Nama Pembeli" class="form-control" required name="nama_pembeli" value="{{ old('nama_pembeli') }}">
                @error('nama_pembeli')
                    <p class="text-red">{{ $message }}</p>
                @enderror
            </div>

            <!-- Existing Code ... -->

            <div class="mb-3">
                <label for="nama">Pilih Produk :</label><br>
                <select name="id_produk" required class="form-control">
                    <option value="" disabled selected>Select a product</option>
                    @foreach($products as $product)
                    @if($product->stok > 0)
                        <option value="{{ $product->id }}" {{ old('produk') == $product->id ? 'selected' : '' }}>
                            {{ $product->nama_produk }} {{ $product->ukuran}}
                        </option>
                    @endif
                    @endforeach
                </select>
                @error('produk')
                    <p class="text-red">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama">Jumlah :</label><br>
                <input type="jumlahProduk" placeholder="Jumlah Produk" class="form-control" required name="jumlah_produk">
                @error('jumlah_produk')
                <p class="text-red">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3" style="text-align: center;">
                <input type="submit" class="btn btn-primary" value="Tambah Transaksi">
            </div>
        </form>
    </div>
</div>

@endsection
