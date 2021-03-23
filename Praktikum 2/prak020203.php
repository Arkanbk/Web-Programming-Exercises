<html>
    <head>Headings</head>
    <body>
    <?php
    $baris=4;
    $kolom=5;
    echo "<table border='1'";
        for($i=0; $i<$kolom; $i++){
            echo "<tr>";
            for($j=1; $j<$baris+1; $j++){
                if(($j+($i*4))%2==0){
                    echo "<td bgcolor='red'><font color='white'>",$j+($i*4),"</font></td>";
                }else{
                    echo "<td><font color='red'>",$j+($i*4),"</font></td>";
                }
            }
            echo "</tr>";
        }
    echo "</table>";
    ?>
    </body>
</html>