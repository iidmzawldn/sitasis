<?php
include('koneksi.php');
$id_kelas=$_GET['id_kelas'];
$hapus = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");
if($hapus){
	?>

		<script type="text/javascript">
			window.alert("Hapus Data Berhasil");
			document.location='index.php?menu=data_kelas';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Hapus Data");
			document.location='index.php?menu=data_kelas';
		</script>

		<?php
	}
?>