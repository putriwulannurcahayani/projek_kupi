<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi KUPI</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="responsive.css"> 
    <link rel="stylesheet" href="path/to/style.css"></link>
    <script src="path/to/index.var.js"></script>
    {{-- <link rel="stylesheet" href="produkindex.css"> --}}
    <style>
        .wrapper {
            flex: 2;
            /* background-color: #fff; */
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
      

        .signup-form {
            max-width: 400px;
            margin:  auto;
        }

        h2 {
            color: #333;
            text-align: center;
        }

        h6 {
            color: #666;
            text-align: center;
        }

        .input-box {
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 3px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .button input {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        .button input:hover {
            background-color: #0056b3;
        }

        .text {
            text-align: center;
            margin-top: 15px;
        }

        .text a {
            color: #007bff;
        }

        p {
            text-align: center;
        }
        a{
            text-decoration: none;
            color: black;
        }
        .toast-succes{
            background-color: #2dd4bf;
            width: max-content;
            padding: 0.9rem 2.2rem;
            border-radius: 1rem;
            margin-bottom: 1rem;
        }
        .content > h1 {
            color: #fff;
            font-size: 1rem;
            font-weight: 600;

        }
        .content > p {
            color: #fff;
        }
        .icon > i {
            color: #fff;
            font-size: 1.4rem;
        }
        .toast-succes-container{
            display: flex;
            justify-content: start;
            align-items: center;
            gap: 1rem;
        }
        .toast-wrapper{
            display: flex;
            justify-content: center;
            align-items: center;
        }
     

.nav-upper-options {
    display: flex;
    justify-content: space-between;
}


    </style>

    <!-- Add Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        function redirectToProduk() {
            window.location.href = "{{ route('produks.index') }}";
        }
    </script>
</head>

<body>

    <header>
        <div class="logosec">
            <div class="logo">Keuangan Pintar</div>
            <img src="images/imageslogokupi.png" class="img" alt="">
        </div>

        <div class="message">
            <a href="{{route('profile')}}">
                <div class="circle"></div>
                <img src="images/profile.png" class="icn" alt="">
            </a>
            <div class="dp">
                <img src="images/notifikasi.png" class="dpicn" alt="dp">
            </div>
        </div>
    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <a href="/dashboard">
                        <div class="nav-option option2">
                            <h3> Dashboard</h3>
                        </div>
                    </a>

                    <div class="nav-option option4" onclick="redirectToProduk()">
                        <h3> Produk</h3>
                    </div>

                    <a href="/pendapatans">
                        <div class="nav-option option2">
                            <h3> Pendapatan </h3>
                        </div>
                    </a>
                   
                    <a href="/beban">
                    <div class="nav-option option3">
                        <h3> Beban </h3>
                    </div>
                    </a>

                    <a href="/labarugi">
                        <div class="nav-option option5">
                            <h3> Laba Rugi</h3>
                        </div>
                        </a>
    
                        <div class="nav-option option6">
                            <h3> Arus Kas</h3>
                        </div>
    
                        <a href="/riwayat">
                            <div class="nav-option option6">
                                
                                <h3> Riwayat</h3>
                            </div>
                        </a>

                    <div class="nav-option option1">
                        <h3> Tambah Pegawai</h3>
                    </div>

                    <div class="nav-option logout">
                        <form action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
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
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="{{asset('vanilla-toast.min.js')}}"></script>
</body>

</html>
