<?php include_once("./header.php");?>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Pesanan</h1>
            </div>
            <div class="mt-1 mb-1 p-3">
                <div class="col col-lg-12">
<?php
if(isset($_POST["TblBeli"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$id=$db->escape_string($_POST["id_minum"]);
                        $hrg=$db->escape_string($_POST["hrgmn"]);
                        $nm=$db->escape_string($_POST["nmmn"]);
                        $jml=$_POST["qty"];
                    // Susun query update
                    $sql = "INSERT INTO pesanan(jumlah_pesanan, daftar_pesanan)
                    VALUES(3, 'Dawet Bayu')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				?>
        <div class="row">
				<div class="alert alert-success" role="alert">
            Data berhasil disimpan. <a href="menu.php">Ketuk untuk <b>kembali.</b></a>
        </div>
        </div>
				<?php
			}
		} else {
			?>
			<div class="alert alert-danger" role="alert">
            Terjadi kesalahan, gagal menyimpan data. <a href="menu.php">Ketuk untuk <b>kembali.</b></a>
            </div>
			<?php
		}
	} 
} else {
		echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>";
}
?>

    <?php include_once("./footer.php");?>
  </body>
</html>
