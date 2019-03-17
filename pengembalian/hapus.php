<?php 

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

require 'functions.php';

$NoBuku=$_GET["NoBuku"];

if(hapus($NoBuku)>0){
	echo"
		<script>
			alert('Buku berhasil dikembalikan');
			document.location.href='index.php';		
		</script>
	";
}else{
	echo"
		<script>
			alert('Buku tidak berhasil dikembalikan');
			document.location.href='index.php';
		</script>
	";
}


?>