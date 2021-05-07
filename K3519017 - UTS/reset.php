<?php
setcookie("nama", $_COOKIE['nama'], time()-3*30*24*3600,"/");
setcookie("email", $_COOKIE['email'], time()-3*30*24*3600,"/");
setcookie("skor", 0, time()-3*30*24*3600,"/");
setcookie("nyawa", 0, time()-3*30*24*3600,"/");
header("Location: index.php");
?>
