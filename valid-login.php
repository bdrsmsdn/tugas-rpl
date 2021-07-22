<?php include_once("functions.php");?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	if(isset($_POST["TblLogin"])){
		$username=$db->escape_string($_POST["username"]);
		$password=md5($db->escape_string($_POST["password"]));
		if(!isset($_POST["karyawan"])){
			$sql="SELECT * FROM pelanggan
				WHERE username='$username' and password='$password'";
			$res=$db->query($sql);
			if($res){
				if($res->num_rows==1){
					$data=$res->fetch_assoc();
					session_start();
					$_SESSION["id_pelanggan"]=$data["id_pelanggan"];
					$_SESSION["nama_pelanggan"]=$data["nama_pelanggan"];
					$_SESSION["alamat_pelanggan"]=$data["alamat_pelanggan"];
					$_SESSION["username"]=$data["username"];
					header("Location:./pages/pelanggan/index.php");
				} else {
					header("Location: login.php?error=1");
				}
			}
		} else {
			$sql="SELECT * FROM karyawan
				WHERE username='$username' and password='$password'";
			$res=$db->query($sql);
			if($res){
				if($res->num_rows==1){
					$data=$res->fetch_assoc();
					session_start();
					$_SESSION["id_karyawan"]=$data["id_karyawan"];
					$_SESSION["username"]=$data["username"];
					$_SESSION["nama_karyawan"]=$data["nama_karyawan"];
					$_SESSION["jabatan"]=$data["jabatan"];
					$_SESSION["level"]=$data["level"];

					if ($_SESSION["level"]=$data["level"]==1)
					{
						header("Location:index-owner.php");
					} else if ($_SESSION["level"]=$data["level"]==2)
					{
						header("Location:./pages/koki/index.php");
					} else if ($_SESSION["level"]=$data["level"]==3)
					{
						header("Location:index-kasir.php");
					} else if ($_SESSION["level"]=$data["level"]==4){
						header("Location:./pages/pelayan/index.php");
					}
				} else {
					header("Location: login.php?error=1");
				}
			}
		}
	} else {
		header("Location: login.php?error=2");
	}
} else {
	header("Location: login.php?error=3");
}
?>