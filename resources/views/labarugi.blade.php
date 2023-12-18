<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, 
				initial-scale=1.0">
    <title>Aplikasi KUPI</title>
    {{-- <link rel="stylesheet" href="dashboard.css"> --}}
    <link rel="stylesheet" href="responsive.css">
    <style>
        /* Main CSS Here */


@import url(
    "https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" );
* {
margin: 0;
padding: 0;
box-sizing: border-box;
font-family:  'Poppins', Regular;
}
:root {
--background-color1: #1093B5;
--background-color2: #1093B5;
--background-color3: #ededed;
--background-color4: #cad7fda4;
--primary-color: #4b49ac;
--secondary-color: #0c007d;
--Border-color: #172434;
--one-use-color: #172434;
--two-use-color: #172434;
}
body {
background-color: var(--background-color4);
max-width: 100%;
overflow-x: hidden;
}

header {
height: 70px;
width: 100vw;
padding: 0 30px;
background-color: var(--background-color1);
position: fixed;
z-index: 100;
box-shadow: 1px 1px 15px rgba(161, 182, 253, 0.825);
display: flex;
justify-content: space-between;
align-items: center;
}

.logo {
font-size: 27px;
font-weight: 600;
color: rgb(239, 245, 241);
}

.img {
	height: 50px;
}

.icn {
height: 50px;
}
.menuicn {
cursor: pointer;
}

.searchbar,
.message,
.logosec {
display: flex;
align-items: center;
justify-content: center;
}

.searchbar2 {
display: none;
}

.logosec {
gap: 10px;
}

.searchbar input {
width: 250px;
height: 42px;
border-radius: 50px 0 0 50px;
background-color: var(--background-color3);
padding: 0 20px;
font-size: 15px;
outline: none;
border: none;
}
.searchbtn {
width: 50px;
height: 42px;
display: flex;
align-items: center;
justify-content: center;
border-radius: 0px 50px 50px 0px;
background-color: var(--secondary-color);
cursor: pointer;
}

.message {
gap: 5px;
position: relative;
cursor: pointer;
}
.circle {
height: 5px;
width: 5px;
position: absolute;
border-radius: 50%;
left: 19px;
top: 8px;
}
.dp {
height: 45px;
width: 45px;
border-radius: 400%;
display: flex;
align-items: center;
justify-content: center;
overflow: hidden;
}
.main-container {
display: flex;
width: 100vw;
position: relative;
top: 70px;
z-index: 1;
}
.dpicn {
height: 40px;
}

.main {
height: calc(100vh - 70px);
width: 100%;
overflow-y: scroll;
overflow-x: hidden;
padding: 20px 30px 30px 30px;
}

.main::-webkit-scrollbar-thumb {
background-image: 
		linear-gradient(to bottom, rgb(0, 0, 85), rgb(0, 0, 50));
}
.main::-webkit-scrollbar {
width: 5px;
}
.main::-webkit-scrollbar-track {
background-color: #9e9e9eb2;
}

.box-container {
display: flex;
justify-content: space-evenly;
align-items: center;
flex-wrap: wrap;
gap: 50px;
}
.nav {
min-height: 91vh;
width: 250px;
background-color: var(--background-color2);
position: absolute;
top: 0px;
left: 00;
box-shadow: 1px 1px 10px rgba(198, 189, 248, 0.825);
display: flex;
flex-direction: column;
justify-content: space-between;
overflow: hidden;
padding: 30px 0 20px 10px;

}
.navcontainer {
height: calc(100vh - 70px);
width: 250px;
position: relative;
overflow-y: scroll;
overflow-x: hidden;
transition: all 0.5s ease-in-out;
}
.navcontainer::-webkit-scrollbar {
display: none;
}
.navclose {
width: 80px;
}
.nav-option {
width: 250px;
height: 60px;
display: flex;
align-items: center;
padding: 0 30px 0 20px;
gap: 20px;
transition: all 0.1s ease-in-out;
}
.nav-option:hover {
    border-left: 5px solid #a2a2a2;
    background-color: #dadada;
    cursor: pointer;
    }
