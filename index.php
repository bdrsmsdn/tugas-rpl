<?php 
require_once('./functions.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>eResto</title>
    <link rel="stylesheet" href="./style2.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  </head>
  <body>
    <div class="bg-image">
      <!-- NAVBAR -->
      <div class="container-bg">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
          <div class="container">
            <a class="navbar-brand" href="#">
              <img src="./img/eresto-logo.jpeg" alt="" width="24" height="24" class="d-inline-block align-text-center rounded-circle" />
              eResto
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#jumbotron">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#services">Services</a>
                </li>
                <a href="login.php" class="btn btn-outline-warning" type="submit">Login</a>
              </ul>
            </div>
          </div>
        </nav>

        <!-- JUMBOTRON -->
        <section class="jumbotron jumbotron-fluid text-center" id="jumbotron">
          <div class="container">
            <div class="row">
              <div class="col">
                <h1 class="display-4">eResto</h1>
                <p class="lead">___</p>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <!-- PANEL -->
    <!-- <section class="panel">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-10 info-panel">
            <div class="row">
              <div class="col-lg">
                <img src="img/eresto-logo.jpeg" width="100px" alt="" class="float-start" />
                <h4>Lorem</h4>
                <p>Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="col-lg">
                <img src="img/eresto-logo.jpeg" width="100px" alt="" class="float-start" />
                <h4>Lorem</h4>
                <p>Lorem ipsum dolor sit amet.</p>
              </div>
              <div class="col-lg">
                <img src="img/eresto-logo.jpeg" width="100px" alt="" class="float-start" />
                <h4>Lorem</h4>
                <p>Lorem ipsum dolor sit amet.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <!-- ABOUT -->
    <section class="about" id="about">
      <div class="container">
        <div class="row">
          <div class="col mt-5 mb-3 text-center">
            <h2>ABOUT</h2>
            <center><hr width="15%" size="5px" style="color: yellow" /></center>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-5 mt-3">
            <img src="https://images.unsplash.com/photo-1580866490076-7f49e396e4de?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=667&q=80" alt="" />
          </div>
          <div class="col-md-6 mb-5 mt-3 fs-5">
            <p>
              Eresto adalah sebuah restaurant fiksi virtual yang bergerak di bidang penjualan Dawet ke seluruh Indonesia. Eresto didirikan oleh lima orang mahasiswa Teknik Informatika Semester 4 guna memenuhi salah satu tugas besar mata
              kuliah Rekayasa Perangkat Lunak. Saat ini eresto hanya menjual produk secara online. Silakan daftar dan memesan orderan fiksi kalian. Salam coding;
            </p>
          </div>
        </div>
      </div>
    </section>

    <!-- parallax -->
    <section class="parallax">
      <div class="parallaxx">
        <h1 class="display-1">eResto</h1>
      </div>
    </section>

    <!-- SERVICES -->
    <section class="services" id="services">
      <div class="container">
        <div class="row">
          <div class="col mt-5 mb-5 text-center">
            <h2>SERVICES</h2>
            <center><hr width="20%" size="5px" style="color: yellow" /></center>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="card mb-5" id="menuu">
              <div class="card-body">
                <div class="gallery mb-3" id="gallery">

                <?php 
                  $data = mysqli_query($conn, "SELECT * FROM minuman LIMIT 8");
                  foreach ($data as $d) {
                    ?>
                    <div class="grid-img">
                    <img width="100%" height="100%" src="./upload/menu/<?= $d['gambar']; ?>" alt="" />
                  </div>
                    <?php
                  }
                ?>                  
                </div>
                <div class="row-mt-3 text-center">
                  <a href="./pages/pelanggan/index.php" id="btnsee" class="btn btn-warning">See All</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- images -->
    <!-- <section class="images">
      <div class="imagess">
        <img src="https://images.unsplash.com/photo-1526401281623-279b498f10f4?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="" />
        <img src="https://images.unsplash.com/photo-1596710629144-6f6abf933384?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="" />
        <img src="https://images.unsplash.com/photo-1613142153918-650019a1ebcf?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="" />
        <img src="https://images.unsplash.com/photo-1471440671318-55bdbb772f93?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="" />
        <img src="https://images.unsplash.com/photo-1505252912265-4e83cec30e2d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=522&q=80" alt="" />
        <img src="https://images.unsplash.com/photo-1605618826115-fb9e775cfb40?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="" />
        <img src="https://images.unsplash.com/photo-1559001724-fbad036dbc9e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="" />
      </div>
    </section> -->

    <!-- footer -->
    <section class="footer" id="footer">
      <div class="container">
        <div class="row">
          <div class="col mt-5 mb-3 text-center">
            <h1>eResto</h1>
            <center><hr width="15%" size="5px" style="color: yellow" /></center>
          </div>
        </div>
        <div class="footerr">
          <div class="row mb-5 justify-content-center" id="contact">
            <div class="col-sm-6">
              <div class="row justify-content-center">
                <div class="col-sm-1">
                  <a href="https://facebook.com/badra.srn" id="btnsocmed" class="btn btn-dark"><i class="bi bi-facebook"></i></a>
                </div>
                <div class="col-sm-1">
                  <a href="https://instagram.com/bdrsmsdn" id="btnsocmed" class="btn btn-dark"><i class="bi bi-instagram"></i></a>
                </div>
                <div class="col-sm-1">
                  <a href="https://wa.me/6281281817375" id="btnsocmed" class="btn btn-dark"><i class="bi bi-whatsapp"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container foot">
          <div class="row-mt-3 mb-5">
            <div class="col-md-12">
              <div class="row">
                <div class="col-lg">
                  <h5>About</h5>
                  <p>Source code project ini bisa kalian dapatkan di <a href="https://github.com/bdrsmsdn/tugas-rpl">Github</a></p>
                </div>
                <div class="col-lg">
                  <h5>Archives</h5>
                  <ul>
                    <li>2020</li>
                    <li>2019</li>
                    <li>2018</li>
                  </ul>
                </div>
                <div class="col-lg">
                  <h5>Recipes</h5>
                  <ul>
                    <li>Browse Recipes</li>
                    <li>Recipe Page</li>
                    <li>Submit Recipe</li>
                  </ul>
                </div>
                <div class="col-lg">
                  <h5>Terima kasih kepada</h5>
                  <p>Semua pihak yang telah membantu baik motivasi ataupun materi yang tidak dapat penulis sebutkan satu per satu.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center" style="color: white">
          <p>
            Made with <span><i class="bi bi-heart"></i></span> by Dawet Team
          </p>
        </div>
      </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
