<?php include_once("./header.php");?>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Menu</h1>
            </div>
            <div class="mt-1 mb-1 p-3">
                <div class="col col-lg-12">
            <?php
if(isset($_POST["TblConfirm"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
        $id=$db->escape_string($_POST["id"]);
		// Susun query update
		$sql = "UPDATE pembayaran SET
status=1, id_karyawan = $idk WHERE id_pembayaran='$id'";
		// Eksekusi query update
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada update data
				?>
        <div class="row">
				  <div class="alert alert-success" role="alert">
           Pembayaran dikonfirmasi. <a href="index.php">Ketuk untuk <b>kembali.</b></a>
          </div>
        </div>
				<?php
			}
			else{ // Jika sql sukses tapi tidak ada data yang berubah
				?>
				<div class="alert alert-success" role="alert">
          Pembayaran dikonfirmasi. <a href="index.php">Ketuk untuk <b>kembali.</b></a>
        </div>
				<?php
			}
		}
		else{ // gagal query
			?>
				<div class="alert alert-danger" role="alert">
          Pembayaran gagal dikonfirmasi. <a href="menu.php">Ketuk untuk <b>kembali.</b></a>
        </div>
			<?php
		}
	}
	else
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>
              <?php include_once("./footer.php");?>
  </body>
</html>
