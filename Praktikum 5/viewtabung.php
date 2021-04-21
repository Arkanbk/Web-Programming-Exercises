<!DOCTYPE html>
<html>
<head>
<title> DATA UKURAN TABUNG </title>
</head>
<body>
<p> DATA UKURAN TABUNG </P>
<table border="1">
  <th>Nama Tabung</th>
  <th>Diameter</th>
  <th>Tinggi</th>
  <th>Luas</th>
<?php
$myfile = fopen("datatabung.dat", "r") or die("Tidak bisa buka file!");
while(!feof($myfile)) {
  $baris = fgets($myfile);
  $index = explode(",", $baris);
  echo "<tr><td height='10'>".$index[0]."</td>
  <td>".$index[1]."</td>
  <td>".$index[2]."</td>
  <td><a href='hitungluas.php?n=$index[0]&d=$index[1]&t=$index[2]'>view</a></td>
  </tr>";
}
fclose($myfile);

?>
</table>
</body>
</html>