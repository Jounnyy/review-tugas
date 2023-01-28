<?php
session_start();

if (isset($_SESSION['status']) && "login") {
    header("location:dashboard/index.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FORM LOGIN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style/login.css">
</head>

<body>
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-md-8">
                <img src="img/bg1.jpg" class="img-fluid d-none d-md-block d-xl-block" alt="..." style="height: 420px;">
            </div>
            <div class="form-login col-md-4 p-4">
                <form action="login.php" method="POST">
                    <?php
                    if (isset($_GET['message'])) {
                        $message = $_GET['message'];
                        echo "<div class='text-center alert alert-danger' role='alert'>$message</div>";
                    }
                    ?>
                    <h3 class="text-center fw-semi-bold mt-4 ">LOGIN</h3>
                    <div class="input mb-3">
                        <label for="exampleInputEmail1" class="form-label">NIP :</label>
                        <input type="number" name="nip" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIP Anda">
                    </div>
                    <div class="input mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password :</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Masukan Password Anda">
                    </div>
                    <div class="input mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                    </div>
                    <button type="submit" name="login" class="btn btn-secondary col-12">Login Sekarang</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>