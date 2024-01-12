	<?php include('koneksi.php'); ?>
	<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
				<h3>Data Nasabah Siswa</h3>
		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_siswa = $_GET['id_siswa'];
			$data_nasabah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id_siswa'"));
			?>
			<div class="panel panel-info">
				<div class="panel-heading">Edit Data Nasabah</div>
				<div class="panel-body">
			<form action="edit_nasabah.php?id_siswa=<?php echo $id_siswa ?>" method="post">
						<div class="form-group">
								<input type="text" name="nis" class="form-control" placeholder="Masukan Nis" value="<?php echo $data_nasabah['nis'] ?>"></div>
						<div class="form-group">
								<input type="text" name="nama" class="form-control" placeholder="Masukan Nama" value="<?php echo $data_nasabah['nama'] ?>"></div>
						<div class="form-group">
								<input type="text" name="ttl" class="form-control" placeholder="Masukan TTL" value="<?php echo $data_nasabah['ttl'] ?>"></div>
						<div class="form-group">
								<input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas" value="<?php echo $data_nasabah['kelas'] ?>"></div>
						<div class="form-group">
								<input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukan Jenis Kelamin" value="<?php echo $data_nasabah['jenis_kelamin'] ?>"></div>
						<div class="form-group">
								<input type="text" name="no_hp" class="form-control" placeholder="Masukan No.HP" value="<?php echo $data_nasabah['no_hp'] ?>"></div>
						<div class="form-group">
								<input type="text" name="saldo" class="form-control" placeholder="Masukan Saldo" value="<?php echo $data_nasabah['saldo'] ?>"></div>
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
				<td>NIS</td>
				<td>Nama</td>
				<td>TTL</td>
				<td>Kelas</td>
				<td>Jenis Kelamin</td>
				<td>No. HP</td>
				<td>Saldo</td>
				<td width="70">Aksi</td>
			</tr>
				</thead>
			<?php
			$No=1;
			$query=mysqli_query($koneksi, 'SELECT siswa.*,kelas.* from siswa,kelas WHERE siswa.kelas=kelas.id_kelas');
			while ($siswa=mysqli_fetch_array($query)) {
			?>
				<tbody>
			<tr>
				<td><?php echo $No ?></td>
				<td><?php echo $siswa['nis'] ?></td>
				<td><?php echo $siswa['nama'] ?></td>
				<td><?php echo $siswa['ttl'] ?></td>
				<td><?php echo $siswa['tingkat'] ?> <?php echo $siswa['nama_jurusan'] ?></td>
				<td>
					<?php
					if($siswa['jenis_kelamin']=="l"){
						echo "Laki-Laki";
					}else{
						echo "Perempuan";
					}
					?>		
				</td>
				<td><?php echo $siswa['no_hp'] ?></td>
				<td>RP. <?php echo number_format($siswa['saldo']) ?>,-</td>
				<td>
					<a href="index.php?menu=info_siswa" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-info-sign"></span></a>
					<a href="index.php?menu=data_nasabah&aksi=edit&id_siswa=<?php echo $siswa['id_siswa'] ?>" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
					<a href="hapus_nasabah.php?id_siswa=<?php echo $siswa['id_siswa'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('apakah anda yakin ingin menghapus?')"><span class="glyphicon glyphicon-trash"></span></a>
				</td>
			</tr>
			<?php
			$No++;
			}
			?>
				</tbody>
		</table>
		<button class="btn btn-info" data-toggle="modal" data-target="#tambah">
					<span class="glyphicon glyphicon-plus"></span>
					Tambah Data Nasabah
				</button>
				<div class="modal fade" id="tambah">
					<div class="modal-dialog">
					<div class="modal-content">
						<form action="tambah_nasabah.php" method="post">
					<div class="modal-header"><span class="close" data-dismiss="modal">&times;</span><h4>Tambah Data Nasabah</h4></div>
					<div class="modal-body">
						<div class="form-group">
								<input type="text" name="nis" class="form-control" placeholder="Masukan Nis"></div>
						<div class="form-group">
								<input type="text" name="nama" class="form-control" placeholder="Masukan Nama"></div>
						<div class="form-group">
								<input type="text" name="ttl" class="form-control" placeholder="Masukan TTL"></div>
						<div class="form-group">
								<select name="kelas" class="form-control" placeholder="Masukan Kelas">
									<?php
									$query = mysqli_query($koneksi, "select * from kelas");
									while($kelas = mysqli_fetch_array($query)){
									?>
									<option value="<?php echo $kelas['id_kelas'] ?>"><?php echo $kelas['tingkat'] ?> <?php echo $kelas['nama_jurusan'] ?></option>
									<?php } ?>
								</select></div>
						<div class="form-group">
							<input type="radio" value="l" name="jenis_kelamin" placeholder="Masukan Jenis Kelamin">Laki-Laki
							<input type="radio" value="p" name="jenis_kelamin" placeholder="Masukan Jenis Kelamin">Perempuan
							</div>
						<div class="form-group">
								<input type="text" name="no_hp" class="form-control" placeholder="Masukan No. HP"></div>
						<div class="form-group">
								<input type="text" name="saldo" class="form-control" placeholder="Masukan Saldo"></div>
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
				
	</font>
	</div>
</div>
</div>