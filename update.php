<?php
session_start();
if (!isset($_SESSION["id_kasir"])) {
    header("location:login.php");
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
  
</head>

<body>
    <!-- Start your project here-->
   
                    <!-- Dropdown menu start-->
                   
                    <!-- Dropdown menu end -->
                
                    <!-- Dropdown menu end -->
              
        </div>
    </nav>
    <?php
    include "koneksi.php";
    if (isset($_POST["ok"])){
        $ProdukID=$_POST["ProdukID"];
        $NamaProduk=$_POST["NamaProduk"];
        $Harga=$_POST["Harga"];
        $Stok=$_POST["Stok"];
       

        $simpan = mysqli_query($koneksi, " update produk set
        NamaProduk='$NamaProduk',
        Harga='$Harga',
        Stok='$Stok',
        where ProdukID='$ProdukID'");
        if ($simpan) {
            header ("location:tabelproduk.php");
        } else {
            echo "<div class='alert alert-danger'>Gagal menambah data baru!</div>";
        }

        

    }
?>
    <div class="container">
        <div class="d-flex justify-content-center align-items-center" style="height: 100vh">
            <div class="text-center">
                <form method="POST" action="">
                    <?php
                     $tampil=mysqli_query($koneksi,"select * from produk where ProdukID='$_GET[id]'");
                     foreach ($tampil as $row) {
                    ?>
                    <div class="form-grup">
                        <label><b>ProdukID</b></label>
                        <input value="<?php echo $row['ProdukID'];?>" type="text" class="form-control" placeholder="id" name="ProdukID">
                    </div>
                    <div class="form-grup">
                        <label><b>Nama Produk</b></label>
                        <input value="<?php echo $row['NamaProduk'];?>" type="text" class="form-control" placeholder="Nama" name="NamaProduk">
                    </div>
                    <div class="form-grup">
                        <label><b>Harga</b></label>
                        <input value="<?php echo $row['Harga'];?>" type="text" class="form-control" placeholder="Harga" name="Harga">
                    </div>
                    <div class="form-grup">
                        <label><b>Stok</b></label>
                        <input value="<?php echo $row['Stok'];?>" type="text" class="form-control" placeholder="Stok" name="Stok">
                    </div>
                  
                    <button type="submit" name="ok" class="btn btn-default">SIMPAN</button>
                    <button type="reset" class="btn btn-danger">CANCEL</button>
                    <?php } ?>
                </form>
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
