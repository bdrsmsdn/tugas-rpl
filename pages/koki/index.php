<?php require_once('./header.php') ?>
<?php $db=dbConnect();
$data=mysqli_query($conn,"SELECT pe.status, m.nama_minuman, p.jumlah_pesanan, m.stok, m.harga_minuman FROM pesanan as p JOIN minuman as m JOIN pembayaran as pe ON p.id_minuman = m.id_minuman AND pe.id_pesanan = p.id_pesanan ORDER BY tanggal desc"); ?>
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
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                      <table class="table table-dark table-striped text-center">
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
                              if ($d['status'] == 1 ) {
                                echo '<div class="badge badge-success">DITERIMA</div>';
                              } else {
                                echo '<div class="badge badge-warning">PENDING</div>';
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