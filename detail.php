
<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['id_kasir'])) {
    header("Location: login.php");
    exit;
}
?>

<html>
<head>
<meta charset="utf-8">
<style type="text/css">
    .login {
        margin: 250px auto;
        width: 400px;
        padding: 10px;
        border: 1px solid #ccc;
        background: lightblue;
    }
    input[type=text], input[type=password] {
        margin: 5px auto;
        width: 100%;
        padding: 10px;
    }
    input[type=submit] {
        margin 5px auto;
        float: right;
        padding: 5px;
        width: 90px;
        border: 1px solid #fff;
        color: #fff;
        background: red;
        cursor: pointer;
    }
</style>

</head>
 
<body>
	
	<br/><br/>
	<h3>TAMBAH DATA DETAIL</h3>
	<form action="" method="post" name="form1">
		<table width="25%" border="0">
    <tr> 
				<td>Detail</td>
				<td><input type="text" name="DetailID"></td>
			</tr>
			<tr> 
				<td>Penjualan</td>
				<td><input type="text" name="PenjualanID"></td>
			</tr>
			<tr> 
				<td>Tanggal</td>
				<td><input type="date" name="TanggalPenjualan"></td>
			</tr>
      <tr> 
				<td>Produk</td>
				<td><input type="text" name="ProdukID"></td>
			</tr>
      <tr> 
				<td>Jumlah </td>
				<td><input type="text" name="JumlahProduk"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'koneksi.php';

  $DetailID = $_POST["DetailID"];
  $PenjualanID = $_POST["PenjualanID"];
  $TanggalPenjualan= $_POST["TanggalPenjualan"];
  $ProdukID = $_POST["ProdukID"];
  $JumlahProduk = $_POST["JumlahProduk"];

  
  $sqldetail_produk = "INSERT INTO detail_produk (DetailID, PenjualanID, ProdukID) VALUES ('$DetailID', '$PenjualanID', '$ProdukID')";
  $koneksi->query($sqldetail_produk);

  // Get the last inserted ID
  $lastID = $koneksi->DetailID;

  // Insert data into pengaduan table
  $sqlpenjualan = "INSERT INTO penjualan (PenjualanID, TanggalPenjualan) VALUES ('$PenjualanID','$TanggalPenjualan')";
  $koneksi->query($sqlpenjualan);

  // Close the database connection
  $koneksi->close();

  // Redirect to a success page or do something else
  header("Location: tabeldetail.php");
  exit();
}
?>