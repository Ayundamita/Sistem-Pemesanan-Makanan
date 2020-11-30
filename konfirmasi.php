<?php
$idpenjual = $_GET['idadmin'];
$idtrans = $_GET['idpesanan'];
$totalharga = $_GET['totalharga'];
include 'config.php';

$result = mysqli_query($connect, "UPDATE pesanan set isKonfirm='Y' where id_pesanan=$idtrans");

$result2 = mysqli_query($connect, "INSERT INTO pembayaran VALUES('','$idtrans','$totalharga','T')");

if($result){
header("Location: admin.php?id=$idpenjual");
}
?>