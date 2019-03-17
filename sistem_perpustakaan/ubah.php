<?php

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

require 'functions.php';

//ambil data di URL
$NIM= $_GET["NIM"];
//query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM data_anggota WHERE NIM='$NIM'")[0];

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {

	//cek apakah data berhasil diubah atau tidak
	if (ubah($_POST)>0){
		echo "
			<script>
				alert('data berhasil diubah');
				document.location.href='dataAnggota.php';
			</script>
		";
	}else{
		echo "			
			<script>
				alert('data gagal diubah');,
				document.location.href='dataAnggota.php';
			</script>
		";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Ubah data anggota</title>
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
	<h1>Ubah Data Anggota</h1>
	</div>
<br>


	<form action="" method="post" enctype="multipart/form-data" style="margin-left: 100px;">
		<input type="hidden" name="gambarLama" value="<?=$mhs["Gambar"];?>">

	<div class="field" style="width: 1000px;">
  		<label class="label">Nama</label>
  		<div class="control">
    	<input class="input" type="text" name="Nama" id="Nama" 
				required
				value="<?= $mhs["Nama"];?>">
 		</div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Panggilan</label>
  		<div class="control">
    	<input class="input" type="text" name="Panggilan" id="Panggilan" 
				required
				value="<?= $mhs["Panggilan"];?>">
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
				required
				value="<?= $mhs["NIM"];?>">
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Jurusan</label>
  		<div class="control">
    	<input class="input" type="text" name="Jurusan" id="Jurusan" 
				required
				value="<?= $mhs["Jurusan"];?>">
 		 </div>

	</div>
	<div class="field" style="width: 1000px;">
  		<label class="label">Fakultas</label>
  		<div class="control">
    	<input class="input" type="text" name="Fakultas" id="Fakultas" 
				required
				value="<?= $mhs["Fakultas"];?>">
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Tempat Lahir</label>
  		<div class="control">
    	<input class="input" type="text" name="Tempat" id="Tempat" 
				required
				value="<?= $mhs["Tempat"];?>">
 		</div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Tanggal Lahir</label>
  		<div class="control">
    	<input class="input" type="date" name="TTL" id="TTL" 
				required
				value="<?= $mhs["TTL"];?>">
 		</div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">Alamat</label>
  		<div class="control">
    	<input class="input" type="text" name="Alamat" id="Alamat" 
				required
				value="<?= $mhs["Alamat"];?>">
 		 </div>
	</div>

				<label for="Gambar">Gambar : </label>
				<input type="file" name="Gambar" id="Gambar">

				
		<br><br>

	<div class="field is-grouped">
  		<div class="control">
    		<button class="button is-link" type="submit" name="submit">Ubah Data</button>
  		</div>
  	</div>

<br><br>

	</form>



</body>
</html>