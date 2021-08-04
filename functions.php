<?php
define("DEVELOPMENT",TRUE);
function dbConnect(){
	$db=new mysqli("localhost","root","","resto");// Sesuaikan dengan konfigurasi server anda.
	return $db;
}

function getStruk($id){
	$db=dbConnect();
	if($db->connect_errno==0){
		$res=$db->query("select p.id_pembayaran, pl.nama_pelanggan, m.nama_minuman, p.total_pembayaran, p.tgl_pembayaran, ps.jumlah_pesanan, pl.alamat_pelanggan from pembayaran as p join minuman as m join pesanan as ps join pelanggan as pl WHERE ps.id_minuman = m.id_minuman and ps.id_pesanan = p.id_pesanan and id_pembayaran = '$id'");
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