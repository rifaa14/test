<?php

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}


require 'functions.php';
$data_anggota=query("SELECT * FROM data_anggota");

//tombol cari diklik

if(isset($_POST["cari"])){
	$data_anggota=cari($_POST["keyword"]);
}


?>

<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<title>Data Anggota</title>
	<style type="text/css">
		body{
			text-align: center;
			background-image: url('w.png');
		}
	</style>

</head>
<body>

<nav class="navbar" role="navigation" aria-label="dropdown navigation">
  <div class="navbar-item has-dropdown is-active">
    <a class="navbar-link" style="font-size: 40px;
			font-variant: small-caps;
			font-family: arial;">
      Data Anggota
    </a>

    <div class="navbar-dropdown">
     <a href="index.php" class="navbar-item">
         Dashboard
      </a>
      <a href="../peminjaman/index.php" class="navbar-item">
         Daftar Peminjaman
      </a>
      <a href="../peminjaman/peminjaman.php" class="navbar-item">
         Peminjaman
      </a>
      <a href="../pengembalian/index.php" class="navbar-item">
         Pengembalian
      </a>
    </div>
  </div>
</nav>



<a href="tambah.php" class="button is-info is-focused" style="width: 200px; height: 50px; font-size: 20px;">Tambah Data</a>
<br></br>

<form action="" method="post">

		<input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian.." 
		autocomplete="off">
		<button type="submit" name="cari">Cari</button>
</form>

<br><br><br>


<table class="table is-striped" cellpadding="15" cellspacing="1" width="1000px" style="margin-left: 200px;">

	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>JK</th>
		<th>NIM</th>

	</tr>

	 
	<?php $i=1; ?>
	<?php foreach ($data_anggota as $row) :?>

	<tr>

		<td><?= $i; ?></td>
		<td>
			<a href="lihat.php?NIM=<?=$row["NIM"];?>"><?=$row["Nama"];?></a>
		</td>
		<td><?=$row["JK"];?></td>
		<td><?=$row["NIM"];?></td>

	</tr>
	<?php $i++; ?>
	<?php endforeach;?>
</table>

</body>
</html>