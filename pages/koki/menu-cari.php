<?php require_once('./header.php') ?>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Menu</h1>
            </div>
            <div class="row">
              <div class="mb-4 p-3">
                <button class="btn btn-dark btn-lg" name="TblTambah" data-toggle="modal" data-id="modal" data-target="#tambah_modal">
                Tambah</button>
              </div>
              <div class="mb-4 p-3">
                <form method="POST" action="menu-cari.php" class="needs-validation">
                  <div class="input-group">
                    <input type="text" class="form-control" name="cari" placeholder="Search" required="">
                    <div class="input-group-btn">
                      <button class="btn btn-dark" name="TblCari"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
                <!-- <div class="col-lg-12 col-md-12"> -->
<?php
if(isset($_POST["TblCari"]))
$db=dbConnect();
$batas = 10;
$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
$dicari=$db->escape_string($_POST["cari"]);
  $previous = $halaman - 1;
  $next = $halaman + 1;
  
	$data=mysqli_query($conn,"SELECT * FROM minuman where nama_minuman like '%$dicari%'");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);
$halaman_2akhir = $total_halaman - 1;
$adjacents = "2";

$data_produk = mysqli_query($conn,"SELECT * FROM minuman where nama_minuman like '%$dicari%' limit $halaman_awal, $batas");
				$nomor = $halaman_awal+1;
        if($jumlah_data){
       ?> 
       <div class="row">
                  <table class="table table-dark text-white text-center table-striped table-responsive-sm">
                    <tr>
                        <th>No</th><th>Nama Minuman</th><th>Stok Tersedia</th>
                        <th>Harga</th><th>Status</th><th colspan="2">Aksi</th>
                    </tr> 
                    <?php
  while($d = mysqli_fetch_array($data_produk)){
    ?>     
                    <tr>
                        <td><?php echo $d["id_minuman"] ?></td>
                        <td><?php echo $d["nama_minuman"] ?></td>
                        <td><?php echo $d["stok"] ?></td>
                        <td><?php echo $d["harga_minuman"] ?></td>
                        <?php 
                          if($d['stok'] == 0){
                        ?>
                        <td>
                        <div>
                                <a class="TblTampil btn btn-warning shadow-none" href="" name="TblTampil" data-toggle="modal" data-id="modal" data-target="#tampil_modal">TAMPILKAN
                                </a>
                            </div>
                        </td>
                        <?php 
                        } else { 
                          ?>
                          <td>
                        <div>
                                <button class="btn btn-primary shadow-none" href="" name="" readonly>DITAMPILKAN
                                </button>
                            </div>
                        </td>
                        <?php } ?>
                        <td>
                            <div>
                                <a class="TblEdit" href="" name="TblEdit" data-toggle="modal" data-id="modal" data-target="#edit_modal"><i class="far fa-edit"></i>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div>
                                <a class="TblDelete" href="" name="TblDelete" data-toggle="modal" data-id="modal" data-target="#delete_modal"><i class="far fa-trash-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
			<?php
		}
		?>
		</table>
    <?php
  } else {
  ?>
            <div class="row justify-content-center">
                    <div class="empty-state" data-height="400">
                      <div class="empty-state-icon">
                        <i class="fas fa-question"></i>
                      </div>
                      <h2>Data tidak ditemukan</h2>
                      <p class="lead">
                        Kami tidak bisa menemukan data yang kamu cari, coba kata kunci lain.
                      </p>
                      <a href="javascript:history.back()" class="btn btn-primary mt-4">Menu</a>
                    </div>
            </div>
  <?php
  }
  ?>
            </div>
            <!-- </div> -->
            <!-- </div> -->
            <div class="row">
                <div class="col">
                <nav aria-label="Search results">
			<ul class="pagination justify-content-left">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php 
        if ($total_halaman <= 10){  	 
          for ($x = 1; $x <= $total_halaman; $x++){
          if ($x == $halaman) {
            ?>
          <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>	
          <?php
                  }else{
                ?>
          <li class="page-item" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                        }
                }
                ?>
                <li class="page-item">
                <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
              </li>
              <?php
        } else {
      if($halaman <= 4 ){
				for($x=1;$x < 6;$x++){
          if($x == $halaman){
            ?>
            <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
          } else {
            ?>
            <li class="page-item" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
          }
				}
					?> 
        <li class="page-item">
        <li><a class="page-link" href="">...</a></li>
        </li>	
        <li class="page-item">
        <li><a class="page-link" href="?halaman=<?php echo $halaman_2akhir ?>"><?php echo $halaman_2akhir; ?></a></li>
        </li>			
        <li class="page-item">
        <li><a class="page-link" href="?halaman=<?php echo $total_halaman ?>"><?php echo $total_halaman; ?></a></li>
        </li>	
					<?php
      } elseif($halaman > 4 && $halaman < $total_halaman - 3){
        ?>
        <li class="page-item">
        <li><a class="page-link" href="?halaman=1">1</a></li>
        </li>	
        <li class="page-item">
        <li><a class="page-link" href="?halaman=2">2</a></li>
        </li>		
        <li class="page-item">
        <li><a class="page-link" href="">...</a></li>
        </li>	
        <?php
        for ($x = $halaman - $adjacents;$x <= $halaman + $adjacents;$x++){
          if($x == $halaman){
            ?>
            <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
          } else {
            ?>
            <li class="page-item" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
          }
        }
        ?>
                <li class="page-item">
        <li><a class="page-link" href="">...</a></li>
        </li>	
        <li class="page-item">
        <li><a class="page-link" href="?halaman=<?php echo $halaman_2akhir ?>"><?php echo $halaman_2akhir; ?></a></li>
        </li>			
        <li class="page-item">
        <li><a class="page-link" href="?halaman=<?php echo $total_halaman ?>"><?php echo $total_halaman; ?></a></li>
        </li>	
        <?php
      } else {
        ?>
        <li class="page-item">
        <li><a class="page-link" href="?halaman=1">1</a></li>
        </li>	
        <li class="page-item">
        <li><a class="page-link" href="?halaman=2">2</a></li>
        </li>		
        <li class="page-item">
        <li><a class="page-link" href="">...</a></li>
        </li>	
        <?php
        for ($x = $total_halaman - 4;$x <= $total_halaman;$x++){
          if($x == $halaman){
            ?>
            <li class="page-item active" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
          } else {
            ?>
            <li class="page-item" aria-current="page"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
          }
        }
      }
				?>	
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
        <?php
        }
        ?>
			</ul>
		</nav>
    <?php include_once("./footer.php");?>

