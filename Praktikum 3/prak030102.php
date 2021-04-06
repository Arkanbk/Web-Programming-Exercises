<!DOCTYPE html>
<html>
<body>

<?php  
function Bintang($n){
    echo "<pre>";
   for($i=0; $i<=$n; $i++){
       for($j=0; $j<$i; $j++){
            echo "*";
       }
        echo "\n";
   }
    echo "</pre>";
}

Bintang(4);
Bintang(5);

?>  

</body>
</html>