<?php 

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}


require 'functions.php';

  if ( isset($_POST["submit"]) ) {
    if ( datapeminjam ($_POST) > 0) {
      echo "
        <script>
        	alert('Anda dapat meminjam buku');
        	document.location.href = 'peminjaman.php';
        </script>
      ";
    }
    else {
      echo "
      <script>
       		alert('Anda belum terdaftar, silahkan mendaftar terlebih dahulu');
        	document.location.href = '../sistem_perpustakaan/tambah.php';
        </script>
      ";
    }
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Peminjam</title>
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
	<h1>Data Peminjam</h1>
	</div>
<br><br><br><br><br>


	<form action="" method="post" style="margin-left: 100px;">

	<div class="field" style="width: 1000px;">
  		<label class="label">Nama</label>
  		<div class="control">
    	<input class="input" type="text" name="Nama" id="Nama" 
				required>
 		 </div>
	</div>

	<div class="field" style="width: 1000px;">
  		<label class="label">NIM</label>
  		<div class="control">
    	<input class="input" type="text" name="NIM" id="NIM" 
				required>
 		 </div>
	</div>

<br>
	<div class="field is-grouped">
  		<div class="control">
    		<button class="button is-link" type="submit" name="submit">Lanjut</button>
  		</div>
  	</div>

<br><br><br><br><br><br><br><br><br><br>
	</form>

</body>
</html>