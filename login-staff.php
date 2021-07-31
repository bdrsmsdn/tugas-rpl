<?php include_once("functions.php");?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Staff</title>
    <link rel="stylesheet" href="./loginn.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
  </head>
  <body>
    <div class="login-wrapper">
      <form action="valid-staff.php" method="post" class="form">
        <h2>Welcome</h2>
        <?php
if (isset($_GET["error"])) {
$error = $_GET["error"];
if ($error == 1)
showError("username atau password tidak sesuai.");
else if ($error == 2)
showError("Error database. Silahkan hubungi administrator");
else if ($error == 3)
showError("Koneksi ke Database gagal. Autentikasi gagal.");
else if ($error == 4)
showError("Anda tidak boleh mengakses halaman sebelumnya karena belum login.
Silahkan login terlebih dahulu.");
else
showError("Unknown Error.");
}
?>
        <div class="input-group">
          <label for="username">Username</label>
          <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus />
          <div class="invalid-feedback">Please fill in your email</div>
        </div>
        <div class="input-group">
          <label for="password">Password</label>
          <input id="password" type="password" class="form-control" name="password" required />
          <div class="invalid-feedback">Please fill in your password</div>
        </div>
        <div class="form-group">
          <div class="custom-control custom-checkbox">
            <a href="login.php" class="user float-left"> Login as user </a>
          </div>
        </div>
        <div class="form-group mt-3">
          <button type="submit" name="TblLogin" class="btn btn-warning btn-lg btn-block justify-content-center" tabindex="4">Login</button>
        </div>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
  </body>
</html>
