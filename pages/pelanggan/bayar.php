<?php require_once('./header.php') ?>


<?php 
$dp=$_SESSION["nama_pelanggan"];
?>

<!-- Main Content -->
<div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Pesanan</h1>
            </div>
            <?php
$db=dbConnect();
$batas = 10;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

  $previous = $halaman - 1;
  $next = $halaman + 1;
  
	$data=mysqli_query($conn,"select m.nama_minuman, p.total_pembayaran, p.tgl_pembayaran from pembayaran as p join minuman as m join pesanan as ps WHERE ps.id_minuman = m.id_minuman and ps.id_pesanan = p.id_pesanan and p.nama_pelanggan = '$dp'");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman_2akhir = $total_halaman - 1;
$adjacents = "2";

$data_produk = mysqli_query($conn,"select m.nama_minuman, p.total_pembayaran, p.tgl_pembayaran, p.status from pembayaran as p join minuman as m join pesanan as ps WHERE ps.id_minuman = m.id_minuman and ps.id_pesanan = p.id_pesanan and p.nama_pelanggan = '$dp' limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
       ?> 
            <div class="row">
                <table class="table table-dark text-white text-center table-striped table-responsive-sm">
                <tr>
                    <th>No</th><th>Nama Minuman</th><th>Total Bayar</th><th>Status</th>
                </tr>
                <?php
                $no = 1;
  while($d = mysqli_fetch_array($data_produk)){
    ?>     
    <tr>
        <td><?= $no++; ?></td>
        <td><?php echo $d["nama_minuman"] ?></td>
        <td><?php echo $d["total_pembayaran"] ?></td>
        <td>
        
        <?php 
            if($d['status'] == 2){
                echo '<div class="badge badge-danger">BELUM LUNAS</div></td>';
            } else {
                echo '<div class="badge badge-success">LUNAS</div></td>';
            }
        ?>
        
        
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