<?php
session_start();
if (!isset($_SESSION["id_kasir"])) {
    header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    </style>
    </body>
<div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="text-center">
                <h1>Data Produk</h1>
                
                <!-- Load icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- The form -->
<form class="example" action="">
  <input type="text" placeholder="Search.." name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Detail ID</th>
                        <th>Penjualan Id</th>
                        <th>Produk ID</th>
                        <th>Jumlah Produk</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php 
                    include "koneksi.php";
                    $tampil = mysqli_query($koneksi, "SELECT*FROM detail_produk");
                    foreach ($tampil as $row) {
                    ?>
                    <tr>
                        <td><?php echo "$row[DetailID]"; ?></td>
                        <td><?php echo "$row[PenjualanID]"; ?></td>
                        <td><?php echo "$row[ProdukID]"; ?></td>
                        <td><?php echo "$row[JumlahProduk]"; ?></td>
                        <td><?php echo "<a href='updatedetail.php?id=$row[DetailID]'> UPDATE </a> 
                         <a href='deletedetail.php?id=$row[DetailID]'> DELETE </a>"; ?></td>

                    </tr>
                    <?php } ?>
                </table>
                
            </div>
        </div>
    </div>
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
</body>

</html>
<?php
}
?>
