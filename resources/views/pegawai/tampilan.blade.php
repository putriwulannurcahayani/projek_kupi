@extends('layouts.app')

@section('title', 'Pegawai')

@section('contents')
<body>
  <main>
    <section id="data"> 
      <h4 class="">Tampilkan data</h4>
      <div class="mb-3 d-flex justify-content-end">
        <a href="{{ route('tambah-pegawai') }}" class="btn btn-success mr-3" style="margin-top: 10px">Tambah Pegawai +</a>
        {{-- <a href="{{ route('produks.laporan') }}" class="btn btn-warning" style="margin-top: 10px">Lihat Laporan </a> --}}
        <a href="{{ route('print-pegawai') }}" target="_blank" class="btn btn-info" style="margin-top: 10px">Cetak</a>
    </div>
      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th>No.</th>
            <th>Foto</th>
            <th>Nama Pegawai</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($daftarPegawai as $pegawai)
          <tr>
            <td> {{ $loop->iteration }} </td>
            <td>
              @if ($pegawai->img_profile)
              <img src="{{ asset('storage/' . $pegawai->img_profile) }}" alt="Admin" class="rounded-circle" width="50">
                @else
              <img src="{{ asset('images/polosan.png') }}" alt="Admin" class="rounded-circle" width="50">
              @endif 
            </td>
            <td> {{ $pegawai->nama }} </td>
            <td> {{ $pegawai->email }} </td>
            <td> {{ $pegawai->alamat }} </td>
            <td> {{ $pegawai->no_telepon }} </td>
            <td class="action-buttons">
              {{-- <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-primary">Edit</a> --}}
              <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button  class="btn btn-danger" onclick="return confirm('Anda Yakin Hapus??')">Hapus</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </section>
  </main>
</body>
@endsection

