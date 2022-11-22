<?php
include "../connection.php";
$nama = $_POST['nama'];
$instansi = $_POST['instansi'];
$ketersediaan = $_POST['ketersediaan'];
$count = ociparse($conn, "SELECT MAX(ID_LOWONGAN) FROM LOWONGAN");
ociexecute($count);
while (($row = oci_fetch_row($count)) != false) {
   $countRow = $row[0];
}
$countRow++;
$sql = ociparse(
   $conn,
   "INSERT INTO LOWONGAN VALUES ($countRow,'$nama','$instansi',$ketersediaan)"
);
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
} else
   echo "Gagal Entri Data";