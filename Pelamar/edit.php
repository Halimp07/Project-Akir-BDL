<?php
include "../connection.php";
$id_pelamar = $_POST['id_pelamar'];
$nama = $_POST['nama'];
$no_telp = $_POST['no_telp'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$sql = ociparse(
   $conn,
   "UPDATE PELAMAR SET NAMA='$nama', NO_TELP='$no_telp', KOTA='$kota', ALAMAT='$alamat', EMAIL='$email' WHERE ID_PELAMAR='$id_pelamar'"
);
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
   die();
} else
   echo "Gagal Entri Data";
