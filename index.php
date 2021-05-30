<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" 
      type="image/png" 
      href="gambar/muhmlati.png"/>

    <title>SMK Muhammadiyah Mlati</title>

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <?php
    if(isset($_GET['pesan'])){
      if($_GET['pesan']=="gagal"){
        echo "<div class='alert'>Username dan Password tidak sesuai</div>";
      }
    }
    ?>

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center"><b>SMK MUHAMMADIYAH MLATI <br> Sistem Informasi Pembayaran Siswa </b> <a href="index.php"></a><br> <img src="gambar/muhmlati.png" class="rounded-circle" style="width: 35%"></a></div>
        <div class="card-body">

          <form action="masuk_cek.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputUsername">Masukkan Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Masukkan Password</label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="login">MASUK</button>
          </form>
        </div>
      </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
