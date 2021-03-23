<html>
    <head>Headings</head>
    <body>
    <?php
    $baris=4;
    $kolom=5;
    echo "<table border='1'";
        for($i=1; $i<($kolom*$baris); $i+=4){
            echo "<tr>";
            for($j=0; $j<$baris; $j++){
                $x = $i+$j;
                echo "<td>" .$x. "</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
    ?>
    </body>
</html>