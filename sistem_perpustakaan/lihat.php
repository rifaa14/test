<?php 

require 'functions.php';

$NIM= $_GET["NIM"];

$data = query("SELECT * FROM data_anggota WHERE NIM='$NIM'");

 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
	<title>Data Anggota</title>
	<style type="text/css">
 	table,tr,td{
	    background-color: lightblue;
	    font-family: Verdana;
	    color: black;
	    border: 1px ;
	    padding: 5px;
	    border-collapse: collapse;
 	}
 	.h{
	    border: 8px groove skyblue;
	    padding: 20px;
 	}
 	.posisi{
	    position: absolute;
	    margin-left: auto;
	    margin-right: auto;
	    margin-bottom: auto;
	    margin-top: auto;
	    left: 0;
	    right: 0;
	    top: 130px;
	    bottom: 0;
 	}
 	body{
	    background-image: url('w.png');
	    background-repeat: no-repeat;
	    background-size: 1400px auto;
 	}

	</style>
</head>
<body>
	<h1 style="text-align: left;
			color: white;
			background-color: darkblue;
			font-size: 40px;
			font-variant: small-caps;
			font-family: arial;">Data Anggota Perpustakaan</h1>

<a href="dataAnggota.php" class="button is-link is-outlined">Back</a>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

	 <form action="#" style="width: 1000px"class="posisi";>
	 <fieldset class="h"/>
	 <table style="width: 980px;">

	 <?php foreach ($data as $row) :?>
	 <tr>
		 <td rowspan="15" width="250px">
		 <img src="img/<?=$row["Gambar"];?>" width="250px"/>
		 </td>
	 </tr>
	 <tr>
		 <td><b>Nama Lengkap</b></td>
		 <td>:</td>
		 <td><?=$row["Nama"];?></td>
	 </tr>
	 <tr>
		 <td><b>Nama Panggilan</b></td>
		 <td>:</td>
		 <td><?=$row["Panggilan"];?></td>
	 </tr>
	 <tr>
		 <td><b>Jenis Kelamin</b></td>
		 <td>:</td>
		 <td><?=$row["JK"];?></td>
	 </tr>
	 <tr>
		 <td><b>NIM</b></td>
		 <td>:</td>
		 <td><?=$row["NIM"];?></td>
	 </tr>
	 <tr>
		 <td><b>Jurusan</b></td>
		 <td>:</td>
		 <td><?=$row["Jurusan"];?></td>
	 </tr>
	 <tr>
		 <td><b>Fakultas</b></td>
		 <td>:</td>
		 <td><?=$row["Fakultas"];?></td>
	 </tr>
	 <tr>
		 <td><b>Tempat Lahir</b></td>
		 <td>:</td>
		 <td><?=$row["Tempat"];?></td>
	 </tr>
	 <tr>
		 <td><b>Tanggal Lahir</b></td>
		 <td>:</td>
		 <td><?=$row["TTL"];?></td>
	 </tr>
	 <tr>
		 <td><b>Alamat</b></td>
		 <td>:</td>
		 <td><?=$row["Alamat"];?></td>
	 </tr>
	 <tr>
		 <td style="text-align: right;">
			<a class="button is-link" href="ubah.php?NIM=<?= $row["NIM"];?>">ubah</a> 
			<a class="button is-danger" href="hapus.php?NIM=<?= $row["NIM"];?>" onclick="
				return confirm('Anda akan menghapus data ini?');">hapus</a>
		 </td>
  	 </tr>
	 <?php endforeach;?>
	 </table>
	 </fieldset>
</body>
</html>



