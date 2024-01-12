	<?php include('koneksi.php'); ?>
	<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
				<h3>Data Transaksi</h3>
		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_menabung = $_GET['id_menabung'];
			$transaksi = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_menabung='$id_menabung'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit Data Transaksi</div>
				<div class="panel-body">
			<form action="edit_transaksi.php?id_menabung=<?php echo $id_menabung ?>" method="post">
						<div class="form-group">
								<input type="text" name="nis" class="form-control" placeholder="Masukan NIS" value="<?php echo $transaksi['nis'] ?>"></div>
						<div class="form-group">
								<input type="text" name="proses" class="form-control" placeholder="Masukan Proses" value="<?php echo $transaksi['proses'] ?>"></div>
						<div class="form-group">
								<input type="text" name="nilai" class="form-control" placeholder="Masukan Nilai" value="<?php echo $transaksi['nilai'] ?>"></div>
						<div class="form-group">
								<input type="text" name="tanggal" class="form-control" placeholder="Masukan Tanggal" value="<?php echo $transaksi['tanggal'] ?>"></div>
						<div class="form-group">
								<input type="submit" name="aksi" value="Simpan" class="btn btn-success "></div>
			</form>
			</div>
			</div>
		<?php
		}
		?>
		<table class="table table-bordered">
			<tr>
				<td width="40">No</td>
				<td>Nis</td>
				<td>Nama</td>
				<td>Proses</td>
				<td>Nilai</td>
				<td>Tanggal</td>
			</tr>
			<?php
			$No=1;
			$query=mysqli_query($koneksi, 'SELECT transaksi.*,siswa.* from transaksi,siswa WHERE transaksi.nis=siswa.nis');
			while ($transaksi=mysqli_fetch_array($query)) {
			?>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $transaksi['nis'] ?></td>
				<td><?php echo $transaksi['nama'] ?></td>
				<td><?php echo $transaksi['proses'] ?></td>
				<td><?php echo $transaksi['nilai'] ?></td>
				<td><?php echo $transaksi['tanggal'] ?></td>
			</tr>
			<?php
			$No++;
			}
			?>
		</table>
	</div>
	</font>
	</div></div>