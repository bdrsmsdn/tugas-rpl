<?php
session_start();

if (!isset($_SESSION["username"])) {
  echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!="2") {
  echo "Anda tidak punya akses pada halaman Koki!";
  exit;
}

$_SESSION["id_karyawan"]=$_SESSION["id_karyawan"];
$_SESSION["username"]=$_SESSION["username"];
$_SESSION["nama_karyawan"]=$_SESSION["nama_karyawan"];
$_SESSION["jabatan"]=$_SESSION["jabatan"];
$_SESSION["level"]=$_SESSION["level"];

$nk = $_SESSION["nama_karyawan"];
$jb = $_SESSION["jabatan"];

?>
<?php include_once("../../functions.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title>Dashboard &mdash; Owner</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../../node_modules/jqvmap/dist/jqvmap.min.css" />
    <link rel="stylesheet" href="../../node_modules/weathericons/css/weather-icons.min.css" />
    <link rel="stylesheet" href="../../node_modules/weathericons/css/weather-icons-wind.min.css" />
    <link rel="stylesheet" href="../../node_modules/summernote/dist/summernote-bs4.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/components.css" />
  </head>

<body>
  <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
              <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
              </li>
            </ul>
          </form>
          <ul class="navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../../upload/417125.png" class="rounded-circle mr-1" />
                <div class="d-sm-none d-lg-inline-block">Hi, <?= ucfirst($nk); ?></div></a
              >
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Profile</div>
                <a href="#" class="dropdown-item has-icon"> <i class="far fa-user"></i> <?= ucfirst($nk); ?> / <?= ucfirst($jb); ?> </a>
                <div class="dropdown-divider"></div>
                <a href="../../logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Log out </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index.php">eResto</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index.php">e</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown active">
                <a href="index.php"><i class="fas fa-file-invoice-dollar"></i><span>Laporan</span></a>
              </li>
            </ul>
          </aside>
        </div>