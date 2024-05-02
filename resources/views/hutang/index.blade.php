@extends('layouts.app')

@section('title', 'Hutang Piutang')

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
                                         
                            @if (session()->has('destroy'))
                            <div class="d-flex justify-content-end">
                            <div class="toast my-4 bg-danger" id="myToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="15000">
                                <div class="toast-header bg-danger text-light justify-content-between">
                                <div class="toast-body text-ligth">
                                    {{ session('destroy') }}
                                </div>
                                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>
                            </div>
                            </div>
                            @endif
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
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="{{ route('hutang.index') }}" class="btn btn-primary">Hutang</a>  
                                        <a href="{{ route('piutang.index') }}" class="btn btn-secondary">Piutang</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('hutang.create') }}" class="btn btn-success">Tambah</a>
                                        <a href="" class="btn btn-primary">Bayar</a>
                                    </div>
                                </div>
                            @endif

                    </div>
                   
                    <table class="table table-striped">
                        <thead class="">
                            <tr>
                                <th scope="col">Tanggal Peminjaman</th>
                                <th scope="col">Tanggal Jatuh Tempo</th>
                                <th scope="col">Nama Pemberi Pinjaman</th>
                                <th scope="col">Nominal</th>
                                <th scope="col">Jumlah Cicilan</th>
                                <th scope="col">Sisa Hutang</th>
                                <th class="text-center" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hutangs as $hutang)
                                <tr>
                                    
                                    <td>{{ $hutang->tanggal_pinjaman}}</td>
                                    <td>{{ $hutang->tanggal_jatuh_tempo }}</td>
                                    <td>{{ $hutang->nama }}</td>
                                    <td>{{ $hutang->jumlah_hutang }}</td>
                                    <td>{{ $hutang->jumlah_cicilan }}</td>
                                    <td class="action-buttons d-flex justify-content-center">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var myToast = new bootstrap.Toast(document.getElementById('myToast'));
        myToast.show();
      });
    </script>
@endsection
