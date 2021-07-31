<?php include_once("./header.php");?>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section">
            <div class="section-header">
              <h1>Penyimpanan Menu</h1>
            </div>
            <div class="mt-1 mb-1 p-3">
                <div class="col col-lg-12">
<?php
if(isset($_POST["TblSimpan"])){
	$db=dbConnect();
	if($db->connect_errno==0){
		// Bersihkan data
		$nama_minuman	   =$db->escape_string($_POST["nama_minuman"]);
		$harga_minuman	   =$db->escape_string($_POST["harga_minuman"]);
		$gambar = $_FILES["gambar"]["name"];
		$file_tmp = $_FILES["gambar"]["tmp_name"];
		$size = $_FILES["gambar"]["size"];
		$path ="../../upload/menu/";

		$imgext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));
		$validext = array('jpg', 'jpeg', 'png');

		//rename
		$userpic = rand(1000,1000000).".".$imgext;

		if(in_array($imgext, $validext)){
			//check size
			if($size < 2000000){
		// Susun query insert
		$sql = "INSERT INTO minuman(nama_minuman,harga_minuman,gambar)
VALUES('$nama_minuman','$harga_minuman','$userpic')";
		// Eksekusi query insert
		$res=$db->query($sql);
		if($res){
			if($db->affected_rows>0){ // jika ada penambahan data
				move_uploaded_file($file_tmp, $path.$userpic);
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
	} else {
        ?>
            <div class="row">
				  <div class="alert alert-danger" role="alert">
            Ukuran file terlalu besar. <a href="javascript:history.back()">Ketuk untuk <b>kembali.</b></a>
          </div>
        </div>
        <?php
      }
    } else {
        ?>
            <div class="row">
				  <div class="alert alert-danger" role="alert">
            Format file tidak didukung! <a href="javascript:history.back()">Ketuk untuk <b>kembali.</b></a>
          </div>
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
