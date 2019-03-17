<?php
//koneksi ke database
$conn= mysqli_connect("localhost","root","","Sistem Perpustakaan");

function query($query){
	global $conn;
	$result=mysqli_query($conn,$query);
	$rows=[];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows; 
}

 function hapus($NoBuku){
	global $conn;
	mysqli_query($conn, "DELETE FROM peminjaman WHERE NoBuku=$NoBuku");


	return mysqli_affected_rows($conn);
}

function cari($keyword){

	$query= "SELECT * FROM peminjaman WHERE
			Nama LIKE '%$keyword%' OR
			NIM LIKE '%$keyword%' OR
			Judul LIKE '%$keyword%' OR
			NoBuku LIKE '%$keyword%' 
			";

	return query($query);
}

function riwayat($NIM){

	$NIM= $_GET["NIM"];

	$query = "INSERT INTO riwayatpeminjaman (Nama,NIM,NoBuku,Judul,Tanggal) SELECT Nama,NIM,NoBuku,Judul,Tanggal FROM peminjaman WHERE NIM= '$NIM' " ;
	
	$result = mysql_query($sql) or die (mysql_error());

	header("location: index.php?tidakdisetujui");

}
?>