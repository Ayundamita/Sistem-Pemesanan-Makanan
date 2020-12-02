<!DOCTYPE html>
<html>
<head>
	<title>Daftar Pembeli</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style="
	font-size: 15px; 
	padding: 0px;
	margin: 0px;
	font-family: "comic sans"; 
	">

	<div class="container-umum" style="
	width: 100%;
	margin-top: 50px;
	">
		<div class="cont-login" style="
			width: 100%;
			display: flex;
			align-items: center;
			justify-content: center;
		">
		
			<form action="pembeli.php" method="post" style="
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			">
			<h2 style="
				font-size: 20px;
				letter-spacing: 1px;
				font-weight: bold;
				text-align: center;
			">Pendaftaran Pembeli</h2>
			<ul style="
				list-style: none;
				font-family: serif;
				font-weight: bold;
			">
				<li style="">
					<label for="fnama" style="font-family: "comic sans"; ">Nama Lengkap</label></br>
					<input type="text" name="nama" placeholder="Username" style="
						outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						background-color: #f9f9f9;
						padding: 10px 15px 10px 15px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 93%;
					">
				</li>
			</ul>
			<button type="submit" name="submit" class="btn btn-primary" style="
				outline: none;
						border: none;
						border-radius: 10px;
						font-size: 17px;
						padding:5px 10px 5px 10px;
						margin-top: 5px;
						margin-bottom: 10px;
						width: 30vh;
						margin-left: 15vh;
						margin-right: 15vh;
						cursor: pointer;

			">Registrasi</button>
			</form>
			
		</div>
	</div>
	<?php
		if (ISSET($_POST['submit'])) {
			$nama = $_POST['nama'];

			include 'config.php';
			$result = mysqli_query($connect, "INSERT INTO pembeli VALUES('','$nama')");
			
			if ($result){
			?>
			<script>
				alert("Berhasil!");
				window.location.href= 'index.php';
			</script>
			<?php
			}
		}
		// echo $nama;
		// echo $notelp;
		// echo $mail;
		// echo $pass;
		// echo $jenisK;
	?>

</body>
</html>