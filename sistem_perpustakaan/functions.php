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


function tambah($data){
	global $conn;

	$Nama=htmlspecialchars($data["Nama"]);
	$Panggilan= htmlspecialchars($data["Panggilan"]);
	$JK=htmlspecialchars($data["JK"]);
	$NIM=htmlspecialchars($data["NIM"]);
	$Jurusan=htmlspecialchars($data["Jurusan"]);
	$Fakultas=htmlspecialchars($data["Fakultas"]);
	$Tempat= htmlspecialchars($data["Tempat"]);
	$TTL= ($data["TTL"]);
	$Alamat=htmlspecialchars($data["Alamat"]);

	//upload gambar
	$Gambar= upload();
	if (!$Gambar) {
		return false;
	}

	$result = mysqli_query($conn, "SELECT NIM FROM data_anggota WHERE NIM = '$NIM'");

	if(mysqli_fetch_assoc($result)){
		echo 	"<script>
					alert('Data sudah ada');
				</script>";
		return false;		
	}

	$query="INSERT INTO data_anggota
			VALUES 
			('$Nama', '$Panggilan' ,'$JK','$NIM','$Jurusan','$Fakultas','$Tempat','$TTL','$Alamat','$Gambar')

			";
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}



function upload(){

	//ambil data file
	$namaFile=$_FILES['Gambar']['name'];
	$ukuranFile=$_FILES['Gambar']['size'];
	$error= $_FILES['Gambar']['error'];//ada gambar yang diupload atau tidak
	$tmpName= $_FILES['Gambar']['tmp_name'];//tempat penyimpanan sementara

	//cek apakah ada gambar yang diupload
	if( $error==4 ){
		echo 	"<script>
					alert('Pilih gambar terlebih dahulu')
				</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid= ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower (end($ekstensiGambar));

	//mencari apakah ada ekstensi gambar yang dimasukkan(yang dimasukkan berupa gambar atau tidak)
	 if( !in_array( $ekstensiGambar, $ekstensiGambarValid)){
		echo 	"<script>
					alert('Pilih gambar!')
				</script>";
		return false;
	 }

	 //cek jika ukurannya terlalu besar

	 if( $ukuranFile > 1000000){
		echo 	"<script>
					alert('Ukuran gambar teralu besar')
				</script>";
		return false;	 	
	 }

	 //lolos pengecekan, gambar siap diupload
	 //generate nama gambar baru
	 $namaFileBaru = uniqid();//string angka random untuk nama baru
	 $namaFileBaru .= '.';
	 $namaFileBaru .= $ekstensiGambar; 

	 move_uploaded_file($tmpName, 'img/'. $namaFileBaru);

	 return $namaFileBaru;

}



function hapus($NIM){
	global $conn;
	mysqli_query($conn, "DELETE FROM data_anggota WHERE NIM='$NIM'");


	return mysqli_affected_rows($conn);
}


function ubah($data){
	global $conn;

	$Nama=htmlspecialchars($data["Nama"]);
	$Panggilan= htmlspecialchars($data["Panggilan"]);
	$JK=htmlspecialchars($data["JK"]);
	$NIM=htmlspecialchars($data["NIM"]);
	$Jurusan=htmlspecialchars($data["Jurusan"]);
	$Fakultas=htmlspecialchars($data["Fakultas"]);
	$Tempat= htmlspecialchars($data["Tempat"]);
	$TTL= ($data["TTL"]);
	$Alamat=htmlspecialchars($data["Alamat"]);
	$gambarLama=htmlspecialchars($data["gambarLama"]);

	//cek apakah user pilih gambar baru atau tidak
	if($_FILES['Gambar']['error'] === 4 ){
		$Gambar = $gambarLama;
	}else{
			$Gambar = upload();
	}


	$query="UPDATE data_anggota SET 
			Nama='$Nama',
			Panggilan='$Panggilan',
			JK='$JK',
			NIM='$NIM',
			Jurusan='$Jurusan',
			Fakultas='$Fakultas',
			Tempat='$Tempat',
			TTL='$TTL',
			Alamat='$Alamat',
			Gambar='$Gambar'
			WHERE NIM=$NIM
			";
			
	mysqli_query($conn,$query);

	return mysqli_affected_rows($conn);
}


function cari($keyword){
	$query="SELECT * FROM data_anggota
			WHERE
			Nama LIKE '%$keyword%' OR 
			JK LIKE '%$keyword%' OR
			NIM LIKE '%$keyword%' OR
			Jurusan LIKE '%$keyword%' OR
			Fakultas LIKE '%$keyword%' OR
			Alamat LIKE '%$keyword%' 

			";


	return query($query);
}

function registrasi($data){
	global $conn;

	$username = strtolower (stripslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string ($conn, $data["password2"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if(mysqli_fetch_assoc($result)){
		echo 	"<script>
					alert('username sudah ada');
				</script>";
		return false;		
	}


	//cek konfirmasi password
	if( $password !== $password2 ){
		echo 	"<script>
					alert('konfirmasi password tidak sesuai');
				</script>";
		return false;
	}

	//enkripsi password
	$password = password_hash ($password, PASSWORD_DEFAULT);

	//tambahkan userbaru ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

	return mysqli_affected_rows($conn);



}



?>