<?php
session_start();
$_SESSION["id_karyawan"]='';
$_SESSION["username"]='';
$_SESSION["nama_karyawan"]='';
$_SESSION["jabatan"]='';
$_SESSION["level"]='';

unset($_SESSION["id_karyawan"]);
unset($_SESSION["username"]);
unset($_SESSION["nama_karyawan"]);
unset($_SESSION["jabatan"]);
unset($_SESSION["level"]);

session_unset();
session_destroy();
header("Location: login.php");