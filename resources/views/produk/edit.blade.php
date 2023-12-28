@extends('layouts.app')

@section('title', 'Edit Produk')

@section('contents')    
    
    <div class="container">
        <form action="{{ route('produks.store') }}" method="post" class="needs-validation" novalidate>
            @csrf

            <div class="mb-3">
                <label for="kode_produk" class="form-label">Kode Produk:</label>
                <input type="text" id="kode_produk" name="kode_produk" class="form-control" required>
                @error('kode_produk')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" required>
                @error('nama_produk')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" name="harga" class="form-control" required>
                @error('harga')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="form-label">Stok:</label>
                <input type="number" id="stok" name="stok" class="form-control" required>
                @error('stok')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Tambah Produk</button>
            <a href="{{ route('produks.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
