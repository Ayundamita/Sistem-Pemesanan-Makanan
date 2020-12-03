<?php
ob_start();

	if (ISSET($_POST['submit'])){
		 include 'config.php';
		 $username = $_POST['username'];
		 $makanan = $_POST['makanan'];
		 $totalpesanan = $_POST['totalpesanan'];		 
		 
	switch ($makanan) {
		case 'ayamIngkung':
				$query = "SELECT * FROM menu WHERE nama = 'Ayam Ingkung'";
				$sql = mysqli_query($connect, $query);
				$datamenu = mysqli_fetch_array($sql);

				$idmenu = $datamenu['id_menu'];
				$hargamenu = $datamenu['harga'];
			break;
		case 'ayamOpor':
				$query = "SELECT * FROM menu WHERE nama = 'Ayam Opor'";
				$sql = mysqli_query($connect, $query);
				$datamenu = mysqli_fetch_array($sql);

				$idmenu = $datamenu['id_menu'];
				$hargamenu = $datamenu['harga'];
			break;
		case 'ayamBakar':
				$query = "SELECT * FROM menu WHERE nama = 'Ayam Bakar'";
				$sql = mysqli_query($connect, $query);
				$datamenu = mysqli_fetch_array($sql);

				$idmenu = $datamenu['id_menu'];
				$hargamenu = $datamenu['harga'];
			break;
		case 'ayamBetutu':
				$query = "SELECT * FROM menu WHERE nama = 'Ayam Betutu'";
				$sql = mysqli_query($connect, $query);
				$datamenu = mysqli_fetch_array($sql);

				$idmenu = $datamenu['id_menu'];
				$hargamenu = $datamenu['harga'];
			break;
		case 'nasiTumpeng':
				$query = "SELECT * FROM menu WHERE nama = 'Nasi Tumpeng'";
				$sql = mysqli_query($connect, $query);
				$datamenu = mysqli_fetch_array($sql);

				$idmenu = $datamenu['id_menu'];
				$hargamenu = $datamenu['harga'];
			break;
		case 'nasiKebuli':
				$query = "SELECT * FROM menu WHERE nama = 'Nasi Kebuli'";
				$sql = mysqli_query($connect, $query);
				$datamenu = mysqli_fetch_array($sql);

				$idmenu = $datamenu['id_menu'];
				$hargamenu = $datamenu['harga'];
			break;

		default:

			break;
	};

	$query2 = "SELECT * FROM pembeli WHERE nama_pembeli = '$username'";
	$sql2 = mysqli_query($connect, $query2);
	$datapembeli = mysqli_fetch_array($sql2);

	if(!$datapembeli){
		?>
			<script type="text/javascript">
				alert("Username tidak ditemukan!");
			</script>
		<?php
	}

	if($datapembeli){
		$idpembeli = $datapembeli['id_pembeli'];
		$timestamp = date('Y-m-d');

	$sql1 = "INSERT INTO pesanan VALUES('','$idpembeli','$idmenu','$totalpesanan', '$timestamp', 'T')";
	$result1 = mysqli_query($connect, $sql1);

	if($result1){
		?>
			<script type="text/javascript">
				alert("Berhasil!");
			</script>
		<?php
	}
	}
 	}
 ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kedai Ma'e</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body style=" 
	font-family: "comic sans"; 
	">
<main>
	<center><div class="container-PB" id="PB" style="
		display: flex;
		width: 40%;
		position: relative;
		border-radius: 15px;
		top: 7vh;
	">
		<section class="cont-form">
			<form id="res" action="index.php" method="post" style="
				background-color: rgba(85, 239, 196,1.0);
				width: 100vh;
				padding: 30px;
				margin-bottom: 20px;
				margin-top: 20px;
				border-radius: 10px;
				top: 5vh;
			">
				<h2 id="pb1" style="font-size: 25px; font-weight: bold; text-align: center;">Pemesanan Makanan</h2>
				 <table width='100%' border="0">
		            <tr> 
		                <td>Username</td>
		                <td><input type="text" style="width: 85%" name="username" placeholder="Nama Lengkap"></td>
		                <td rowspan="3">				 
		         <!-- Submit Button -->
				 <input type="submit" name="submit" value="Pesan" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					">
				 <input type="reset" name="reset" value="Reset" style="
					width: 49%;
					margin-top: 15px;
					border-radius: 10px;
					">
				 <a href="pembeli.php"><button type="button" name="daftar" style="
					width: 100%;
					margin-top: 15px;
					border-radius: 10px;
					">Daftar Pembeli</button></a>
				 <a href="auth.php"><button type="button" name="daftar" style="
						width: 100%;
						margin-top: 15px;
						border-radius: 10px;
						">Halaman Admin</button></a></td>
		            </tr>
		            <tr> 
		                <td>Menu</td>
		                <td><select class="select" name="makanan" style="width: 85%">
				 			<optgroup label="Pilih Makanan ">
				 				<option value="ayamIngkung">Ayam Ingkung Utuh</option>
				 				<option value="ayamOpor">Ayam Opor Utuh</option>
				 				<option value="ayamBakar">Ayam Bakar Utuh</option>
				 				<option value="ayamBetutu">Ayam Betutu Utuh</option>
				 				<option value="nasiTumpeng">Nasi Tumpeng</option>
				 				<option value="nasiKebuli">Nasi Kebuli 1kg</option>
				 			</optgroup>
				 		</select></td>
		            </tr>
		            <tr> 
		                <td>Total Pesanan</td>
		                <td><input type="text" style="width: 85%" name="totalpesanan" placeholder="Total Pesanan" "></td>
		            </tr>
		        </table>
			</form>
		</section>
	</div></center>
</main>
</body>
</html>