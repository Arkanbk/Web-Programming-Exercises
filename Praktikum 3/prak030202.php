<!DOCTYPE html>
<html>
<body>

<?php  
function hitungDenda($tgl1, $tgl2){
    
    // waktu pengembalian tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
    // tanggal pertama
    
    $deadline = explode("-", $tgl1);
    $date1 = $deadline[2];
    $month1 = $deadline[1];
    $year1 = $deadline[0];
    
    // waktu dikembalikan tanggal untuk mendapatkan bagian tanggal, bulan dan tahun
    // tanggal kedua
    
    $kembali = explode("-", $tgl2);
    $date2 = $kembali[2];
    $month2 = $kembali[1];
    $year2 =  $kembali[0];
    
    // menghitung JDN dari masing-masing tanggal
    
    $tgld = GregorianToJD($month1, $date1, $year1);
    $tglk = GregorianToJD($month2, $date2, $year2);
    
    // hitung selisih hari kedua tanggal
    
    $selisih = $tglk - $tgld;

    // hitung total denda
    $totaldenda = $selisih * 3000;
    return $totaldenda;
}

// Cara masukkan tanggal (tanggalharuskembali, tanggal kembali)
// format tanggal (YYYY-MM-DD)
echo "Besarnya denda adalah: Rp ".hitungDenda("2021-01-03", "2021-01-05");

?>  

</body>
</html>