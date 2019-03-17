<?php 
 
require 'functions.php';
//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"])) {


	//cek apakah data berhasil ditambahkan atau tidak
	if (peminjaman($_POST)>0){
		echo "
			<script>
				alert('peminjaman berhasil');
				document.location.href='index.php';
			</script>
		";
	}else{
		echo "			
			<script>
				alert('peminjaman gagal');
				document.location.href='index.php';
			</script>
		";
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Peminjaman</title>
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
	<h1>Peminjaman Buku</h1>
	</div>

	<a href="index.php" class="button is-link is-outlined">Back</a>
<br>

	<form action="" method="post" style="margin-left: 100px;">

	<div class="field" style="width: 800px;">
  		<label class="label">NIM</label>
  		<div class="control">
    	<input class="input" type="text" name="NIM" id="NIM" 
				required>
 		 </div>
	</div>
	<br>

	<a href="buku.php" class="button is-info is-focused" style="width: 150px; height: 40px; margin-left: 20px">Pilih Buku</a>

	<br><br>

	<div class="field" style="width: 800px;">
  		<label class="label">Tanggal</label>
  		<div class="control">
    	<input class="input" type="date" name="Tanggal" id="Tanggal" 
				required>
 		 </div>
	</div>

	

	<div class="field is-grouped" style="margin-left: 800px;">
  		<div class="control">
    		<button class="button is-link" type="submit" name="submit">Lanjut</button>
  		</div>
  	</div>
  	<br>


	</form>


</body>
</html>