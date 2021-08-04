<?php include_once("functions.php");?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	if(isset($_POST["TblLogin"])){
		$username=$db->escape_string($_POST["username"]);
		$password=md5($db->escape_string($_POST["password"]));
			$sql="SELECT * FROM pelanggan
				WHERE username='$username' and password='$password'";
			$res=$db->query($sql);
			if($res){
				if(!empty($_POST["remember"])){
					setcookie("username",$_POST["username"],time() + (60 * 60 * 24 * 30));
					setcookie("password",$_POST["password"],time() + (60 * 60 * 24 * 30));
				}
				if($res->num_rows==1){
					$data=$res->fetch_assoc();
					session_start();
					$_SESSION["id_pelanggan"]=$data["id_pelanggan"];
					$_SESSION["nama_pelanggan"]=$data["nama_pelanggan"];
					$_SESSION["alamat_pelanggan"]=$data["alamat_pelanggan"];
					$_SESSION["username"]=$data["username"];
					$_SESSION["email"]=$data["email"];
					header("Location:./pages/pelanggan/index.php");
				} else {
					header("Location: login.php?error=1");
				}
			}		
	} else {
		header("Location: login.php?error=2");
	}
} else {
	header("Location: login.php?error=3");
}
?>