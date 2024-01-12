<?php
include('koneksi.php');
$nis=$_POST['nis'];
$nama=$_POST['nama'];
$ttl=$_POST['ttl'];
$kelas=$_POST['kelas'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$no_hp=$_POST['no_hp'];
$saldo=$_POST['saldo'];
$tambah = mysqli_query($koneksi, "INSERT into siswa values('','$nis','$nama','$ttl','$kelas','$jenis_kelamin','y','$no_hp','$saldo')");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Tambah Data Berhasil");
			document.location='index.php?menu=data_nasabah';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Tambah Data");
			document.location='index.php?menu=data_nasabah';
		</script>

		<?php
	}
?>