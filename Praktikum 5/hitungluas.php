<?php
$n = $_GET['n'];
$d = $_GET['d'];
$t = $_GET['t'];

//Hitung Luas Tabung

$r = $d/2;
$phi = 3.14;
$luas = 2*$phi*$r*($r+$t);

//Hasil
echo "Luas tabung $n yang memiliki diameter $d dan tinggi $t adalah $luas satuan luas"

?>