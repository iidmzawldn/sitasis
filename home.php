<?php
include('koneksi.php');
$jumlah_user=mysqli_num_rows(mysqli_query($koneksi, 'SELECT * FROM admin where id_admin'));
$jumlah_saldo=mysqli_fetch_array(mysqli_query($koneksi, 'SELECT sum(saldo) FROM siswa where id_siswa'));
$jumlah_nasabah=mysqli_num_rows(mysqli_query($koneksi,'SELECT * FROM siswa where id_siswa'));
?>

<body style="font-family: ELEGANT TYPEWRITER;">              
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner" style="height: 120px;">
              <h3 style="font-family: Bohemian typewriter; font-size: 20px;">
                
                <?php
                  echo $jumlah_user;
                  ?>

              </h3>

              <p>User</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="?menu=admin" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner" style="height: 120px;">
              <h3 style="font-family: Bohemian typewriter; font-size: 20px;">
                
                RP. 
                  <?php
                  echo number_format($jumlah_saldo[0]);
                  ?>
                  ,-

              </h3>

              <p>Saldo</p>
            </div>
            <div class="icon">
              <i class="fa fa-usd"></i>
            </div>
            <a class="small-box-footer">Jumlah Saldo</a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner" style="height: 120px;">

              <h3 style="font-family: Bohemian typewriter; font-size: 20px;"><?php
                  echo $jumlah_nasabah;
                  ?>
                  </h3>

              <p>Data Nasabah</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?menu=data_nasabah" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner" style="height: 120px;">

              <p>Info Transaksi</p>
            </div>
            <div class="icon">
              <i class="fa fa-list-alt"></i>
            </div>
            <a href="?menu=transaksi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      

<div class="col-md-6">
  <div class="panel panel-primary">
    <div class="panel-heading">
      Transaksi Menabung
    </div>
    <div class="panel-body">
  <form action="proses_transaksi_menabung.php" method="post">
    <div class="form-group">
    <input type="text" name="nis" class="form-control" placeholder="Masukan NIS">
  </div>
    <div class="form-group">
    <input type="text" name="nominal" class="form-control" placeholder="Masukan Nominal">
  </div>
  <div class="form-group">
    <input type="submit" value="Simpan" class="btn btn-primary">
  </div>
  </form>   
    </div>
  </div>
</div>


<div class="col-md-6">
<div class="panel panel-primary">
    <div class="panel-heading">
      Transaksi Penarikan
    </div>
    <div class="panel-body">
      <form action="proses_transaksi_penarikan.php" method="post">
    <div class="form-group">
    <input type="text" name="nis" class="form-control" placeholder="Masukan NIS">
  </div>
    <div class="form-group">
    <input type="text" name="nominal" class="form-control" placeholder="Masukan Nominal">
  </div>
  <div class="form-group">
    <input type="submit" value="Simpan" class="btn btn-primary">
  </div>
  </form>   
    </div>
  </div>
</div>
</div>

</body>