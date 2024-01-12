<?php
include('koneksi.php');
$id_kelas=$_GET['id_kelas'];
$tingkat=$_POST['tingkat'];
$nama_jurusan=$_POST['nama_jurusan'];
$tambah = mysqli_query($koneksi, "UPDATE kelas SET tingkat='$tingkat',nama_jurusan='$nama_jurusan' WHERE id_kelas='$id_kelas'");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Edit Data Berhasil");
			document.location='index.php?menu=data_kelas';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Edit Data");
			document.location='index.php?menu=data_kelas';
		</script>

		<?php
	}
?>