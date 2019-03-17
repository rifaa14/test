<?php 

require 'functions.php';
$peminjaman=query("SELECT * FROM peminjaman");


?>

 <!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<title>Peminjaman Buku</title>
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
      Daftar Peminjaman
    </a>

    <div class="navbar-dropdown">
     <a href="../sistem_perpustakaan/index.php" class="navbar-item">
         Dashboard
      </a>
      <a href="../sistem_perpustakaan/dataAnggota.php" class="navbar-item">
         Data Anggota
      </a>
      <a href="peminjaman.php" class="navbar-item">
         Peminjaman
      </a>
      <a href="../pengembalian/index.php" class="navbar-item">
         Pengembalian
      </a>
    </div>
  </div>
</nav>

<br><br>

<a href="peminjaman.php" class="button is-info is-focused" style="width: 200px; height: 50px; font-size: 20px;">Peminjaman</a>

<br><br><br><br>

<table class="table is-striped" cellpadding="15" cellspacing="1" width="1000px" style="margin-left: 200px;">

	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>NIM</th>
		<th>No.Buku</th>
		<th>Judul Buku</th>
		<th>Tanggal</th>

	</tr>

	 
	<?php $i=1; ?>
	<?php foreach ($peminjaman as $row) :?>

	<tr>

		<td><?= $i; ?></td>
		<td><?=$row["Nama"];?></td>
		<td><?=$row["NIM"];?></td>
		<td><?=$row["NoBuku"];?></td>
		<td><?=$row["Judul"];?></td>
		<td><?=$row["Tanggal"];?></td>

	</tr>
	<?php endforeach ;?>
	<?php $i++; ?>

</table>

</body>
</html>