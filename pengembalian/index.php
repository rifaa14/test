<?php 

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: ../sistem_perpustakaan/login.php");
	exit;
}

require 'functions.php';
$pengembalian=query("SELECT * FROM peminjaman");

//tombol cari diklik

if(isset($_POST["cari"])){
	$pengembalian=cari($_POST["keyword"]);
}

//tombol mengembalikan diklik

if(isset($_POST["riwayat"])){
	$riwayat=riwayat($_POST["NIM"]);
}


?>



<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<title>Pengembalian</title>
	<style type="text/css">
		h1{
			text-align: left;
			color: white;
			background-color: darkblue;
			font-size: 40px;
			font-variant: small-caps;
			font-family: arial;
		}	
   		body{
      		background-image: url('w.png');
      		text-align: center;
    	}	
	</style>
</head>
<body>


<nav class="navbar" role="navigation" aria-label="dropdown navigation">
  <div class="navbar-item has-dropdown is-active">
    <a class="navbar-link" style="font-size: 40px;
			font-variant: small-caps;
			font-family: arial;">
      Pengembalian
    </a>

    <div class="navbar-dropdown">
     <a href="../sistem_perpustakaan/index.php" class="navbar-item">
         Dashboard
      </a>
      <a href="../sistem_perpustakaan/dataAnggota.php" class="navbar-item">
         Data Anggota
      </a>
      <a href="../peminjaman/index.php" class="navbar-item">
         Daftar Peminjaman
      </a>
      <a href="../peminjaman/peminjaman.php" class="navbar-item">
         Peminjaman
      </a>
    </div>
  </div>
</nav>

<br><br>
<br><br><br>

<form action="" method="post" style="text-align: center;">

		<input type="text" name="keyword" size="30" autofocus="" placeholder="masukkan keyword pencarian.." 
		autocomplete="off">
		<button type="submit" name="cari">Cari</button>
</form>

<br>

<table class="table is-striped" cellpadding="15" cellspacing="1" width="1000px" style="margin-left: 200px;">
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>NIM</th>
		<th>Judul Buku</th>
		<th>No.Buku</th>
		<th>Tanggal Peminjaman</th>
		<th>Denda</th>
		<th>Ket</th>
	</tr>

	 
	<?php $i=1; ?>
	<?php foreach ($pengembalian as $row) :?>

	<tr>

		<td><?= $i; ?></td>
		<td><?=$row["Nama"];?></td>
		<td><?=$row["NIM"];?></td>
		<td><?=$row["Judul"];?></td>
		<td><?=$row["NoBuku"];?></td>
		<td><?=$row["Tanggal"];?></td>
		<td>
		<?php
			$tanggal_pinjam_buku     	= new DateTime($row["Tanggal"]);
			$tanggal_buku_dikembalikan = new DateTime(); // tanggal sekarang berdasarkan tanggal di komputer
			$lama_buku_dipinjam        = $tanggal_buku_dikembalikan->diff($tanggal_pinjam_buku)->format("%a");

			if($lama_buku_dipinjam > 7){
				$denda=($lama_buku_dipinjam-7)*1000;
				echo "Rp$denda";
			}else{
				echo "-";
			}
		 ?>


		</td>
		<td>
			<a href="hapus.php?NoBuku=<?=$row["NoBuku"];?>"onclick="
				return confirm('Buku akan dikembalikan?');">Mengembalikan</a>
		</td>

	</tr>
	<?php $i++; ?>
	<?php endforeach;?>


</table>
</body>
</html>