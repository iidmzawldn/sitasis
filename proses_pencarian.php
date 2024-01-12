<?php include('koneksi.php'); ?>
<div class="well" style="min-height: 650px">
	<table class="table table-bordered" style="color: black;">
			<tr>
				<td width="40">No</td>
				<td>NIS</td>
				<td>Nama</td>
				<td>TTL</td>
				<td>Kelas</td>
				<td>Jenis Kelamin</td>
				<td>No. HP</td>
				<td>Saldo</td>
			</tr>
			<?php
			$No=1;
			$q = $_GET['q'];
			$query=mysqli_query($koneksi, "SELECT siswa.*,kelas.* from siswa,kelas WHERE siswa.nama LIKE '%$q%' AND siswa.kelas=kelas.id_kelas");
			echo mysqli_error($koneksi);
			while ($siswa=mysqli_fetch_array($query)) {
			?>
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
				<td><?php echo $siswa['saldo'] ?></td>
			</tr>
			<?php
			$No++;
			}
			?>
		</table>
</div>