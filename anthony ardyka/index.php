<?php
session_start();
if (isset($_SESSION['status']) && $_SESSION['status'] == "login") {
  header("location:dashboard/index.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login - Absensi</title>
  <link href="asset/css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">

          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <?php
                if (isset($_GET['message'])) {
                  $msg = $_GET['message'];
                  echo "<div class='notif-login alert alert-danger'>$msg</div>";
                }
                ?>
                <div class="card-header">
                  <h3 class="text-center font-weight-light my-4">Login Absensi</h3>
                </div>
                <div class="card-body">
                  <form action="login.php" method="POST" class="form-login">
                    <label>Masukan nomor induk</label>
                    <input placeholder="nip" name="nip" type="number" class="input-login form-control" required />
                    <label>Masukan password</label>
                    <input placeholder="******" name="password" type="password" class="input-login form-control" required /> <br>
                    <button type="submit" class="button-login btn btn-primary" name="login">Login</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <div id="layoutAuthentication_footer">
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; AbsensiDea 2023</div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="asset/js/scripts.js"></script>
</body>

</html>