<!-- Modal TAMPIL-->
<div class="modal fade" id="tampil_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tampilkan Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="">
        <div class="row">
            <div class="form-group col-md-8 col-12">
            <tr>
                <td>Stok untuk hari ini</td>
                <td><input type="number" class="form-control" id="id_minumanq" name="id_minuman" maxlength="15" required></td>
            </tr>
            </div>
        </div>            
    </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" name="TblTampil">Submit</button>
      </div>
    </div>
  </div>
          </form>
</div>

<!-- Modal DELETE-->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="menu-hapus.php">
        <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Id Minuman</td>
                  <td><input type="text" class="form-control" id="id_minumanqq" name="id_minuman" maxlength="15" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama</td>
                  <td><input type="text" class="form-control" name="nama_barang" id="namaq" maxlength="50" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Stok Tersedia</td>
                  <td><input type="text" class="form-control" name="stok" id="stokq" maxlength="6" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Harga</td>
                  <td><input type="text" class="form-control" id="hargaq" name="harga" maxlength="10" readonly></td>
                </tr>
              </div>
            </div>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button class="btn btn-danger" name="TblHapus">Hapus</button>
      </div>
    </div>
  </div>
          </form>
</div>

<script>
  $(document).ready(function(){
    $('.TblDelete').on('click', function(){
      $('#delete_modal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      
      $('#id_minumanqq').val(data[0]);
      $('#namaq').val(data[1]);
      $('#stokq').val(data[2]);
      $('#hargaq').val(data[3]);
    })
  })
</script>

<!-- Modal EDIT-->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="menu-update.php">
        <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Id Minuman</td>
                  <td><input type="text" class="form-control" id="id_minuman" name="id_minuman" maxlength="15" readonly></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama</td>
                  <td><input type="text" class="form-control" name="nama_minuman" id="nama" maxlength="50" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Harga</td>
                  <td><input type="text" class="form-control" id="harga" name="harga_minuman" maxlength="10" required=""></td>
                </tr>
              </div>
            </div>
          </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button class="btn btn-warning" name="TblUpdate">Simpan</button>
      </div>
    </div>
  </div>
          </form>
</div>

<script>
  $(document).ready(function(){
    $('.TblEdit').on('click', function(){
      $('#edit_modal').modal('show');

      $tr = $(this).closest('tr');

      var data = $tr.children("td").map(function(){
        return $(this).text();
      }).get();
      
      $('#id_minuman').val(data[0]);
      $('#nama').val(data[1]);
      $('#stok').val(data[2]);
      $('#harga').val(data[3]);
    })
  })
</script>
<!-- Modal TAMBAH-->
<div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="menu-tambah.php" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Nama Minuman</td>
                  <td><input type="text" class="form-control" name="nama_minuman" maxlength="50" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Harga</td>
                  <td><input type="text" class="form-control" name="harga_minuman" maxlength="10" required=""></td>
                </tr>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <tr>
                  <td>Gambar</td>
                  <td><input class="form-control" type="file" id="formFile" name="gambar" required></td>
                </tr>
              </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button class="btn btn-warning" name="TblSimpan">Simpan</button>
      </div>
    </div>
  </div>
</form>
</div>
  </body>
</html>