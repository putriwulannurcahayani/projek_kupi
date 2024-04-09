@extends('layouts.app')

@section('title', 'Tambah Jenis Barang')

@section('contents')

<div class="main">
    <div class="tanggal">
        <p id="tanggal"></p>
    </div>
    <div class="container">

        <form action="{{ route('jenisbarangs.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="jenis_barang" class="form-label">Nama Jenis Barang :</label>
                <input type="text" id="jenis_barang" name="nama" required class="form-control">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('produks.create') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection
