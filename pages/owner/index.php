<?php 
require_once('./header.php');
$jd1 = mysqli_num_rows(mysqli_query($conn, "select * from minuman"));
$jd2 = mysqli_num_rows(mysqli_query($conn, "select * from pelanggan"));
$jd3 = mysqli_num_rows(mysqli_query($conn, "select * from pesanan"));
 ?>

<!-- Main Content -->
<div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Laporan</h1>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-dark card-statistic-1">
                  <div class="card-icon bg-primary">
                  <i class="fas fa-dollar-sign"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4 class="text-white">Total Pendapatan</h4>
                    </div>
                    <div class="card-body text-white">???</div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-dark card-statistic-1">
                  <div class="card-icon bg-danger">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4 class="text-white">Total Pelanggan</h4>
                    </div>
                    <div class="card-body text-white"><?= $jd2; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-dark card-statistic-1">
                  <div class="card-icon bg-warning">
                    <i class="far fa-file"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4 class="text-white">Total Produk</h4>
                    </div>
                    <div class="card-body text-white"><?= $jd1; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card bg-dark card-statistic-1">
                  <div class="card-icon bg-success">
                    <i class="fas fa-circle"></i>
                  </div>
                  <div class="card-wrap">
                    <div class="card-header">
                      <h4 class="text-white">Total Pesanan</h4>
                    </div>
                    <div class="card-body text-white"><?= $jd3; ?></div>
                  </div>
                </div>
              </div>
            </div>
            <?php
$db=dbConnect();
$batas = 10;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

  $previous = $halaman - 1;
  $next = $halaman + 1;
  
	$data=mysqli_query($conn,"select * from pembayaran where status = 1");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman_2akhir = $total_halaman - 1;
$adjacents = "2";

$data_produk = mysqli_query($conn,"select * from pembayaran where status = 1 limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
       ?> 
            <div class="row">
                <table class="table table-dark text-white text-center table-striped table-responsive-sm">
                <tr>
                    <th>No</th><th>ID Pembayaran</th><th>Total Pembayaran</th><th>Tanggal</th>
                </tr>
                <?php
                $no = 1;
  while($d = mysqli_fetch_array($data_produk)){
    ?>     
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['id_pembayaran']; ?></td>
        <td><?php echo $d["total_pembayaran"] ?></td>
        <td><?php echo $d["tgl_pembayaran"] ?></td>
        
    </tr>
    <?php 
  }
    ?>
                </table>
            </div>
            </div>
              </div>
            </div>
          </section>
        </div>
<?php require_once('./footer.php') ?>
</body>
</html>