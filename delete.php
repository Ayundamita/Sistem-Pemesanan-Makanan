<?php
$idpenjual = $_GET['idpenjual'];
$idpembayaran = $_GET['idpembayaran'];
include 'config.php';

$result = mysqli_query($connect, "DELETE FROM pembayaran WHERE id_pembayaran=$idpembayaran");

if($result){
header("Location: admin.php?id=$idpenjual");
}
?>