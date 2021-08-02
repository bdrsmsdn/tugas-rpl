<?php require_once('./header.php') ?>


<?php 
$dp=$_SESSION["nama_pelanggan"];
$dpp=$_SESSION["id_pelanggan"];
?>

<!-- Main Content -->
<div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Riwayat Pesanan</h1>
            </div>
            <?php
$db=dbConnect();
$batas = 10;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

  $previous = $halaman - 1;
  $next = $halaman + 1;
  
	$data=mysqli_query($conn,"select m.nama_minuman, p.total_pembayaran, p.tgl_pembayaran from pembayaran as p join minuman as m join pesanan as ps WHERE ps.id_minuman = m.id_minuman and ps.id_pesanan = p.id_pesanan and p.id_pelanggan = '$dpp'");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman_2akhir = $total_halaman - 1;
$adjacents = "2";

$data_produk = mysqli_query($conn,"select p.id_pembayaran, m.nama_minuman, p.total_pembayaran, p.tgl_pembayaran, p.status from pembayaran as p join minuman as m join pesanan as ps WHERE ps.id_minuman = m.id_minuman and ps.id_pesanan = p.id_pesanan and p.id_pelanggan = '$dpp' ORDER BY p.id_pembayaran DESC limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
       ?> 
            <div class="row">
                <table class="table table-dark text-white text-center table-striped table-responsive-sm">
                <tr>
                    <th>No</th><th>ID Pembayaran</th><th>Nama Minuman</th><th>Total Bayar</th><th>Aksi</th>
                </tr>
                <?php
                $no = 1;
  while($d = mysqli_fetch_array($data_produk)){
    ?>     
    <tr>
        <td><?= $no++; ?></td>
        <td><?php echo $d["id_pembayaran"] ?></td>
        <td><?php echo $d["nama_minuman"] ?></td>
        <td><?php echo $d["total_pembayaran"] ?></td>                
        <?php 
            if($d['status'] == 2){
              ?>
                <td><a class="TblBayar shadow-none" href="" name="TblBayar" data-toggle="modal" data-id="modal" data-target="#bayar_modal"><div class="badge badge-dark">BAYAR</div></a></td>
                <?php
            } else if($d['status'] == 3) {
              echo '<td><div class="badge badge-warning">PENDING</div></td>';
            } else {
              ?>
                <td><a href="./invoice.php?id=<?= $d['id_pembayaran']; ?>"><div class="badge badge-success">LUNAS</div></a></td>
              <?php
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
<!-- Modal TAMPIL-->
<div class="modal fade" id="bayar_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="" enctype="multipart/form-data">
          <div class="row">
            <div class="form-group col-md-12 col-12">
              <tr>
                <td>Upload bukti pembayaran (Maks. 2MB)</td>
                <td><input class="form-control" type="file" id="bukti" name="bukti" required></td>
              </tr>
              <tr>
                <td><input type="hidden" class="form-control" id="iddd" name="ed" maxlength="15"></td>
              </tr>
            </div>  
          </div>
          <div class="row">
            <div class="form-group col-md-12 col-12">
              <tr>
                <td>Catatan</td>
                <td><input class="form-control" type="textarea" id="catat" name="catat" placeholder="Tambahkan catatan (opsional)"></td>
              </tr>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" name="TblByr" id="TblByr">Submit</button>
      </div>
    </div>
  </div>
          </form>
</div>

<script>
  $(document).ready(function(){
    $('.TblBayar').on('click', function(){
      $('#bayar_modal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      
      $('#iddd').val(data[1]);
    })
  })
</script>

<?php
if(isset($_POST["TblByr"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
    $ed	   =$db->escape_string($_POST["ed"]);
		$bukti = $_FILES["bukti"]["name"];
		$file_tmp = $_FILES["bukti"]["tmp_name"];
		$size = $_FILES["bukti"]["size"];
		$path ="../../upload/bukti/";
		$imgext = strtolower(pathinfo($bukti, PATHINFO_EXTENSION));
		$validext = array('jpg', 'jpeg', 'png');

		//rename
		$userpic = "bukti".date("Y-m-d").rand(0,9999).".".$imgext;

		if(in_array($imgext, $validext)){
			//check size
			if($size < 2000000){
		// Susun query insert
		$sql = "UPDATE pembayaran SET bukti = '$userpic', status = 3 WHERE id_pembayaran = '$ed'";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				move_uploaded_file($file_tmp, $path.$userpic);
				?>
        <script>
        Swal.fire({
  title: 'Berhasil mengirim bukti pembayaran.',
  text: 'Silakan tunggu pembayaran dikonfirmasi.',
  icon: 'success'
        })
                </script>
				<?php
			}
		} else {
			?>
      <script>
        Swal.fire({
  title: 'Terjadi kesalahan.',
  text: 'Gagal mengirim bukti pembayaran.',
  icon: 'error'
        })
                </script>
			<?php
		}
	} else {
        ?>
          <script>
        Swal.fire({
  title: 'Terjadi kesalahan.',
  text: 'Ukuran file terlalu besar!',
  icon: 'error'
        })
                </script>
        <?php
      }
    } else {
        ?>
        <script>
        Swal.fire({
  title: 'Terjadi kesalahan.',
  text: 'Format file tidak didukung!',
  icon: 'error'
        })
                </script>
        <?php
   }
	} 
} else {
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>

</body>
</html>