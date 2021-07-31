<?php
session_start();

if (!isset($_SESSION["username"])) {
  echo "Anda harus login dulu <br><a href='login.php'>Klik disini</a>";
	exit;
}

$level=$_SESSION["level"];

if ($level!="1") {
  echo "Anda tidak punya akses pada halaman Pemilik!";
  exit;
}

$_SESSION["id_karyawan"]=$_SESSION["id_karyawan"];
$_SESSION["username"]=$_SESSION["username"];
$_SESSION["nama_karyawan"]=$_SESSION["nama_karyawan"];
$_SESSION["jabatan"]=$_SESSION["jabatan"];
$_SESSION["level"]=$_SESSION["level"];

$nk = $_SESSION["nama_karyawan"];

?>
<?php include_once("functions.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title>Dashboard &mdash; Pemilik</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="./node_modules/jqvmap/dist/jqvmap.min.css" />
    <link rel="stylesheet" href="./node_modules/weathericons/css/weather-icons.min.css" />
    <link rel="stylesheet" href="./node_modules/weathericons/css/weather-icons-wind.min.css" />
    <link rel="stylesheet" href="./node_modules/summernote/dist/summernote-bs4.css" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="./assets/css/style3.css" />
    <link rel="stylesheet" href="./assets/css/components.css" />
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
                      <img alt="image" src="./assets/img/avatar/avatar-1.png" class="rounded-circle" />
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
                      <img alt="image" src="./assets/img/avatar/avatar-2.png" class="rounded-circle" />
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
                <img alt="image" src="upload/417125.jpg" class="rounded-circle mr-1" />
                <div class="d-sm-none d-lg-inline-block">Hi, <?= ucfirst($nk); ?></div></a
              >
              <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Login 5 menit yang lalu</div>
                <a href="./features/admin/features-profile.php" class="dropdown-item has-icon"> <i class="far fa-user"></i> Profile </a>
                <!-- <a href="./features/admin/features-activities.php" class="dropdown-item has-icon"> <i class="fas fa-bolt"></i> Aktifitas </a> -->
                <a href="./features/admin/features-settings.php" class="dropdown-item has-icon"> <i class="fas fa-cog"></i> Pengaturan </a>
                <div class="dropdown-divider"></div>
                <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i> Log out </a>
              </div>
            </li>
          </ul>
        </nav>
        <div class="main-sidebar">
          <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
              <a href="index-owner.php">eResto</a>
            </div>
            <div class="sidebar-brand sidebar-brand-sm">
              <a href="index-owner.php">e</a>
            </div>
            <ul class="sidebar-menu">
              <li class="menu-header">Laporan</li>
              <li class="nav-item dropdown active">
                <a href="index-owner.php"><i class="fas fa-file-alt"></i><span>Laporan Penghasilan</span></a>
                <!-- <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                 <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul> -->
              </li>
              <!-- <li class="menu-header">Database</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Database</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="./pages/produk/admin/produk.php">Produk</a></li>
                  <li><a class="nav-link" href="./pages/kategori/admin/kategori.php">Kategori</a></li>
                  <li><a class="nav-link" href="./pages/users/admin/users.php">User</a></li>
                  <li><a class="nav-link" href="./pages/penjual/admin/penjual.php">Penjual</a></li>
                  <li><a class="nav-link" href="#">Kantor</a></li>
                  <li><a class="nav-link" href="#">Pesanan</a></li>
                  <li><a class="nav-link" href="#">Pembayaran</a></li>
                </ul>
              </li>
              <li class="menu-header">Pages</li>
              <li class="nav-item dropdown">
                <a href="index-user.php" class="nav-link has-dropdown"><i class="fas fa-download"></i><span>Downloader</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="./features/admin/features-tiktok.php">Tiktok</a></li>
                 <li><a class="nav-link" href="./features/admin/features-igpost.php">Instagram</a></li>
                 <li><a class="nav-link" href="./features/user/features-igstory.php">Instagram Story</a></li>
                 <li><a class="nav-link" href="">Twitter</a></li>
                 <li><a class="nav-link" href="./features/admin/features-yt.php">Youtube</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Auth</span></a>
                <ul class="dropdown-menu">
                  <li><a href="auth-forgot-password.html">Forgot Password</a></li>
                  <li><a href="auth-login.html">Login</a></li>
                  <li><a class="beep beep-sidebar" href="auth-login-2.html">Login 2</a></li>
                  <li><a href="auth-register.html">Register</a></li>
                  <li><a href="auth-reset-password.html">Reset Password</a></li>
                </ul>
              </li>
              <li>
                <a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a>
              </li> -->
            </ul>
          </aside>
        </div>
        <!-- Main Content -->
        <div class="main-content">
        <section class="section">
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card bg-dark text-white card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title bg-dark">Order Statistics -
                    <div class="dropdown d-inline">
                      <a class="font-weight-600 dropdown-toggle" data-toggle="dropdown" href="#" id="orders-month">August</a>
                      <ul class="dropdown-menu dropdown-menu-sm">
                        <li class="dropdown-title">Select Month</li>
                        <li><a href="#" class="dropdown-item">January</a></li>
                        <li><a href="#" class="dropdown-item">February</a></li>
                        <li><a href="#" class="dropdown-item">March</a></li>
                        <li><a href="#" class="dropdown-item">April</a></li>
                        <li><a href="#" class="dropdown-item">May</a></li>
                        <li><a href="#" class="dropdown-item">June</a></li>
                        <li><a href="#" class="dropdown-item">July</a></li>
                        <li><a href="#" class="dropdown-item active">August</a></li>
                        <li><a href="#" class="dropdown-item">September</a></li>
                        <li><a href="#" class="dropdown-item">October</a></li>
                        <li><a href="#" class="dropdown-item">November</a></li>
                        <li><a href="#" class="dropdown-item">December</a></li>
                      </ul>
                    </div>
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">24</div>
                      <div class="card-stats-item-label">Pending</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">12</div>
                      <div class="card-stats-item-label">Shipping</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">23</div>
                      <div class="card-stats-item-label">Completed</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon bg-warning">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body text-white">
                    59
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card bg-dark card-statistic-2">
                <div class="card-chart">
                  <canvas id="balance-chart" height="80"></canvas>
                </div>
                <div class="card-icon bg-warning">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Balance</h4>
                  </div>
                  <div class="card-body text-white">
                    $187,13
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card bg-dark card-statistic-2">
                <div class="card-chart">
                  <canvas id="sales-chart" height="80"></canvas>
                </div>
                <div class="card-icon bg-warning">
                  <i class="fas fa-shopping-bag"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Sales</h4>
                  </div>
                  <div class="card-body text-white">
                    4,732
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-8">
              <div class="card bg-dark">
                <div class="card-header">
                  <h4 class="text-white">Budget vs Sales</h4>
                </div>
                <div class="card-body">
                  <canvas id="myChart" height="158"></canvas>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card bg-dark ">
                <div class="card-header">
                  <h4 class="text-white">Top 5 Products</h4>
                  <div class="card-header-action dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-danger dropdown-toggle">Month</a>
                    <ul class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <li class="dropdown-title">Select Period</li>
                      <li><a href="#" class="dropdown-item">Today</a></li>
                      <li><a href="#" class="dropdown-item">Week</a></li>
                      <li><a href="#" class="dropdown-item active">Month</a></li>
                      <li><a href="#" class="dropdown-item">This Year</a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-body" id="top-5-scroll">
                  <ul class="list-unstyled list-unstyled-border">
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">86 Sales</div></div>
                        <div class="media-title text-white">oPhone S9 Limited</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="64%"></div>
                            <div class="budget-price-label">$68,714</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="43%"></div>
                            <div class="budget-price-label">$38,700</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./assets/img/products/product-4-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">67 Sales</div></div>
                        <div class="media-title text-white">iBook Pro 2018</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="84%"></div>
                            <div class="budget-price-label">$107,133</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="60%"></div>
                            <div class="budget-price-label">$91,455</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./assets/img/products/product-1-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">63 Sales</div></div>
                        <div class="media-title text-white">Headphone Blitz</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="34%"></div>
                            <div class="budget-price-label">$3,717</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$2,835</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./assets/img/products/product-3-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">28 Sales</div></div>
                        <div class="media-title text-white">oPhone X Lite</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="45%"></div>
                            <div class="budget-price-label">$13,972</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="30%"></div>
                            <div class="budget-price-label">$9,660</div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="media">
                      <img class="mr-3 rounded" width="55" src="./assets/img/products/product-5-50.png" alt="product">
                      <div class="media-body">
                        <div class="float-right"><div class="font-weight-600 text-muted text-small">19 Sales</div></div>
                        <div class="media-title text-white">Old Camera</div>
                        <div class="mt-1">
                          <div class="budget-price">
                            <div class="budget-price-square bg-primary" data-width="35%"></div>
                            <div class="budget-price-label">$7,391</div>
                          </div>
                          <div class="budget-price">
                            <div class="budget-price-square bg-danger" data-width="28%"></div>
                            <div class="budget-price-label">$5,472</div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="card-footer pt-3 d-flex justify-content-center">
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-primary" data-width="20"></div>
                    <div class="budget-price-label">Selling Price</div>
                  </div>
                  <div class="budget-price justify-content-center">
                    <div class="budget-price-square bg-danger" data-width="20"></div>
                    <div class="budget-price-label">Budget Price</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-8">
                <div class="card bg-dark">
                  <div class="card-header">
                    <h4 class="text-white">Laporan Penghasilan</h4>
                    <div class="card-header-action">
                      <a href="#" class="btn btn-danger"
                        >View More <i class="fas fa-chevron-right"></i
                      ></a>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive table-invoice">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Total Pendapatan</th>
                        </tr>
                        <tr>
                          <td><a href="#">INV-87239</a></td>                          
                          <td>July 19, 2018</td>
                          <td class="font-weight-600">Kusnadi</td>
                        </tr>
                        <tr>
                          <td><a href="#">INV-48574</a></td>
                          <td>July 21, 2018</td>
                          <td class="font-weight-600">Hasan Basri</td>
                        </tr>
                        <tr>
                          <td><a href="#">INV-76824</a></td>
                          <td>July 22, 2018</td>
                          <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        </tr>
                        <tr>
                          <td><a href="#">INV-84990</a></td>
                          <td>July 22, 2018</td>
                          <td class="font-weight-600">Agung Ardiansyah</td>
                        </tr>
                        <tr>
                          <td><a href="#">INV-87320</a></td>
                          <td>July 28, 2018</td>
                          <td class="font-weight-600">Ardian Rahardiansyah</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </section>
        </div>
        
        <footer class="main-footer">
          <div class="footer-left">
            Copyright &copy; 2021
            <div class="bullet"></div>
            Template from <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
          </div>
          <div class="footer-right">2.3.0</div>
        </footer>
      </div>
    </div>

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="./assets/js/stisla.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- JS Libraies -->
    <script src="./node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
    <script src="./node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="./node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="./node_modules/summernote/dist/summernote-bs4.js"></script>
    <script src="./node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="./node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="./node_modules/chart.js/dist/Chart.min.js"></script>

    <!-- Template JS File -->
    <script src="./assets/js/scripts.js"></script>
    <script src="./assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script src="./assets/js/page/index-0.js"></script>
  </body>
</html>
