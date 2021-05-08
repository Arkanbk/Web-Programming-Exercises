<?php
    if (isset($_POST['submit'])){
        setcookie("nama", $_POST['nama'], time()+3*30*24*3600,"/");
        setcookie("email", $_POST['email'], time()+3*30*24*3600,"/");
        setcookie("nyawa", 5, time()+3*30*24*3600,"/");
        setcookie("skor", 0, time()+3*30*24*3600,"/");
        header("Location:main.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>UTS</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- Kalau Sudah Pernah Login, Akan Tampil Cookie -->
    <?php if (isset($_COOKIE['nama'])){ ?>
    <div class="container" style="width: 50%;">
      <center>
      <h2>Hai <?php echo $_COOKIE['nama']?>, Selamat Datang di Permainan Ini!</h2>
      <h2>Apa benar ini dengan <?php echo $_COOKIE['nama']?> sendiri?</h2>
      <a href="main.php"><input type="button" name="lanjut" class="btn btn-success" value="Ya"></a>
      <a href="reset.php"><input type="button" name="lanjut" class="btn btn-danger" value="Bukan"></a>
      <?php
        setcookie("nama", $_COOKIE['nama'], time()+3*30*24*3600,"/");
        setcookie("email", $_COOKIE['email'], time()+3*30*24*3600,"/");
        setcookie("nyawa", $_COOKIE['nyawa'], time()+3*30*24*3600,"/");           
      ?>
      </center>
    </div>
    <?php } else { ?>
    
    <!-- Kalau Belum Login Akan Dilempar Kesini -->
    <div class="container" style="width: 50%;">
      <h2>Mau Mulai Main? Silahkan Login!</h2>
      <form method="POST" action="index.php">
        <div class="form-group">
          <label for="name">Username:</label>
          <input type="text" class="form-control" id="name" placeholder="Enter Username" name="nama">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email">
        </div>
        <button type="submit" name="submit" class="btn btn-success">Main</button>
      </form>
    </div>
    <?php } ?>    
</body>
</html>