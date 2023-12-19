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
    
	<link rel="stylesheet"
		href="dashboard.css">
	<link rel="stylesheet"
		href="responsive.css">
<style>
    


.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
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

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

h3{
    font-size: 1.5rem;
}
</style>
</head>
<body>

	<!-- for header part -->
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

          <a href="/labarugi">
					<div class="nav-option option5">
						<h3> Laba Rugi</h3>
					</div>
          </a>

					<div class="nav-option option6">
						
						<h3> Arus Kas</h3>
					</div>

          <a href="/riwayat">
					<div class="nav-option option7">
						<h3> Riwayat</h3>
					</div>
          </a>

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
<body>
<div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/profile.png" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{ $nama }}</h4>
                      <p class="text-secondary mb-1">{{ $role }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama Usaha</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $namaUsaha }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $email }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $noTelepon }}
                </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Alamat</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    {{ $alamat }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info" href="{{ route('profileedit') }}">Edit</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</body>
</html>
    