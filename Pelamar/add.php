<?php
include "../connection.php";
// $id_pelamar = $_POST['id_pelamar'];
$nama = $_POST['nama'];
$no_telp = $_POST['No_Telp'];
$kota = $_POST['Kota'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$count = ociparse($conn, "SELECT MAX(ID_PELAMAR) FROM PELAMAR");
ociexecute($count);
while (($row = oci_fetch_row($count)) != false) {
   $id_pelamar = $row[0];
}
$id_pelamar++;
$sql = ociparse(
   $conn,
   "INSERT INTO PELAMAR VALUES ($id_pelamar,'$nama',$no_telp, '$kota', '$alamat', '$email')"
);
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
} else
   echo "Gagal Entri Data";