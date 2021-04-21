<?php
$namaFile = "datamhs.dat";
$myfile = fopen($namaFile, "a") or die("Tidak bisa buka file!");
fwrite($myfile, $_POST['nim']);
fwrite($myfile, "-");
fwrite($myfile, $_POST['nama']);
fwrite($myfile, "-");
fwrite($myfile, $_POST['tgllhr']);
fwrite($myfile, "-");
fwrite($myfile, $_POST['tmptlhr']);
fwrite($myfile, "\n");
fclose($myfile);
?>

<?php
$namaFile = "datamhs.dat";
$myfile = fopen($namaFile, "r") or die("Tidak bisa buka file!");
echo fread($myfile, filesize($namaFile));
fclose($myfile);
?>