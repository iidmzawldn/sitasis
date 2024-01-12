<?php
include('koneksi.php');
$id_siswa=$_GET['id_siswa'];
$nis=$_POST['nis'];
$nama=$_POST['nama'];
$ttl=$_POST['ttl'];
$kelas=$_POST['kelas'];
$jenis_kelamin=$_POST['jenis_kelamin'];
$no_hp=$_POST['no_hp'];
$saldo=$_POST['saldo'];
$tambah = mysqli_query($koneksi, "UPDATE siswa SET nis='$nis',nama='$nama',ttl='$ttl',kelas='$kelas',jenis_kelamin='$jenis_kelamin',no_hp='$no_hp',saldo='$saldo' WHERE id_siswa='$id_siswa'");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Edit Data Berhasil");
			document.location='index.php?menu=data_nasabah';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Data Admin");
			document.location='index.php?menu=data_nasabah';
		</script>

		<?php
	}
?>