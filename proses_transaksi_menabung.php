<?php
include('koneksi.php');
$nis=$_POST['nis'];
$nominal=$_POST['nominal'];
$data_nasabah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'"));
$saldo = ($data_nasabah['saldo']+$nominal);
$menabung = mysqli_query($koneksi, "UPDATE siswa SET saldo='$saldo' WHERE nis='$nis'");
$transaksi = mysqli_query($koneksi, "INSERT into transaksi values('','$nis','masuk','$nominal',NOW())");
if($menabung){
	?>

		<script type="text/javascript">
			window.alert("Menabung Sukses Data Telah Disimpan");
			document.location='index.php';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal");
			document.location='index.php';
		</script>

		<?php
	}
?>