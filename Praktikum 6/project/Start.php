<?php
$number = rand(1, 100);
setcookie("bilkocok", $number, time()+3*30*24*3600,"/");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Game Tebak Nomer</title>
    </head>
    <body>
        <h1>Selamat Datang di Tebak Kartu</h1>
        <p>Hallo, nama saya Mr. Paijo Paijan. Saya telah memilih secara acak sebuah bilangan bulat. Silakan Anda menebak ya!</p>
        <form method="POST" action="Coba.php">
            Bilangan tebakan Anda  <input type="text" name="tebak">
            <input type="submit" name="submit" value="Submit">
        </form>
    </body>
</html>