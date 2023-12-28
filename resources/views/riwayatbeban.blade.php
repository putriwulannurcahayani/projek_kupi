@extends('layouts.app')

@section('title', 'Riwayat Pengeluaran')

@section('contents')

<div class="main">
    <div class="tanggal">
        <p id="tanggal"></p>
    </div>

    <div class="mb-3">
        <a href="{{ route('riwayat.index') }}" class="btn btn-secondary">Pendapatan</a>            
        <a href="{{ route('riwayatbeban') }}" class="btn btn-primary ">Pengeluaran</a>
    </div>	

    {{-- <div class="input-group mb-3">
		<div class="col-3">
			<input type="text" class="form-control" id="startDate" placeholder="dd/mm/yy">
		</div>
		<div class="col-3">
			<input type="text" class="form-control" id="endDate" placeholder="dd/mm/yy">
		</div>
    </div> --}}

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Tanggal Transaksi</th>
                <th>Kategori</th>
                <th>Nama</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beban as $b)
            <tr>
                <td>{{ $b->tanggal }}</td>
                <td>{{ $b->kategori->nama }}</td>
                <td>{{ $b->nama }}</td>
                <td>{{ $b->harga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
