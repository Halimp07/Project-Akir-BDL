<?php
include "../connection.php";
$id_transaksi = $_POST['id'];
$id_lowongan = $_POST['lowongan'];
// $nrp_mahasiswa = $_POST['mahasiswa'];
$keterangan = $_POST['keterangan'];
$tanggal = date('d-M-Y', strtotime($_POST['tanggal']));
$sql = ociparse(
   $conn,
   "UPDATE TRANSAKSI SET ID_LOWONGAN='$id_lowongan', KETERANGAN='$keterangan', TANGGAL=TO_DATE('$tanggal') WHERE ID_TRANSAKSI='$id_transaksi'"
);
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
   die();
} else
   echo "Gagal Entri Data";