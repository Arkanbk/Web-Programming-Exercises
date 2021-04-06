<!DOCTYPE html>
<html>
<body>

<?php  
function hitungGaji($golongan, $masaKerja){
    if ($golongan == "A"){
         if ($masaKerja < 10) {
            $gaji = 5000000;
         } else {
             $gaji = 7000000;
         }

    } else if ($golongan == "B"){
            if ($masaKerja < 10) {
                $gaji = 6000000;
             } else {
                 $gaji = 8000000;
             }
         }
         
return $gaji;

}
echo hitungGaji("A", 5);
echo "<br>";
echo hitungGaji("A", 10);
echo "<br>";
echo hitungGaji("B", 5);
echo "<br> ";
echo hitungGaji("B", 10);
?>  

</body>
</html>