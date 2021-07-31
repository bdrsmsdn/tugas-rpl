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
    <title>Dashboard &mdash; Pelayan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="../../node_modules/jqvmap/dist/jqvmap.min.css" />
    <link rel="stylesheet" href="../../node_modules/weathericons/css/weather-icons.min.css" />
    <link rel="stylesheet" href="../../node_modules/weathericons/css/weather-icons-wind.min.css" />
    <link rel="stylesheet" href="../../node_modules/summernote/dist/summernote-bs4.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="../../assets/css/style3.css" />
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
            <li class="dropdown dropdown-list-toggle">
              <a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
              <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">
                  Inbox
                  <div class="float-right">
                    <a href="#">Tandai semua telah dibaca</a>
                  </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                  <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-avatar">
                      <img alt="image" src="../../assets/img/avatar/avatar-1.png" class="rounded-circle" />
                      <div class="is-online"></div>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>Badra</b>
                      <p>Hallo!</p>
                      <div class="time">1 jam yang lalu</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-avatar">
                      <img alt="image" src="../../assets/img/avatar/avatar-2.png" class="rounded-circle" />
                    </div>
                    <div class="dropdown-item-desc">
                      <b>Bayu</b>
                      <p>woy</p>
                      <div class="time">12 jam yang lalu</div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-footer text-center">
                  <a href="#">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </li>
            <li class="dropdown dropdown-list-toggle">
              <a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
              <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">
                  Notifikasi
                  <div class="float-right">
                    <a href="#">Tandai semua telah dibaca</a>
                  </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                  <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                      <i class="fas fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>Kamu</b> dan <b>Badra</b> sekarang berteman
                      <div class="time text-primary">2 menit yang lalu</div>
                    </div>
                  </a>
                  <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                      <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                      <b>Kamu</b> dan <b>Bayu</b> sekarang berteman
                      <div class="time">15 jam yang lalu</div>
                    </div>
                  </a>
                </div>
                <div class="dropdown-footer text-center">
                  <a href="#">Lihat Semua <i class="fas fa-chevron-right"></i></a>
                </div>
              </div>
            </li>
            <li class="dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="../../upload/417125.png" class="rounded-circle mr-1" />
                <div class="d-sm-none d-lg-inline-block">Hi, <?= ucfirst($nk); ?></div></a
              >
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Login 5 menit yang lalu</div>
                <a href="./features/admin/features-profile.php" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile </a>
                <!-- <a href="./features/admin/features-activities.php" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i> Aktifitas </a> -->
                <a href="./features/admin/features-settings.php" class="dropdown-item has-icon"> <i class="fas fa-cog"></i> Pengaturan </a>
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
              <li class="menu-header">Pesanan</li>
              <li class="nav-item dropdown active">
                <a href="index.php"><i class="fas fa-inbox"></i><span>Pemesanan</span></a>
              </li>
               <!-- <li class="nav-item dropdown">
                <a href="" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i><span>Menu</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="menu.php">Menu</a></li>
                  <li><a class="nav-link" href="menu-harian.php">Menu Harian</a></li>
                </ul>
              </li> -->
              <li class="nav-item dropdown">
                <a href="menu.php"><i class="fas fa-file-alt"></i><span>Lihat Pesanan</span></a>
              </li>
            </ul>
          </aside>
        </div>