<?php
$a = $_POST['tebak'];
$b = $_COOKIE['bilkocok'];

if ($a < $b){
    echo "Waaah… masih jauh, bilangan tebakanmu terlalu jauh dibelakang.";
    echo "<br>";
    echo "<br>";
    echo "<form method='POST' action='coba.php'>
            Bilangan tebakan Anda  <input type='text' name='tebak'>
            <input type='submit' name='submit' value='Submit'>
        </form>";
} elseif ($a > $b){
    echo "Heii... kejauhan, bilangan tebakan Anda terlalu jauh didepan.";
    echo "<br>";
    echo "<br>";
    echo "<form method='POST' action='coba.php'>
            Bilangan tebakan Anda  <input type='text' name='tebak'>
            <input type='submit' name='submit' value='Submit'>
        </form>";
} else {
    header("Location:Akhiran.php");
}
?>