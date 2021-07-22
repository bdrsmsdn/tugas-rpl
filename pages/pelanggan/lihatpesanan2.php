<?php require_once('./header.php') ?>
<?php
$db=dbConnect();

if (isset($_POST['id'], $_POST['qty'])) {
 
    $id = $_POST['id'];
    $pembelian = $_POST['qty'];

    $produk = mysqli_query($conn, "SELECT * FROM minuman WHERE id_minuman = '$id'");
    $dt_produk = $produk->fetch_assoc();

    if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

    $index = -1;
    $cart = unserialize(serialize($_SESSION['cart']));

     // jika produk sudah ada dalam cart maka pembelian akan diupdate
 for ($i=0; $i<count($cart); $i++) {
    if ($cart[$i]['id'] == $id) {
     $index = $i;
     $_SESSION['cart'][$i]['qty'] = $pembelian;
     break;
    }
   }

    // jika produk belum ada dalam cart
 if ($index == -1) {
    $_SESSION['cart'][] = [
     'id' => $id,
     'name' => $dt_produk['nama_produk'],
     'price' => $dt_produk['harga'],
     'qty' => $pembelian
    ];
   }
}
?>
        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Pesanan Saya</h1>
            </div>
            <div class="row">
              <table class="table table-dark text-white text-center table-striped table-responsive-sm">
                    <tr>
                        <th>No</th><th>Nama Minuman</th><th>Harga</th>
                        <th>Jumlah</th><th>Total Harga</th><th>Aksi</th>
                    </tr> 
                    <?php 
                        if(!empty($_SESSION['cart'])){
                            if(isset($_SESSION['cart'])) {
                                $cart = unserialize(serialize($_SESSION['cart']));
                                $index = 0;
                                $no = 1;
                                $total = 0;
                                $total_bayar = 0;

                                for ($i=0; $i<count($cart); $i++) {
                                    $total = $_SESSION['cart'][$i]['price'] * $_SESSION['cart'][$i]['qty'];
                                    $total_bayar += $total;
                                ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $cart[$i]['name']; ?></td>
                                <td><?= $cart[$i]['price']; ?></td>
                                <td><?= $cart[$i]['qty']; ?></td>
                                <td><?= $total ?></td>
                                <td align="center">
                                    <a href="?index=<?= $index; ?>">
                                        <button class="btn btn-danger shadow-none btn-sm"><i class="fa fa-trash"></i></button>
                                    </a>  
                                </td>
                            </tr>
                            <?php
                                $index++;
                                }
                                // hapus produk dalam cart
                                if(isset($_GET['index'])) {
                                    $cart = unserialize(serialize($_SESSION['cart']));
                                    unset($cart[$_GET['index']]);
                                    $cart = array_values($cart);
                                    $_SESSION['cart'] = $cart;
                                }
                            }
                        }                        
                        ?>
                        <tr>
                        <td colspan="4" align="right"><strong>Total Bayar</strong></td>
                        <?php if(!empty($_SESSION['cart'])){ ?>
                        <td><strong><?= $total_bayar; ?></strong></td>
                        <?php 
                        
                    } else {
?>
<td><strong>0</strong></td>
<?php
                        } ?>
                        <td align="center">
                         <a href="transaksi.php">
                          <button class="btn btn-success btn-sm shadow-none">Checkout</button>
                         </a>
                        </td>
                       </tr>
                      </table>
                                 
            </div>
          </section>
        </div>
        
        <?php require_once('./footer.php') ?>
</body>
</html> 