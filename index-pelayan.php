<?php
session_start();

if (!isset($_SESSION["username"])) {
  echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!="4") {
  echo "Anda tidak punya akses pada halaman pelayan";
  exit;
}

$_SESSION["id_karyawan"]=$_SESSION["id_karyawan"];
$_SESSION["username"]=$_SESSION["username"];
$_SESSION["nama_karyawan"]=$_SESSION["nama_karyawan"];
$_SESSION["jabatan"]=$_SESSION["jabatan"];
$_SESSION["level"]=$_SESSION["level"];

?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Halo Pelayan!</h1>
</body>
</html>