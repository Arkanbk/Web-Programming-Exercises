<!DOCTYPE html>
<html>
<head>
  <title> DATA MAHASISWA </title>
</head>
<body>
  <p> DATA MAHASISWA </P>
  <table border="1">
    <th>NIM</th>
    <th>Nama</th>
    <th>Tanggal Lahir</th>
    <th>Tempat Lahir</th>
    <th>Usia</th>
<?php  
$file_handle = fopen("datamhs.dat", "rb");

function hitungUmur($tglL, $tglS){
    
  // memecah tanggal sehingga mendapatkan tanggal, bulan dan tahun
  // dari tanggal lahir disingkat lhr
  
  $Tgllhr = explode("-", $tglL);
  $date1 = $Tgllhr[2];
  $month1 = $Tgllhr[1];
  $year1 = $Tgllhr[0];
  
  // memecah tanggal sehingga mendapatkan tanggal, bulan dan tahun
  // dari tanggal sekarang disingkat skrng
  
  $Tglskrng = explode("-", $tglS);
  $date2 = $Tglskrng[2];
  $month2 = $Tglskrng[1];
  $year2 =  $Tglskrng[0];
  
  // menghitung lhr dan skrng dengan JDN dari masing-masing tanggal
  
  $lhr = GregorianToJD($month1, $date1, $year1);
  $skrng = GregorianToJD($month2, $date2, $year2);
  
  // hitung selisih tahun kedua tanggal
  
  $usia = ceil(($skrng - $lhr) / 365);
  return $usia;
}
$i=0;
while (!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    $parts = explode('|', $line_of_text);
    hitungUmur($parts[2], "2021-04-16");
    echo "<tr><td height='119'>$parts[0]</td>
      <td>$parts[1]</td>
      <td>$parts[2]</td>
      <td>$parts[3]</td>
      <td>".hitungUmur($parts[2], date("Y-m-d"));"</td>
      </tr>";
    $i++;
}
fclose($file_handle);


?>  

</table>
  <?php
    echo "<br>";
    echo "Jumlah Data :" .$i;
  ?>

</body>
</html>