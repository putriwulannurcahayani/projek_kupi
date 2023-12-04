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

           html,*,body{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
           }
        
        body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f4f4;
        color: black;
        /* margin: 20px; */
        text-align: center;
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
        border-radius: 40%;
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

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .option1 {
        border-left: 5px solid #1093B5; 
        color: black;
        cursor: pointer;
        }

        .option2 {
        border-left: 5px solid #1093B5;
        color: black;
        cursor: pointer;
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

        a{
            text-decoration: none;
            color: black;
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
                        <div class="option3 nav-option">
                            <h3> Dashboard</h3>
                        </div>
                    </a>

                    <div class="nav-option option2">
						
						<h3> Pendapatan </h3>
					</div>	
					
					<div class="nav-option option3">
						<h3> Beban </h3>
					</div>

					<a href="/produks">
					    <div class="option3 nav-option">
						    <h3> Produk</h3>
					    </div>
                    </a>

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
                    
                    <a herf="{{route('logout')}}" method="POST">
                        <div class="nav-option logout">
                                @csrf
                            <button type="submit">Logout</button>
                        </div>
                    </a>    

				</div>
			</nav>
		</div>
        <div class="main">
            <div class="tanggal">
                <p id="tanggal"></p>
            </div>
            <div class="profile-wrap">
                <div class="profile">
                    <form action="{{route('editProfile')}}" method="POST">
                        @method('put')
                        @csrf
                        <input type="text" value="{{ $nama }}" placeholder="Nama" name="nama">
                        <input type="text" value="{{ $namaUsaha }}" placeholder="Nama Usaha" name="nama_usaha">
                        <input type="text" value="{{ $email }}" placeholder="Email" name="email">
                        <button type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>

	<script src="script.js"></script>
</body>
</html>
    