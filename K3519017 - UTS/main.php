<?php 
$rules = "
- Dalam permainan, player diberi modal nyawa sebanyak 5 dan skor awal 0.
- Ketika jawaban yang diberikan salah, maka nyawa berkurang satu dan skor berkurang 2
- Ketika jawaban yang diberikan benar, maka skor bertambah 10
- Permainan akan berakhir (game over) jika nyawanya habis";

$komentar = "";
$bil1 = rand(0,20);
$bil2 = rand(0,20);

function randomint($bil1, $bil2){
  $jml = $bil1 + $bil2;
  return $jml;
}

if (isset($_POST['submit'])){
  $bil1   = $_POST['bil1'];
  $bil2   = $_POST['bil2'];
  $jawab  = $_POST['jawab'];
  $jml    = randomint($bil1, $bil2);

  if ($jawab == $jml){
    $komentar = "Selamat Jawaban Yang Anda Masukkan Benar. Jangan puas, terus tingkatkan.<a href='main.php' class='btn btn-primary'>Next</a>";
    setcookie("skor", $_COOKIE['skor']+=10, time()+3*30*24*3600,"/");
  } else {
    $komentar = "Maaf Jawaban Yang Anda Masukkan Salah. Coba lebih teliti lagi. <a href='main.php' class='btn btn-danger'>Next</a>";
    setcookie("skor", $_COOKIE['skor']-=2, time()+3*30*24*3600,"/");
    setcookie("nyawa", $_COOKIE['nyawa']-=1, time()+3*30*24*3600,"/");
  }
}
?>
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
  <!-- Halaman Game -->
  <?php 
  if (isset($_COOKIE['nama']) && ($_COOKIE['nyawa'] > 0)){
  ?>
  <div class="container">
    <div class="card mx-auto" style="width: 100%;">
      <form method="POST" action="main.php">
      <h5 class="card-header bg-info" style="text-align: center; color: white;">Haaiii <?php echo $_COOKIE['nama']?>, Selamat Datang di Game Penjumlahan BISA KARENA BIASA</h5>
      <div class="card-body">
        <div class="form-group">
          <div class="input-group" style="width: 45%;float: right;">
            <input type="text" class="form-control text-center text-muted" value="<?php echo $_COOKIE['nama'] ?>" disabled>
            <input type="text" class="form-control text-center text-muted" value="Sisa Nyawa : <?php echo $_COOKIE['nyawa'] ?>" disabled>
            <input type="text" class="form-control text-center text-muted" value="Skor : <?php echo $_COOKIE['skor'] ?>" disabled>
          </div>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" style="width: 50%;" disabled><?php echo $rules?></textarea>
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <input type="hidden" name="bil1" value="<?php echo $bil1 ?>">
            <input type="hidden" name="bil2" value="<?php echo $bil2 ?>">
            <input type="text" class="form-control" name="soal" placeholder="Hasil dari <?php echo $bil1 ?> + <?php echo $bil2 ?> :" disabled>
          </div>
          <div class="form-group col-md-3">
            <input type="text" class="form-control" name="jawab" placeholder="Masukkan Jawaban">
          </div>
          <div class="form-group col-md-6" style="text-align: center;">
            <!-- <input type="text" class="form-control help-block <?php echo (!empty($komentar)) ? 'has-error' : ''; ?>" value="<?php echo $komentar;?>" disabled> -->
            <span class="help-block <?php echo (!empty($komentar)) ? 'has-error' : ''; ?>"><?php echo $komentar;?></span>
          </div>          
        </div>
          <button type="submit" name="submit" class="btn btn-success">Kirim</button>
      </div>
      </form>
    </div> 
  </div>
  <?php 
  } else if ($_COOKIE['nama'] == FALSE) {
  header("Location:index.php");
  } else {
    $nama = $_COOKIE['nama'];
    $skor = $_COOKIE['skor'];

    include 'kon.php';

    $tambah = "INSERT INTO peringkat (nama, skor) VALUES ('$nama', '$skor')";
    mysqli_query($conn, $tambah);

    ?>
  <!-- Halaman Game Over -->
    <div class="container" style="width: 50%;">
      <center>
      <h5>Game Over</h5>
        <p>Hai <?php echo $_COOKIE['nama']?>, Maaf Kesempatanmu Sudah Habis
          <br>Jangan Menyerah. Coba Lagi Dengan Lebih Baik !
          <br>Skor Kamu : <?php echo $_COOKIE['skor'] ?></p>
      <hr>
      <h5>Ranking</h5>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Score</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $tampil = "SELECT * FROM peringkat ORDER BY skor DESC limit 10";
          $result = $conn->query($tampil);

          if ($result->num_rows > 0) {
          $no = 1;
          while($row = $result->fetch_assoc()) { ?>
          <tr>
            <th scope="row"><?php echo $no++?></th>
            <td><?php echo $row['nama']?></td>
            <td><?php echo $row['skor']?></td>
          </tr>
        </tbody>
      <?php }}?>
      </table>
      <a href="reset.php"><input type="button" name="lanjut" class="btn btn-success" value="Ulangi"></a>
      </center>
    </div>   
    <?php } ?>
</body>
</html>