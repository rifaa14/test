<?php 

session_start();

if ( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

require 'functions.php';

$NIM=$_GET["NIM"];

if(hapus($NIM)>0){
	echo"
		<script>
			alert('data berhasil dihapus');
			document.location.href='dataAnggota.php';		
		</script>
	";
}else{
	echo"
		<script>
			alert('data tidak berhasil dihapus');
			document.location.href='dataAnggota.php';
		</script>
	";
}


?>