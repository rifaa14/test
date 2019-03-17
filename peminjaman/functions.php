<?php
//koneksi ke database
$conn= mysqli_connect("localhost","root","","sistem perpustakaan");

function query($query){
	global $conn;
	$result=mysqli_query($conn,$query);
	$rows=[];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;  
}

function peminjaman($data){
	global $conn;

	$Nama=htmlspecialchars($data["Nama"]);
	$NIM=htmlspecialchars($data["NIM"]);
	$NoBuku=htmlspecialchars($data["NoBuku"]);
	$Judul=htmlspecialchars($data["Judul"]);
	$Tanggal=($data["Tanggal"]);

	$result = mysqli_query($conn, "SELECT NoBuku FROM buku WHERE NoBuku = '$NoBuku'");

	if(mysqli_fetch_assoc($result)){
		echo 	"<script>
					alert('Buku Sedang Dipinjam');
				</script>";
		return false;		
	}

	$query="INSERT INTO peminjaman
			VALUES 
			('$Nama','$NIM','$NoBuku','$Judul','$Tanggal')

			";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query="SELECT * FROM buku
			WHERE
			NoBuku LIKE '%$keyword%' OR 
			Judul LIKE '%$keyword%' OR
			Penerbit LIKE '%$keyword%' 

			";


	return query($query);
}

?>