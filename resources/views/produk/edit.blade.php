@extends('layouts.app')

@section('title', 'Edit Produk')

@section('contents')    
    
    <div class="container">
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
        <form action="{{ route('produk.update', $produk->id) }}" method="post" class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="kode_produk" class="form-label">Kode Produk:</label>
                <input type="text" id="kode_produk" name="kode_produk" class="form-control" value="{{ $produk->kode_produk }}" required>
                @error('kode_produk')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk:</label>
                <input type="text" id="nama_produk" name="nama_produk" class="form-control" value="{{ $produk->nama_produk }}" required>
                @error('nama_produk')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="number" id="harga" name="harga" class="form-control" value="{{ $produk->harga }}" required>
                @error('harga')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            {{-- <div class="mx --}}

            <button type="submit" class="btn btn-primary">Edit Produk</button>
            <a href="{{ route('produks.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var myToast = new bootstrap.Toast(document.getElementById('myToast'));
        myToast.show();
      });
    </script>
@endsection
