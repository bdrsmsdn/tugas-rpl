<?php require_once('./header.php') ?>

<!-- Main Content -->
<div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Transaksi</h1>
            </div>
            <?php
$db=dbConnect();
$batas = 10;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

  $previous = $halaman - 1;
  $next = $halaman + 1;
  
	$data=mysqli_query($conn,"select m.nama_minuman, p.total_pembayaran, p.tgl_pembayaran from pembayaran as p join minuman as m join pesanan as ps WHERE ps.id_minuman = m.id_minuman and ps.id_pesanan = p.id_pesanan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman_2akhir = $total_halaman - 1;
$adjacents = "2";

$data_produk = mysqli_query($conn,"select p.id_pembayaran, p.nama_pelanggan, m.nama_minuman, p.total_pembayaran, p.tgl_pembayaran, p.bukti, p.status, ps.jumlah_pesanan from pembayaran as p join minuman as m join pesanan as ps WHERE ps.id_minuman = m.id_minuman and ps.id_pesanan = p.id_pesanan limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
       ?> 
            <div class="row">
                <table class="table table-dark text-white text-center table-striped table-responsive-sm">
                <tr>
                    <th>No</th><th>ID Pembayaran</th><th>Nama Pelanggan</th><th>Nama Minuman</th><th>Jumlah</th><th>Total Bayar</th><th>Bukti Pembayaran</th><th>Aksi</th>
                </tr>
                <?php
                $no = 1;
  while($d = mysqli_fetch_array($data_produk)){
    ?>     
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $d['id_pembayaran']; ?></td>
        <td><?php echo $d["nama_pelanggan"] ?></td>
        <td><?php echo $d["nama_minuman"] ?></td>
        <td><?php echo $d["jumlah_pesanan"] ?></td>
        <td><?php echo $d["total_pembayaran"] ?></td>
        <td><a href="../../upload/bukti/<?= $d['bukti']; ?>" class="btn btn-dark shadow-none">Lihat</a></td>
        <td>
          <?php 
            if($d['status'] == 3){
              echo '<div>
              <a class="TblKonfir btn btn-warning shadow-none" href="" name="TblKonfir" data-toggle="modal" data-id="modal" data-target="#confirm_modal">KONFIRMASI
              </a>
          </div>';
            } else {
              echo '<div>
              <button class="btn btn-success shadow-none">DIKONFIRMASI
              </button>
          </div>';
            }
          ?>
        </td>
        
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
<!-- Modal Confirm-->
<div class="modal fade" id="confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="confirm.php">
        <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>ID Pembayaran</td>
                  <td><input type="text" class="form-control" name="id" id="idq" maxlength="50" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama Pelanggan</td>
                  <td><input type="text" class="form-control" name="nmp" id="namaq" maxlength="50" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama Minuman</td>
                  <td><input type="text" class="form-control" name="nmm" id="minumq" maxlength="6" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Jumlah</td>
                  <td><input type="text" class="form-control" id="jumlaq" name="jml" maxlength="10" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Total Bayar</td>
                  <td><input type="text" class="form-control" id="hargaq" name="harga" maxlength="10" readonly></td>
                </tr>
              </div>
            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button class="btn btn-warning" name="TblConfirm">Konfirmasi</button>
      </div>
    </div>
  </div>
          </form>
</div>

<script>
  $(document).ready(function(){
    $('.TblKonfir').on('click', function(){
      $('#confirm_modal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      
      $('#idq').val(data[1]);
      $('#namaq').val(data[2]);
      $('#minumq').val(data[3]);
      $('#jumlaq').val(data[4]);
      $('#hargaq').val(data[5]);
    })
  })
</script>
</body>
</html>