	<?php include('koneksi.php'); ?>
	<div class="box box-info">
	<div class="box-header with-border">
		<font color="black">
				<h3>Laporan</h3>
<form action="" method="GET">
	<input type="hidden" name="menu" value="laporan">
        <div class="form-group no-print">
          <div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="range" class="form-control" id="reservation" value="<?= (!empty($_GET['range']))?$_GET['range']:"" ?>" style="width: 200px;margin-right: 10px;">
              <button class="btn btn-primary">
                <i class="fa fa-refresh"></i>
              </button>
          </div>
        </div>
        </form>
		<?php
		if(isset($_GET['aksi'])){
			$aksi = $_GET['aksi'];
		}else{
			$aksi = " ";
		}
		if($aksi=='edit'){
			$id_menabung = $_GET['id_menabung'];
			$laporan = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM transaksi WHERE id_menabung='$id_menabung'"));
			?>
			<?php
		}
		?>
		<table class="table table-bordered">
			<tr>
				<td width="40">No</td>
				<td>NIS</td>
				<td>Nama</td>
				<td>Proses</td>
				<td>Nilai</td>
				<td>Tanggal</td>
			</tr>
			<?php
			$No=1;
            if(isset($_GET['range'])){
				$range = $_GET['range'];
			}else{
				$range = "";
			}
            if(!empty($range)){
	    	$range = explode("-",trim($_GET['range']));
	          $start = date("Y/m/d",strtotime($range[0]));
	          $end = date("Y/m/d",strtotime($range[1]));
			$query=mysqli_query($koneksi, "SELECT transaksi.*,siswa.* from transaksi,siswa WHERE transaksi.nis=siswa.nis AND tanggal BETWEEN '$start' AND '$end'");
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
			}
			?>
		</table>
		<button class="btn btn-success no-print" data-toggle="modal" data-target="#tambah" onclick="print()">
					<span class="glyphicon glyphicon-print"></span>
					Print Laporan
		</button>
			</div>
		</form>

	</font>
	</div>
	</div>