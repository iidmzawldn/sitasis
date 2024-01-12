	<?php include('koneksi.php'); ?>
		<div class="box box-info">
		<div class="box-header with-border">
		<font color="black">
				<h3>Data Kelas</h3>
		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_kelas = $_GET['id_kelas'];
			$data_kelas = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit Data Kelas</div>
				<div class="panel-body">
			<form action="edit_kelas.php?id_kelas=<?php echo $id_kelas ?>" method="post">
						<div class="form-group">
								<input type="text" name="tingkat" class="form-control" placeholder="Tingkat" value="<?php echo $data_kelas['tingkat'] ?>"></div>
						<div class="form-group">
								<input type="text" name="nama_jurusan" class="form-control" placeholder="Jurusan" value="<?php echo $data_kelas['nama_jurusan'] ?>"></div>
						<div class="form-group">
								<input type="submit" name="aksi" value="Simpan" class="btn btn-success "></div>
			</form>
			</div>
			</div>
			<?php
		}
		?>
		<table class="table table-bordered">
			<table class="table table-bordered example2" >
				<thead>
			<tr>
				<td width="40">No</td>
				<td>Tingkat</td>
				<td>Jurusan</td>
				<td width="70">Aksi</td>
			</tr>
				</thead>
			<?php
			$No=1;
			$query=mysqli_query($koneksi, 'SELECT * from kelas');
			while ($kelas=mysqli_fetch_array($query)) {
			?>
				<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $kelas['tingkat'] ?></td>
				<td><?php echo $kelas['nama_jurusan'] ?></td>
				<td>
					<a href="index.php?menu=data_kelas&aksi=edit&id_kelas=<?php echo $kelas['id_kelas'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="hapus_data_kelas.php?id_kelas=<?php echo $kelas['id_kelas'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
				</tbody>
			<?php
			$No++;
			}
			?>
		</table>
		<button class="btn btn-info" data-toggle="modal" data-target="#tambah">
					<span class="glyphicon glyphicon-plus"></span>
					Tambah Data Kelas
				</button>
				<div class="modal fade" id="tambah">
					<div class="modal-dialog">
					<div class="modal-content">
						<form action="tambah_data_kelas.php" method="post">
					<div class="modal-header"><span class="close" data-dismiss="modal">&times;</span><h4>Tambah Data Kelas</h4></div>
					<div class="modal-body">
						<div class="form-group">
								<input type="text" name="tingkat" class="form-control" placeholder="Tingkat"></div>
						<div class="form-group">
								<input type="text" name="nama_jurusan" class="form-control" placeholder="Nama Jurusan"></div>
						</div>
					<div class="modal-footer">
						<button class="btn btn-default" data-dismiss="modal">
							Batal
						</button>
						<input type="reset" value="Reset" class="btn btn-warning">
						<input type="submit" name="aksi" value="Simpan" class="btn btn-success">
					</div>
					</form>
				</div>
				</div>
					</div>
					</div>
					</div>
	</font>
	</div>