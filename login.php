<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background: linear-gradient(to right, #283048, #859398);
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }
    .login-container {
      margin-top: 5%;
    }
    .login-card {
      max-width: 400px;
      margin: auto;
      padding: 30px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      border-radius: 10px;
      background-color: rgba(255, 255, 255, 0.9);
    }
    .login-header {
      text-align: center;
      margin-bottom: 20px;
      color: #4b7bec;
      font-size: 32px;
      font-weight: bold;
    }
    .form-group {
      margin-bottom: 20px;
    }
    .form-group label {
      font-size: 18px;
      color: #576574;
    }
    .form-control {
      border: 2px solid #4b7bec;
      border-radius: 5px;
      font-size: 16px;
      color: #2f3640;
    }
    .form-control:focus {
      border-color: #45aaf2;
      box-shadow: 0 0 10px rgba(75, 123, 236, 0.3);
    }
    .btn-primary {
      background-color: #4b7bec;
      border: none;
      border-radius: 5px;
      padding: 12px;
      width: 100%;
      font-size: 18px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
      background-color: #45aaf2;
    }
    .signup-link {
      text-align: center;
      margin-top: 15px;
      color: #576574;
    }
    .signup-link a {
      color: #4b7bec;
      font-weight: bold;
    }
  </style>
</head>
<body>
<div class="container login-container">
  <div class="card login-card">
    <div class="card-body">
      <h2 class="card-title login-header">Welcome</h2>
        <div class="card-body">
          <form id="loginForm" method="post" action="">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-lg" name="submit">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
<?php
session_start(); // Start the session

if(isset($_POST['submit'])) {
    // Koneksi ke database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "silvi_penjualan"; // Ganti dengan nama database Anda

    $koneksi = new mysqli($servername, $username, $password, $dbname);

    if ($koneksi->connect_error) {
        die("Koneksi Gagal: " . $koneksi->connect_error);
    }

    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Proses autentikasi
    $query = "SELECT * FROM kasir WHERE username='$username' AND password='$password'";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Autentikasi berhasil, store id_petugas in session
        $row = $result->fetch_assoc();
        $_SESSION['id_kasir'] = $row['id_kasir'];

        // Redirect to the halaman petugas
        header("Location: menu.html");
        exit();
    } else {
        // Autentikasi gagal, redirect to the login page with an error message
        echo '<script>
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Login failed. Please check your username and password.",
        }).then(function() {
            window.location.href = "login.php";
        });
        </script>';
        exit();
    }

    $conn->close();
}
?>