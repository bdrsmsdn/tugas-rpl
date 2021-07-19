<?php include_once("./header.php");?>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Penghapusan Data Menu</h1>
            </div>
                <div class="mt-1 mb-1 p-3">
                <div class="col col-lg-12">
<?php
if(isset($_POST["TblHapus"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		$id  =$db->escape_string($_POST["id_minuman"]);
		// Susun query delete
		$sql="DELETE FROM minuman WHERE id_minuman='$id'";
		// Eksekusi query delete
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada data terhapus
				?>
        <div class="row">
				  <div class="alert alert-success" role="alert">
            Data berhasil dihapus. <a href="menu.php">Ketuk untuk <b>kembali.</b></a>
          </div>
        </div>
				<?php
      }else{ // Jika sql sukses tapi tidak ada data yang dihapus
        ?>
        <div class="row">
				<div class="alert alert-danger" role="alert">
        Penghapusan gagal karena data yang dihapus tidak ada. <a href="menu.php">Ketuk untuk <b>kembali.</b></a>
            </div>
        </div>
				<?php
      }
		}
		else{ // gagal query
			?>
				<div class="alert alert-danger" role="alert">
        Gagal menghapus data. <a href="menu.php">Ketuk untuk <b>kembali.</b></a>
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
