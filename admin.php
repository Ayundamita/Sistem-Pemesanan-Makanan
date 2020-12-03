<?php
$id = $_GET['id'];
include 'config.php';

$query1 = "SELECT * FROM penjual WHERE id_penjual = '$id'";
$sql1 = mysqli_query($connect, $query1);
$dataadmin = mysqli_fetch_array($sql1);

$nama = $dataadmin['nama'];

$q = "CREATE VIEW pesanan_view SELECT * FROM pesanan ORDER BY id_pesanan";
$sqlPESAN = mysqli_query($connect, $q);
$query = "SELECT * FROM pesanan ORDER BY id_pesanan";
$sql = mysqli_query($connect, $query);

$q2 = "CREATE VIEW pembayaran_view SELECT * FROM pembayaran ORDER BY id_pembayaran";
$sqlPESANAN = $sqlPESAN = mysqli_query($connect, $q2);
$query2 = "SELECT * FROM pembayaran ORDER BY id_pembayaran";
$sql2 = mysqli_query($connect, $query2);


$JOIN = "SELECT b.nama_pembeli, c.nama FROM `pesanan` AS a INNER JOIN pembeli AS b ON a.id_pembeli = b.id_pembeli INNER JOIN menu AS c ON a.id_menu = c.id_menu"; // ni join
$sqlJOIN = mysqli_query($connect, $JOIN);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

</head>
<body style="
	padding: 0px;
	margin: 0px;
	font-family: 'serif';
">
<main>
	<section style="
			width: 100%;
			height: 100vh;
			padding: 0px;
			margin: 0px; 
			background-image: url(img/bg.jpg);
		">

		<div style="width: 80%; 
		position: relative;
		left: 20vh;
		top: 10vh;
		background-color: rgba(255, 255, 255, 0.9);
		border-radius: 20px;
		display: flex;
		flex-wrap: nowrap;
		justify-content: space-around;
		font-size: 15px;">

			<form action="admin.php" method="post" style="
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
				width: 60vh;
			"><center>
				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">SELAMAT DATANG @<?php echo $nama ?></h1>
				 <a href="index.php"><input type="" class="btn btn-primary" name="logout" value="Logout" style="
					width: 25%;
					border-radius: 10px;
					"></a>
				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					margin-top: 25px;
					font-weight: bold;
					text-align: center;
				">Pesanan Masuk</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				">
					<li style="">
						<table width='100%' border="1">
						    <tr>
						        <th>Nama Pemesan</th> <th>Menu</th> <th>Jumlah</th> <th>Harga Total</th> <th>Terkonfirmasi</th> <th>Edit</th>
						    </tr>
						    <?php  
						    while($datapesanan = mysqli_fetch_array($sql)) {
					    	$idpembeli = $datapesanan['id_pembeli'];

					    	$queryA = "SELECT * FROM pembeli WHERE id_pembeli = '$idpembeli'";
							$sqlA = mysqli_query($connect, $queryA);
							$datapembeli = mysqli_fetch_array($sqlA);

					    	$idmenu = $datapesanan['id_menu'];

							$queryB = "SELECT * FROM menu WHERE id_menu = '$idmenu'";
							$sqlB = mysqli_query($connect, $queryB);
							$datamenu = mysqli_fetch_array($sqlB);

							$totalharga = $datapesanan['total_pesanan']*$datamenu['harga'];

					        echo "<tr>";
					        echo "<td>".$datapembeli['nama_pembeli']."</td>";
					        echo "<td>".$datamenu['nama']."</td>";
					        echo "<td>".$datapesanan['total_pesanan']."</td>";
					        echo "<td>".$totalharga."</td>";
					        echo "<td>".$datapesanan['isKonfirm']."</td>";
					        echo "<td><a href='konfirmasi.php?idpesanan=$datapesanan[id_pesanan]&idadmin=$id&totalharga=$totalharga'>Konfirmasi</a></td>"; 
					        echo "</tr>";       
					    }
						    ?>
						    </table>
					</li>
				</ul>

				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					font-weight: bold;
					margin-top: 40px;
					text-align: center;
				">Pesanan Terkonfirmasi</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				">
					<li style="">
						<table width='100%' border="1">
						    <tr>
						        <th>Nama Pemesan</th> <th>Total Tagihan</th> <th>Sudah dibayar</th> <th>Hapus Transaksi</th>
						    </tr>
						    <?php  
						    while($datapembayaran = mysqli_fetch_array($sql2)) {

						    	$idpesanan = $datapembayaran['id_pesanan'];

						    	$queryC = "SELECT * FROM pesanan WHERE id_pesanan = $idpesanan ";
								$sqlC = mysqli_query($connect, $queryC);
						    	$datapesanan = mysqli_fetch_array($sqlC);

						    	$idpembeli = $datapesanan['id_pembeli'];

						    	$queryD = "SELECT * FROM pembeli WHERE id_pembeli = '$idpembeli'";
								$sqlD = mysqli_query($connect, $queryD);
								$datapem = mysqli_fetch_array($sqlD);

						        echo "<tr>";
						        echo "<td>".$datapem['nama_pembeli']."</td>";
						        echo "<td>".$datapembayaran['total_harga']."</td>";
						        echo "<td>".$datapembayaran['isBayar']."</td>";
						        echo "<td><a href='edit.php?idpembayaran=$datapembayaran[id_pembayaran]&idpenjual=$id'>Edit</a> || <a href='delete.php?idpembayaran=$datapembayaran[id_pembayaran]&idpenjual=$id'>Delete</a></td>";
						        echo "</tr>";        
						    }
						    ?>
						
						    </table>
					<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					margin-top: 25px;
					font-weight: bold;
					text-align: center;
				">Data JOIN</h1>
						    <table width='100%' border="1">
						    <tr>
						        <th>Nama Pemesan</th> <th>Menu</th>
						    </tr>
						    <?php  
						    while($dataJOIN = mysqli_fetch_array($sqlJOIN)) {
					    	$idpembeli = $datapesanan['id_pembeli'];

					        echo "<tr>";
					        echo "<td>".$dataJOIN['nama_pembeli']."</td>";
					        echo "<td>".$datamenu['nama']."</td>";

				      
					    }
						    ?>
						    </table>
					</li>
				</ul>
			</center></form>
		</div>
	</section>
</main>
</body>
</html>