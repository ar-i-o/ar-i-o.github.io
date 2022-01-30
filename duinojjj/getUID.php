<?php
include 'config.php';
	$UIDresult=$_POST["UIDresult"];
	$Write="<?php $" . "UIDresult='" . $UIDresult . "'; " . "echo $" . "UIDresult;" . " ?>";
	file_put_contents('UIDContainer.php',$Write);

	$data = mysqli_query($konek,"SELECT * FROM user WHERE rfid = '$UIDresult'");
	$data_count = mysqli_num_rows($data);
	if($data_count !== 0) {
		$info_data = mysqli_fetch_array($data);
		$nama_data = $info_data['nama'];
		$send = mysqli_query($konek,"INSERT INTO history (id, rfid, nama, tanggal,waktu)
        VALUES (NULL, '$UIDresult', '$nama_data','$date','$time')");
		echo "akses_diterima";
	} else {
		echo "akses_ditolak";
	}
?>