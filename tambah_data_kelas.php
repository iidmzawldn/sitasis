<?php
include('koneksi.php');
$tingkat=$_POST['tingkat'];
$nama_jurusan=$_POST['nama_jurusan'];
$tambah = mysqli_query($koneksi, "INSERT into kelas values('','$tingkat','$nama_jurusan')");
if($tambah){
	?>

		<script type="text/javascript">
			window.alert("Tambah Data Berhasil");
			document.location='index.php?menu=data_kelas';
		</script>

		<?php

}else{
		?>

		<script type="text/javascript">
			window.alert("Gagal Tambah Data");
			document.location='index.php?menu=data_kelas';
		</script>

		<?php
	}
?>