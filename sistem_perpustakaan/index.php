<?php 

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style type="text/css">
		body{
			text-align: center;
      background-image: url('buku.jpg');
      margin: 20px;
		}
    .marquee {
      height: 25px;
      width: 500px;

      overflow: hidden;
      position: relative;
    }

    .marquee div {
      display: block;
      width: 200%;
      height: 30px;

      position: absolute;
      overflow: hidden;

      animation: marquee 5s linear infinite;
    }

    .marquee span {
      float: left;
      width: 50%;
    }

    @keyframes marquee {
      0% { left: 0; }
      100% { left: -100%; }
    }

	</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
</head>
<body>

<div style="text-align: right; margin-top: 5px;margin-bottom: 5px;">
	<button class="button is-danger" >
	<a href="logout.php" style="font-size: 20px; color: white;"  >Logout</a>
	</button>
</div>

<div style="text-align: left;
			color: white;
			background-color: darkblue;
			font-size: 50px;
			font-variant: small-caps;
			font-family: arial;">
	<h1>Dashboard</h1>
</div>

<div class="marquee">
  <div>
    <span>Aplikasi Perpustakaan Sederhana</span>
    <span>Aplikasi Perpustakaan Sederhana</span>
  </div>
</div>


<br><br><br><br>
<a href="dataAnggota.php" class="button is-link is-rounded"
  style="padding: 15px 30px;
         font-size: 20px;
         width: 250px;
         height: 70px;
         font-variant: bold">Data Anggota</a>


<br> <br> <br>

<a href="..\peminjaman\index.php" class="button is-link is-rounded"
  style="padding: 15px 30px;
         font-size: 20px;
         width: 250px;
         height: 70px;
         font-variant: bold">Peminjaman Buku</a>

<br> <br> <br>

<a href="..\pengembalian\index.php" class="button is-link is-rounded"
  style="padding: 15px 30px;
         font-size: 20px;
         width: 250px;
         height: 70px;
         font-variant: bold">Pengembalian Buku</a>


<br><br><br><br><br><br>
</body>
</html>