.nav-img {
height: 30px;
}
button {
    padding: 8px;
    border: none;
    border-radius: 3px;
    background-color: #dc3545;
    color: white;
    cursor: pointer;
    transition: opacity 0.3s ease;
}

button:hover {
    opacity: 0.7;
}
.nav-upper-options {
display: flex;
flex-direction: column;
align-items: center;
gap: 30px;

}
.nav-upper-options h3 {
    font-size: 25px; /* You can adjust the size as needed */
}
.b h6 {
    font-size: 35px; /* You can adjust the size as needed */
}


.option1 {
border-left: 5px solid #1093B5;
background-color: var(--Border-color);
color: white;
cursor: pointer;
}
.option1:hover {
border-left: 5px solid #00580caf;
background-color: var(--Border-color);
}
.box {
height: 130px;
width: 230px;
border-radius: 20px;
box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.751);
padding: 20px;
display: flex;
align-items: center;
justify-content: space-around;
cursor: pointer;
transition: transform 0.3s ease-in-out;
}
.box:hover {
transform: scale(1.08);
}

.box:nth-child(1) {
background-color: var(--one-use-color);
}
.box:nth-child(2) {
background-color: var(--two-use-color);
}
.box:nth-child(3) {
background-color: var(--one-use-color);
}
.box:nth-child(4) {
background-color: var(--two-use-color);
}

.box img {
height: 50px;
}
.box .text {
color: white;
}
.topic {
font-size: 13px;
font-weight: 400;
letter-spacing: 1px;
}

.topic-heading {
font-size: 30px;
letter-spacing: 3px;
}

.report-container {
min-height: 300px;
max-width: 1200px;
margin: 70px auto 0px auto;
background-color: #ffffff;
border-radius: 30px;
box-shadow: 3px 3px 10px rgb(188, 188, 188);
padding: 0px 20px 20px 20px;
}
.report-header {
height: 80px;
width: 100%;
display: flex;
align-items: center;
justify-content: space-between;
padding: 20px 20px 10px 20px;
border-bottom: 2px solid rgba(0, 20, 151, 0.59);
}

.recent-Articles {
font-size: 30px;
font-weight: 600;
color: #172434;
}

.view {
height: 35px;
width: 90px;
border-radius: 8px;
background-color: #172434;
color: white;
font-size: 15px;
border: none;
cursor: pointer;
}

.report-body {
max-width: 1160px;
overflow-x: auto;
padding: 20px;
}
.report-topic-heading,
.item1 {
width: 1120px;
display: flex;
justify-content: space-between;
align-items: center;
}
.t-op {
font-size: 18px;
letter-spacing: 0px;
}

.items {
width: 1120px;
margin-top: 15px;
}

.item1 {
margin-top: 20px;
}
.t-op-nextlvl {
font-size: 14px;
letter-spacing: 0px;
font-weight: 600;
}

.label-tag {
width: 100px;
text-align: center;
background-color: rgb(0, 177, 0);
color: white;
border-radius: 4px;
}

.tanggal{
	display: flex;
	justify-content: end;
	width: 100%;
}


.tambah{
    text-decoration: none;
    color: black ;
}

