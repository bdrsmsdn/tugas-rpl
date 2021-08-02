<?php require_once("./header.php") ?>
<!-- Main Content -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Struk</h1>
          </div>
          <?php 
          $dp=$_SESSION["nama_pelanggan"];
          $dpp=$_SESSION["id_pelanggan"];
          if(isset($_GET["id"])){
            $db=dbConnect();
            $id=$db->escape_string($_GET["id"]);
            if($dataproduk=getStruk($id)){// cari data produk, kalau ada simpan di $data
                ?>
          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number">Order #<?= $dataproduk['id_pembayaran']; ?></div>
                    </div>
                    <hr>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Dikirim ke:</strong><br>
                            <?= $dataproduk['nama_pelanggan']; ?><br>
                            <?= $dataproduk['alamat_pelanggan']; ?>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Dikirim oleh:</strong><br>
                          ERESTO<br>
                          1234 Main<br>
                          Apt. 4B<br>
                          Bandung, Indonesia
                        </address>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <address>
                          <strong>Metode Pembayaran:</strong><br>
                          BCA ****4242<br>
                          <?= $em; ?>
                        </address>
                      </div>
                      <div class="col-md-6 text-md-right">
                        <address>
                          <strong>Order Date:</strong><br>
                          <?= $dataproduk['tgl_pembayaran']; ?><br><br>
                        </address>
                      </div>
                    </div>
                  </div>
                </div>                
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Nama Minuman</th>
                          <th class="text-center">Quantity</th>
                          <th class="text-right">Total Harga</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td><?= $dataproduk['nama_minuman']; ?></td>
                          <td class="text-center"><?= $dataproduk['jumlah_pesanan']; ?></td>
                          <td class="text-right"><?= $dataproduk['total_pembayaran']; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php 
            }
         } ?>
      <?php require_once('./footer.php') ?>