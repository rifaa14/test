<?php 

require 'functions.php';

$buku = query("SELECT * FROM buku");

//tombol cari diklik

if(isset($_POST["cari"])){
	$buku=cari($_POST["keyword"]);
}



 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<title>Daftar Buku</title>
	<style type="text/css">
		body{
			text-align: center;
			background-image: url('w.png');
		}
		h1{
			text-align: left;
			color: white;
			background-color: darkblue;
			font-size: 40px;
			font-variant: small-caps;
			font-family: arial;"
		}
	</style>
</head>
<body>

	<h1>Daftar Buku</h1>

	<br><br>

<form action="" method="post">
		<input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian.." 
		autocomplete="off">
		<button type="submit" name="cari">Cari</button>
</form>

<br><br>
<table class="table is-striped" cellpadding="15" cellspacing="1" width="1000px" style="margin-left: 200px;">

	<tr>
		<th> </th>
		<th>No.Buku</th>
		<th>Judul</th>
		<th>Penerbit</th>
		<th>Gambar</th>


	</tr>

	 
	<?php foreach ($buku as $row) :?>

	<tr>
		<td>
			<a href="peminjaman.php">Pilih</a> 
		</td>
		<td><?=$row["NoBuku"];?></td>
		<td><?=$row["Judul"];?></td>
		<td><?=$row["Penerbit"];?></td>
		<td><img src="buku/<?=$row["Gambar"];?>" width="150"></td>
		

	</tr>
	<?php endforeach;?>

</body>
</html>