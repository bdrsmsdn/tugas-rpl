<?php require_once('./header.php') ?>
<?php
$db=dbConnect();
$data=mysqli_query($conn,"SELECT * FROM minuman");
?>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Pesanan</h1>
            </div>
            <div class="row"> 
              <div class="col-md-3">
                <div class="mb-4">
                  <div class="input-group">
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama pelanggan" required="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <?php foreach($data as $d) : ?>
                <form method="post" action="tambah.php?id=<?= $d['id_minuman']; ?>">
                  <input type="hidden" name="id_minum" value="<?= $d['id_minuman']; ?>" class="form-control"></input>
                  <input type="hidden" name="hrgmn" value="<?= $d['harga_minuman']; ?>" class="form-control"></input>
                  <input type="hidden" name="nmmn" value="<?= $d['nama_minuman']; ?>" class="form-control"></input>
                <div class="col-md-3">
                    <div class="card-warning bg-dark mb-3" style="width: 14rem;">
                        <img src="../../upload/menu/<?= $d['gambar']; ?>" width="100px" height="200px" class="card-img-top" style="position: relative;" alt="...">
                        <div class="card-body">
                          <div class="row">
                            <h5 class="card-title"><?= $d['nama_minuman']; ?></h5>
                          </div>
                          <div class="row">
                            <h6 class="card-subtitle mb-3">Rp. <?= $d['harga_minuman']; ?></h6>
                          </div>
                          <div class="row row-mt-5 justify-content-center">
                            <div class="col-sm-4">
                              <input type="text" name="qty" value="1" class="form-control"></input>
                            </div>
                          </div>
                            
                        </div>
                        <div class="card-footer text-center">    
                          <div class="row">
                            <button type="submit" name="TblBeli" class="btn btn-warning btn-block shadow-none"><i class="fas fa-cart-plus"></i></button>
                          </div>
                        
                        </div>
                    </div>
                  </div>
                </form>
                <?php endforeach; ?>
              </div>
            </div>
          </section>
        </div>
        <?php require_once('./footer.php') ?>
<!-- Modal Beli-->
<div class="modal fade" id="modal_beli" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" name="frm" class="needs-validation" action="">
        <div class="row">
            <div class="form-group col-md-8 col-12">
              <?php 
              if(isset($_POST['id_minuman'])){
                $id = $_POST['id_minuman'];

                $sqlq = mysqli_query($conn, "SELECT * FROM minuman WHERE id_minuman = $id");
                while($dd = mysqli_fetch_array($sqlq)){
               ?>
            <tr>
                <td>Nama Pelanggan</td>
                <td><input type="text" class="form-control" id="id_minumanq" name="id_minuman" maxlength="15" required></td>
            </tr>
            <tr>
                <td>Nama Minuman</td>
                <td><input type="text" value="<?= $dd['nama_minuman'] ?>" class="form-control" id="id_minumanq" name="id_minuman" maxlength="15" hidden></td>
            </tr>
            <tr>
                <td>Jumlah Pesanan</td>
                <td><input type="number" class="form-control" id="id_minumanq" name="id_minuman" maxlength="15" required></td>
            </tr>
            <?php 
                }
          } ?>
            </div>
        </div>            
    </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" name="TblBuy">Submit</button>
      </div>
    </div>
  </div>
          </form>
</div>
</body>
</html> 