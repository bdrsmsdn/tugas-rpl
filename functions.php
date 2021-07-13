<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","resto");// Sesuaikan dengan konfigurasi server anda.
	return $db;
}
// getListKategori digunakan untuk mengambil seluruh data dari tabel produk
function getListKategori(){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * 
						 FROM kategori
						 ORDER BY id_kategori");
		if($res){
			$data=$res->fetch_all(MYSQLI_ASSOC);
			$res->free();
			return $data;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}
// digunakan untuk mengambil data sebuah produk
function getDataProduk($kode_barang){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT p.id,p.kode_barang,p.nama_barang,p.harga,p.stok,
								p.supplier_id,p.gambar,p.id_kategori, k.nama_kategori nama_kategori
						 FROM barang p JOIN kategori k ON p.id_kategori=k.id_kategori
						 WHERE p.kode_barang='$kode_barang'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function getUser($id_user){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("SELECT * FROM users WHERE id_user='$id_user'");
		if($res){
			if($res->num_rows>0){
				$data=$res->fetch_assoc();
				$res->free();
				return $data;
			}
			else
				return FALSE;
		}
		else
			return FALSE; 
	}
	else
		return FALSE;
}

function banner(){
	?>
<div id="banner"><h1>PT. Sagala Aya</h1>
</div>
	<?php
}
function navigator(){
	?>
<div id="navigator">
| <a href="produk.php">Produk</a> 
| <a href="kategori.php">Kategori</a> 
| <a href="pelanggan.php">Pelanggan</a> 
| <a href="pegawai.php">Pegawai</a> 
| <a href="kantor.php">Kantor</a> 
| <a href="pesanan.php">Pesanan</a> 
| <a href="pembayaran.php">Pembayaran</a>
| <a href="logout.php">Log out</a> 
| 
</div>
	<?php
}
function showError($message){
	?>
<div class="alert alert-danger" role="alert">
<?php echo $message;?>
</div>
	<?php
}

$sname= "localhost";
$unmae= "root";
$pwd = "";

$db_name = "resto";

$conn = mysqli_connect($sname, $unmae, $pwd, $db_name);

if (!$conn) {
	echo "Connection failed!";
}


function showTrue($message){
	?>
<div style="background-color:#d4edda;padding:10px;border:1px solid red;margin:15px 0px">
<?php echo $message;?>
</div>
	<?php
}