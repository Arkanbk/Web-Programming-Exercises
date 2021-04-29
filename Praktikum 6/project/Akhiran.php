<?php
echo "Selamat ya… Prediksi mu benar, saya telah memasang bilangan " .$_COOKIE['bilkocok'];
setcookie("bilkocok", "", time()-3*30*24*3600,"/");
echo "<br>";
echo "<br>";
echo "<a href='Start.php'>Kembali ke Home</a>";
echo "<- Klik untuk mengulangi permainan kembali"
?>