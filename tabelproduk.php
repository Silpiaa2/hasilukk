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
 <form action="" method="post">
                    Cari berdasarkan 
                    <select name="pilih">
                        <option value="ProdukID">ID</option> 
                        <option value="NamaProduk">Nama</option>
                        <option value="Harga">Harga</option>
                        <option value="Stok">Stok</option>
                        
                    </select>
                    <input type="text" name="tekscari" size="24">
                    <input type="submit" name="cari" value="Cari">
                    <input type="submit" name="semua" value="Tampilkan Semua">
                </form>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Produk ID</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                    <?php 
                    include "koneksi.php";
                    $tampil = mysqli_query($koneksi, "SELECT*FROM produk");
                    foreach ($tampil as $row) {
                    ?>
                    <tr>
                        <td><?php echo "$row[ProdukID]"; ?></td>
                        <td><?php echo "$row[NamaProduk]"; ?></td>
                        <td><?php echo "$row[Harga]"; ?></td>
                        <td><?php echo "$row[Stok]"; ?></td>
                        <td><?php echo "<a href='update.php?id=$row[ProdukID]'> UPDATE </a> 
                         <a href='delete.php?id=$row[ProdukID]'> DELETE </a>"; ?></td>

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