<?php
include "../connection.php";
$id = $_POST['id'];
$nama = $_POST['nama'];
$instansi = $_POST['instansi'];
$JUMLAH = $_POST['jumlah'];
$sql = ociparse(
   $conn,
   "UPDATE LOWONGAN SET NAMA_PEKERJAAN='$nama', PERUSAHAAN='$instansi', LOWONGAN_TERSEDIA=$JUMLAH WHERE ID_LOWONGAN='$id'"
);
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
   die();
} else
   echo "Gagal Entri Data";
