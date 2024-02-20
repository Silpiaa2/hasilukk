<?php
include "koneksi.php";
$hapus = mysqli_query($koneksi, "delete from detail_produk where DetailID='$_GET[id]'");
header("location:tabeldetail.php");
?>