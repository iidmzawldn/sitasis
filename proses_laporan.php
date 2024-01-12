<?php 
include("koneksi.php");
$query=mysqli_query($koneksi, 'SELECT FROM transaksi WHERE tanggal >=' . $_post
	['tgl_awal'] . AND tanggal >=' . $_post['tgl_akhir'].');
 ?>