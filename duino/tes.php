<?php
$date = date("d-m-Y");
$date1 = "1-1-2022";
$datesa = "17-1-2021";
$tambah = "5";
// $date = str_replace('/', '-', $date);
// $haha = date('d-m-y', strtotime($date. '+'.$tambah.' Days'));
$haha = strtotime($date);
$haha1 = strtotime($date1);
// echo date('Y-m-d', strtotime($date));
// echo $date;
$selisih = $haha1-$haha;
echo $selisih/24/60/60;
echo '<br><br>'.$datesa;
?>