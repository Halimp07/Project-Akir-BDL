<?php
include "../connection.php";
$ID = $_GET['id'];
$sql = ociparse($conn, "DELETE PELAMAR WHERE ID_PELAMAR='$ID'");
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
   die();
} else
   echo "Gagal Entri Data";
