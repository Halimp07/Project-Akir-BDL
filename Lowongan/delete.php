<?php
include "../connection.php";
$id = $_GET['id'];
$sql = ociparse($conn, "DELETE LOWONGAN WHERE ID_LOWONGAN='$id'");
ociexecute($sql);
if (ocirowcount($sql) > 0) {
   header("location: index.php");
   die();
} else
   echo "Gagal Entri Data";
