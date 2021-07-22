<?php require_once('./header.php') ?>
<?php $db=dbConnect();
$data=mysqli_query($conn,"SELECT m.nama_minuman, p.jumlah_pesanan, m.stok, m.harga_minuman FROM pesanan as p JOIN minuman as m USING(id_minuman) ORDER BY tanggal desc"); ?>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Pesanan</h1>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card bg-dark">
                  <div class="card-header">
                    <h4 class="text-white">Info Pesanan Masuk</h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-danger"
                        >View More <i class="fas fa-chevron-right"></i
                      ></a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                      <table class="table table-dark table-striped">
                        <tr>
                          <th>No</th>
                          <th>Nama Minuman</th>
                          <th>Harga</th>
                          <th>Qty</th>
                          <th>Total Harga</th>
                          <th>Status</th>
                        </tr>
                        <?php 
                        $no = 1;
                        foreach($data as $d) :
                        ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $d['nama_minuman']; ?></td>
                          <td><?= $d['harga_minuman']; ?></td>
                          <td><?= $d['jumlah_pesanan']; ?></td>
                          <td><?= $d['harga_minuman'] * $d['jumlah_pesanan']; ?></td>
                          <td>
                            <?php 
                              if ($d['stok'] > $d['jumlah_pesanan']) {
                                echo '<div class="badge badge-success">DITERIMA</div>';
                              } else {
                                echo '<div class="badge badge-danger">DITOLAK</div>';
                              }
                            ?>                            
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
<?php require_once('./footer.php') ?>
</body>
</html>