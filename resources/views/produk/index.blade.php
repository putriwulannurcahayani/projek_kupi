@extends('layouts.app')

@section('title', 'Produk')

@section('contents')

    <div class="main-container">
        <div class="navcontainer">
            <!-- Navigation section -->
            {{-- Your navigation code goes here --}}
        </div>

        <div class="main">
            <div class="tanggal">
                <p id="tanggal"></p>
            </div>

            <div class="box-container">
                <div class="container">
                    <div class="mb-3">
                        <a href="{{ route('produks.create') }}" class="btn btn-success mr-3" style="margin-top: 10px">Tambah +</a>
                        <a href="{{ route('produks.laporan') }}" class="btn btn-warning" style="margin-top: 10px">Lihat Laporan </a>
                    </div>
                    <table class="table table-striped">
                        <thead class="">
                            <tr>
                                <th scope="col">Kode Produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th class="text-center" scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $produk)
                                <tr>
                                    <td>{{ $produk->kode_produk }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->harga }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td class="action-buttons d-flex justify-content-center">
                                        <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-primary">Edit</a>
                                        <form class="d-inline ml-3  " action="{{ route('produks.destroy', $produk->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger ">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
