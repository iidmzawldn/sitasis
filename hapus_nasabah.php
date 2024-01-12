<?php
include('koneksi.php');
$id_siswa=$_GET['id_siswa'];
$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");
if($hapus){
	?>

		<script type="text/javascript">
			window.alert("Hapus Data Berhasil");
			document.location='index.php?menu=data_nasabah';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Data");
			document.location='index.php?menu=data_nasabah';
		</script>

		<?php
	}
?>