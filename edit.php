<?php
$idadmin = $_GET['idpenjual'];
$idpembayaran = $_GET['idpembayaran'];
include 'config.php';

$queryB = "SELECT * FROM pembayaran WHERE id_pembayaran = $idpembayaran ";
$sqlB = mysqli_query($connect, $queryB);
$datapembayaran = mysqli_fetch_array($sqlB);

$idpesanan = $datapembayaran['id_pesanan'];

$queryC = "SELECT * FROM pesanan WHERE id_pesanan = $idpesanan ";
$sqlC = mysqli_query($connect, $queryC);
$datapesanan = mysqli_fetch_array($sqlC);

$idpembeli = $datapesanan['id_pembeli'];

$queryD = "SELECT * FROM pembeli WHERE id_pembeli = '$idpembeli'";
$sqlD = mysqli_query($connect, $queryD);
$datapem = mysqli_fetch_array($sqlD);


$nama = $datapem['nama_pembeli'];
$totalharga = $datapembayaran['total_harga'];
$isBayar = $datapembayaran['isBayar'];

if (ISSET($_POST['submit'])) {
    $idadmin = $_POST['idadmin'];
    $status = $_POST['status'];
    $idpembayaran = $_POST['idpembayaran'];

	$result = mysqli_query($connect, "UPDATE pembayaran SET isBayar='$status' WHERE id_pembayaran='$idpembayaran'");

	header("Location: admin.php?id=$idadmin");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
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

			<form action="edit.php" method="post" style="
				padding: 10px;
				margin: 10px;
				border-radius: 20px;
			">
				<h1 style="
					font-size: 25px;
					letter-spacing: 1px;
					font-weight: bold;
					text-align: center;
				">UPDATE JADWAL</h1>
				<ul style="
					list-style: none;
					font-family: serif;
					font-weight: bold;
				"><center>
					<li style="">
						<table width='70%' border='0'>
					            <tr> 
					                <td width='30%'>Nama</td>
					                <td><?php echo $nama;?></td>
					            </tr>
					            <tr> 
					                <td width='30%'>Total Harga</td>
					                <td><?php echo $totalharga;?></td>
					            </tr>
					            <tr> 
					                <td width='30%'>Bayar</td>
					                <td><select class="select" name="status" style="width: 100%">
							 			<optgroup label="Judul Film">
							 				<option value="Y">Y</option>
							 				<option value="T">T</option>
							 				<option value="K">K</option>
							 			</optgroup>
							 		</select></td>
					            </tr>
					            <tr>
					                <td><input type="hidden" name="idadmin" value=<?php echo $_GET['idpenjual'];?>></td>
					                <td><input type="hidden" name="idpembayaran" value=<?php echo $_GET['idpembayaran'];?>></td>
					            </tr>
					        </table>
					</li></center>
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
				">Update</button>
			</form>
		</div>
	</section>
</main>
</body>
</html>