<!DOCTYPE html>
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
 
 
 <br/>

 <br/>
 <br/>
 <h3>TAMBAH DATA PRODUK</h3>
 <form method="post" action="proses.php">
 <table>
 <tr> 
 <td>Produk</td>
 <td><input type="text" name="ProdukID"></td>
 </tr>
 <tr>
 <td>Nama</td>
 <td><input type="text" name="NamaProduk"></td>
 </tr>
 <tr>
 <td>Harga</td>
 <td><input type="text" name="Harga"></td>
 </tr>
 <td>Stok</td>
 <td><input type="text" name="Stok"></td>
 </tr>
 <tr>
 <td></td>
 <td><input type="submit" value="SIMPAN"></td>
 </tr> 
 </table>
 </form>
</body>
</html>
