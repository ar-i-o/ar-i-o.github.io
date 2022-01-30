<?php
include '../config.php';
// menyimpan data kedalam variabel
$uid = $_POST['uid'];
$nama = $_POST['nama'];
// query SQL untuk insert data
$data = mysqli_query($konek,"SELECT * FROM user WHERE rfid = '$uid'");
$data_count = mysqli_num_rows($data);

if (!$uid){ ?>
<div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
UID Kosong,  Silahkan Scan Kartu.
</font>
</div>
<?php } else if (!$nama) {?>
<div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
Nama kosong, Silahkan isi nama.
</font>
</div>
<?php } else if ($data_count <> 0) {?>
<div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
UID Sudah Terdaftar, silahkan gunakan kartu lain.
</font>
</div>
<?php } else {
    $send = mysqli_query($konek,"INSERT INTO user (id, rfid, nama, tanggal)
    VALUES (NULL, '$uid', '$nama','$date')");

if ($send){ ?>
    <div class="alert alert-success">
<font color="black">
<strong>Success: </strong> <br />
Kartu berhasil di registrasi<br>
UID : <?php echo $uid; ?><br>
Nama : <?php echo $nama; ?><br>                       
</font>
</div>
<?php } else { ?>
    <div class="alert alert-danger">
<font color="black">
<strong>Failed: </strong> <br />
Data Gagal ditambahkan , Ulang lagi
<?php echo $send; ?>
</font>
</div>
<?php }

}   ?>