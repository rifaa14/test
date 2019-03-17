<?php

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

require 'functions.php';
//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {


	//cek apakah data berhasil ditambahkan atau tidak
	if (tambah($_POST)>0){
		echo "
			<script>
				alert('data berhasil ditambahkan');
				document.location.href='dataAnggota.php';
			</script>
		";
	}else{
		echo "			
			<script>
				alert('data gagal ditambahkan');
				document.location.href='dataAnggota.php';
			</script>
		";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Tambah data anggota</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<style type="text/css">
		body{
			background-image: url('w.png');
		}
	</style>
</head>
<body>
	<div style="text-align: left;
			color: white;
			background-color: darkblue;
			font-size: 40px;
			font-variant: small-caps;
			font-family: arial;">
	<h1>Tambah Data Anggota</h1>
	</div>
	<a href="dataAnggota.php" class="button is-link is-outlined">Back</a>
<br>


	<form action="" method="post" enctype="multipart/form-data" style="margin-left: 100px;">
	<table>
	<div class="field" style="width: 1000px;">
  		<label class="label">Nama</label>
  		<div class="control">
    	<input class="input" type="text" name="Nama" id="Nama" 
				required>
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Nama Panggilan</label>
  		<div class="control">
    	<input class="input" type="text" name="Panggilan" id="Panggilan" 
				required>
 		 </div>
	</div>

	<div class="field">
  		<div class="control">
    	<label class="radio" for="perempuan">
      	<input type="radio" name="JK" value="P">
      	Perempuan
    	</label >
    	<label class="radio" for="lakilaki">
      	<input type="radio" id="lakilaki" name="JK" value="L">
      	Laki-laki
    	</label>
  		</div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">NIM</label>
  		<div class="control">
    	<input class="input" type="text" name="NIM" id="NIM" 
				required>
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Jurusan</label>
  		<div class="control">
    	<input class="input" type="text" name="Jurusan" id="Jurusan" 
				required>
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Fakultas</label>
  		<div class="control">
    	<input class="input" type="text" name="Fakultas" id="Fakultas" 
				required>
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Tempat Lahir</label>
  		<div class="control">
    	<input class="input" type="text" name="Tempat" id="Tempat" 
				required>
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Tanggal Lahir</label>
  		<div class="control">
    	<input class="input" type="date" name="TTL" id="TTL" 
				required>
 		 </div>
	</div>
	
	<div class="field" style="width: 1000px;">
  		<label class="label">Alamat</label>
  		<div class="control">
    	<input class="input" type="text" name="Alamat" id="Alamat" 
				required>
 		 </div>
	</div>

				<label for="Gambar">Gambar : </label>
				<input type="file" name="Gambar" id="Gambar">

				
		<br><br>

	<div class="field is-grouped">
  		<div class="control">
    		<button class="button is-link" type="submit" name="submit">Tambah Data</button>
  		</div>
  	</div>

<br><br>

	</form>



</body>
</html>