a {
    background-color: none;
    color: black;
    text-decoration: none;
}
        body {
            margin-top: 0px;
            color: #1a202c;
            text-align: left;
            /* background-color: #e2e8f0; */
        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col,
        .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }

        .mb-3,
        .my-3 {
            margin-bottom: 1rem !important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        h3 {
            font-size: 1.5rem;
        }

        a {
            text-decoration: none;
            color: black;
        }

        .container-table {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }
        
        .wrapper-table {
            background-color: white;
            width: 65%;
            border: 3px solid #1e40af;
            margin-bottom: 0rem;
        }

        .judul {
            color: white;
            text-align: center;
            padding: 10px 10px 10px 10px;
            background-color: #1093B5;
        }

        .judul>h1 {
            font-size: 2rem;
        }

        .sub-judul {
            text-align: center;
            padding: 6px;
            border-bottom: 4px solid #1093B5;
        }

        .sub-judul>h1 {
            font-size: 1.8rem;
        }

        .sub-judul>h3 {
            font-size: 1.1rem;
        }

        .pendapatan {
            padding: 20px 25px 0px 25px;
            display: flex;
            justify-content: space-between;
        }

        .pendapatan>p {
            font-size: 1.2rem;
        }

        .beban{
            padding: 20px 25px 0px 25px;
        }

        .beban-kategori{
            padding: 5px 25px 0px 25px;
            display: flex;
            justify-content: space-between;
        }

        .total-beban{
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            
        }

        .total-beban > p{
            font-size: 1.2rem;
        }
    </style>
</head>

<body>

    <!-- for header part -->
    <header>

        <div class="logosec">
            <div class="logo">Keuangan Pintar</div>
            <img src="images/imageslogokupi.png" class="icn menuicn" id="menuicn" alt="menu-icon">

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
        </div>

    </header>

    <div class="main-container">
        <div class="navcontainer">
            <nav class="nav">
                <div class="nav-upper-options">
                    <a href="/dashboard">
                        <div class="nav-option option4">

                            <h3> Dashboard</h3>
                        </div>

                    </a>
                    <a href="/produks">
                        <div class="nav-option option4">
                            <h3> Produk</h3>
                        </div>
                    </a>

                    <a href="/pendapatans">
                        <div class="nav-option option4">
                            <h3> Pendapatan </h3>
                        </div>
                    </a>


                    @if (auth()->user()->role->nama_role == 'admin')
                    <a href="/beban">
                        <div class="nav-option option3">
                            <h3> Beban </h3>
                        </div>
                    </a>

                    <div class="nav-option option1">
                        <h3> Laba Rugi</h3>
                    </div>

                    <div class="nav-option option6">

                        <h3> Arus Kas</h3>
                    </div>

                    <div class="nav-option option7">

                        <h3> Riwayat</h3>
                    </div>

                    <a href="{{route('tambah-pegawai')}}" class="tambah">
                        <div class="nav-option option8">

                            <h3> Tambah Pegawai</h3>
                        </div>
                    </a>
                    @endif

                    <div class="nav-option">
                        <form action="{{route('logout')}}" method="POST" style="background-color: transparent; box-shadow: none; width: 100%;">
                            @csrf
                            <button type="submit">Logout</button>
                        </form>
                    </div>

                </div>
            </nav>
        </div>
        </head>

        <body>
            <div class="container-table">
                <div class="wrapper-table">
                    <div class="judul">
                        <h1>Toko {{$namaUsaha}}</h1>
                    </div>
                    <div class="sub-judul">
                        <h1>Laporan Laba Rugi</h1>
                        <h3>{{ \Carbon\Carbon::now()->format('d F Y') }}</h3>
                    </div>

                    <div class="pendapatan">
                        <p>Pendapatan : </p>
                        <p>{{ $totalPendapatan }}</p>
                    </div>
                    <div class="beban">
                        <p>Beban : </p>
                        @foreach ($kategoris as $kategori)
                        <div class="beban-kategori">
                            <p>{{ $kategori->nama }} : </p>
                            <p> {{$kategori->bebans->sum('harga') }} </p>
                        </div>    
                        @endforeach
                        
                        <div class="total-beban">
                            <p>Total Beban</p>
                            <p>{{ $totalBeban }} </p>
                        </div>
                        <div class="total-beban">
                            @if ($labaRugi >= 0)
                            <p>Laba Bersih</p>
                            <p>{{ $labaRugi }} </p>
                            @else
                            <p>Rugi</p>
                            <p>{{ $labaRugi }} </p>
                            @endif
                        </div>
                    </div>
                   
                </div>
            </div>
        </body>

</html>