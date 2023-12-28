@extends('layouts.app')

@section('title', 'Pengeluaran')

@section('contents')

        <div class="wrapper">
            <form action="{{ route('tambah-pegawai.store') }}" class="signup-form" method="POST">
                @csrf
                <h2 style="padding: 15px; font-size: 1.5rem;">Tambah Pegawai</h2>
                    @if (session()->has('successAddSekolah'))
                    <div class="toast-wrapper">
                        <div class="toast-succes">
                         <div class="toast-succes-container">
                             <div class="icon">
                                 <i class="fa-solid fa-circle-check"></i>
                             </div>
                             <div class="content">
                                 <h1>Succes</h1>
                                 <p>Akun Berhasil Dibuat</p>
                             </div>
                         </div>
                        </div>
                    </div>
    
                    @endif
                <div class="input-box">
                    <input type="text" placeholder="Nama" required name="nama" value="{{ old('nama') }}">
                    @error('nama')
                    <p class="text-red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <input type="text" placeholder="Email" required name="email" value="{{ old('email') }}">
                    @error('email')
                    <p class="text-red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <input type="alamat" placeholder="Alamat" required name="alamat">
                    @error('alamat')
                    <p class="text-red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <input type="noTelepon" placeholder="No Telepon" required name="no_telepon">
                    @error('no_telepon')
                    <p class="text-red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box">
                    <input type="password" placeholder="Password" required name="password">
                    @error('password')
                    <p class="text-red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="input-box button">
                    <input type="submit" value="Create an Account">
                </div>
                <div class="input-box button">
                    <a href="{{ route('laporan-pegawai') }}" class="btn-laporan">Laporan Pegawai</a>
                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="{{asset('vanilla-toast.min.js')}}"></script>
</body>

@endsection
