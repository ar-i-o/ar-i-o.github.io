<?php

$title = "Faiz Rashid";
$author = "Faiz Rashid";
$server_url = $_SERVER['REQUEST_URI'];

date_default_timezone_set("Asia/Jakarta");
$date = date("d-m-Y");
$bulan = date("m");
$tahun = date("Y");
// $tahun = "2030";
$time = date("h:i:s");
$passlogin = "iniwebsiteku";

$host = "localhost";
$user = "id18275842_iot1";
$pass = "FaizMoney123.";
$db = "id18275842_iot";
$konek = mysqli_connect($host, $user, $pass) or die ('Koneksi Gagal! ');
mysqli_select_db($konek,$db);
?>

