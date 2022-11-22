<?php
include "../connection.php";
$id_lowongan = $_POST['lowongan'];
$id_pelamar = $_POST['pelamar'];
$deskripsi = 'Diterima';
$tanggal = date('d-M-Y', strtotime($_POST['tanggal']));
$count = ociparse($conn, "SELECT MAX(ID_TRANSAKSI) FROM TRANSAKSI");
ociexecute($count);
while (($row = oci_fetch_row($count)) != false) {
   $countRow = $row[0];
}
$countRow++;
$sql = ociparse(
    $conn, 
    "INSERT INTO TRANSAKSI VALUES ($countRow,$id_pelamar,$id_lowongan,'$deskripsi',TO_DATE('$tanggal', 'DD-MON-YYYY'))"
);
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
} else
   echo "Gagal Entri Data";
