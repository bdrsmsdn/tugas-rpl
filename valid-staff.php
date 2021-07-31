<?php include_once("functions.php");?>
<?php
$db=dbConnect();
if($db->connect_errno==0){
	if(isset($_POST["TblLogin"])){
        $username=$db->escape_string($_POST["username"]);
		$password=md5($db->escape_string($_POST["password"]));
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
						header("Location:./pages/owner/index.php");
					} else if ($_SESSION["level"]=$data["level"]==2)
					{
						header("Location:./pages/koki/index.php");
					} else if ($_SESSION["level"]=$data["level"]==3)
					{
						header("Location:./pages/kasir/index.php");
					} else if ($_SESSION["level"]=$data["level"]==4){
						header("Location:./pages/pelayan/index.php");
					}
				} else {
					header("Location: login-staff.php?error=1");
				}
			}
    } else {
		header("Location: login-staff.php?error=2");
	}
} else {
	header("Location: login-staff.php?error=3");
}
?>