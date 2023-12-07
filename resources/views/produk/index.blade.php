{{-- <!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0">
	<title>Aplikasi KUPI</title>
	<link rel="stylesheet"
		href="dashboard.css">
	<link rel="stylesheet"
		href="produkindex.css">
</head>

<body>
    <!-- Header Part -->
    <header>

		<div class="logosec">
			<div class="logo">Keuangan Pintar</div>
			<img src= "images/imageslogokupi.png"
				class="icn menuicn"
				id="menuicn"
				alt="menu-icon">
                
		</div>

		<div class="message">
            <a href="{{route('profile')}}">
                <div class="circle"></div>
                <img src="images/profile.png"
                    class="icn"
                    alt="">
            </a>		
                <div class="dp">
                <img src="images/notifikasi.png"
                        class="dpicn"
                        alt="dp">
                </div>
            </div>
		</div>

	</header>

    <!-- Main Content -->
    <div class="main-container">
		<div class="navcontainer">
			<nav class="nav">
				<div class="nav-upper-options">
                    <a href="/dashboard">
                        <div class="nav-option option1">
                            <h3> Dashboard</h3>
                        </div>
                    </a>

					<div class="option2 nav-option">
						
						<h3> Produk</h3>
					</div>

					<div class="nav-option option3">
						
						<h3> Laba Rugi</h3>
					</div>

					<div class="nav-option option4">
						
						<h3> Arus Kas</h3>
					</div>

                    <div class="nav-option option5">
						
						<h3> Riwayat</h3>
					</div>
                    
					<div class="nav-option logout">
						
						<h3>Logout</h3>
					</div>

				</div>
			</nav>
		</div>

        <div class="container">

            <h1>Daftar Produk</h1>
            <div class="action-container">
                <a href="{{ route('produks.create') }}">Tambah + </a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produks as $produk)
                    <tr>
                        <td>{{ $produk->kode_produk }}</td>
                        <td>{{ $produk->nama_produk }}</td>
                        <td>{{ $produk->harga }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('produks.edit', $produk->id) }}" class="edit-button">Edit</a>
                            <form action="{{ route('produks.destroy', $produk->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button">Hapus</button>
                            </form>
                        </td>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <script src="script.js"></script>
</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width, 
				initial-scale=1.0">
	<title>Aplikasi KUPI</title>
	{{-- <link rel="stylesheet"
		href="dashboard.css"> --}}
	<link rel="stylesheet"
		href="responsive.css">
    <link rel="stylesheet" href="produkindex.css">
	
		<script>
			function redirectToProduk() {
				window.location.href = "{{ route('produks.index') }}";
			}
		</script>
</head>

<body>

	<!-- for header part -->
	<header>
		<div class="logosec">
            <div class="logo">Keuangan Pintar</div>
            <i class="fas fa-bars icn menuicn" id="menuicn" ></i>
            <img src="images/imageslogokupi.png" class="img" alt="" >
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
						<div class="nav-option option1">
							
							<h3> Dashboard</h3>
						</div>
					
					</a>

					<div class="nav-option option4" onclick="redirectToProduk()">
						<h3> Produk</h3>
					</div>

					<div class="nav-option option2">
						
						<h3> Pendapatan </h3>
					</div>	
					
					
					@if (auth()->user()->role->nama_role == 'admin')
					<div class="nav-option option3">
						<h3> Beban </h3>
					</div>

					<div class="nav-option option5">
						
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
					
					<div class="nav-option logout">
						<form action="{{route('logout')}}" method="POST">
							@csrf
						<button type="submit">Logout</button>
					</form>  
					</div>

				</div>
			</nav>
		</div>
		<div class="main">
			<div class="tanggal">
				<p id="tanggal"></p>
			</div>
			<div class="box-container">
                <div class="container">

                    <h1>Daftar Produk</h1>
					<div style="margin-top: 50px">
						<a href="{{ route('produks.create') }}" class="tambah-button" style="margin-top: 10px">Tambah + </a>
						<a href="{{ route('produks.laporan') }}" class="tambah-button" style="margin-top: 10px">Lihat Laporan </a>
					</div>
                    <div class="action-container">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produks as $produk)
                            <tr>
                                <td>{{ $produk->kode_produk }}</td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>{{ $produk->harga }}</td>
                                <td>{{ $produk->stok }}</td>
                                <td class="action-buttons">
                                    <a href="{{ route('produks.edit', $produk->id) }}" class="edit-button">Edit</a>
                                    <form action="{{ route('produks.destroy', $produk->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Hapus</button>
                                    </form>
                                </td>                        
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
            </div>
			
			</div>
		</div>

	<script src="script.js"></script>
</body>
</html>