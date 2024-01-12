<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
include 'koneksi.php';
 
// menangkap data yang dikirim dari form
$user = $_POST['user'];
$password = $_POST['password'];
 
// menyeleksi data user dengan user dan password yang sesuai
$result = mysqli_query($koneksi,"SELECT * FROM admin where user='$user' and password='$password'");

$cek = mysqli_num_rows($result);
 
if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, nama, status dan id login
	$_SESSION['user'] = $user;
	$_SESSION['status'] = "sudah_login";
	$_SESSION['id_admin'] = $data['id_admin'];
	header("location:index.php");
} else {
	header("location:login.php?pesan=gagal login data tidak ditemukan.");
}
?>
