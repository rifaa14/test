<?php 

session_start();

if (isset($_SESSION["login"]) ){
	header("Location:index.php");
	exit;
}

require 'functions.php';
if(isset($_POST["login"])){

	$username = $_POST["username"];
	$password = $_POST["password"];


	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	//cek username
	if(mysqli_num_rows($result)==1){

		//cek password
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])){
			//set session
			$_SESSION["login"] = true;

			header("Location: index.php");
			exit;
		}

	}

	$error = true;

}


?>

 <!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<style>
		body{
			text-align: center;
			background-color: skyblue;

		}

	</style>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
</head>
<body >
<br><br>
<h1 style="font-size: 50px; font-family: arial; font-variant: small-caps;">Sistem Perpustakaan</h1>

<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic";>username/password salah</p>
<?php endif;?>
<br><br>
<form action="", method="post" >
	<img src="logo.png" style="width: 200px" class="img-circle">

	<br><br><br>
	<ul style="font-size: 25px">

			<label for="username">Username</label>
			<input class="input is-primary" type="text" name="username" id="username" style="width: 250px;">
			<br><br>
			<label for="password">Password</label>
			<input class="input is-primary" type="password" name="password" id="password" style="width: 250px;">
			<br><br>
			<button class="button is-link is-rounded" type="submit" name="login">Login</button>
		
	</ul>	

	<br><br>
</form>


</body>
</html>