<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION['status'] == "";
    header("location:../index.php?message=keluar dari sistem");
}


if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    header("location:index.php");
  }
include("../connection.php");

// edit pegawai
if (isset($_GET["update"])) {

    $id = $_GET["update"];
    $fullname = $_POST["fullname"];
    $role = $_POST["role"];
    $employee_id = $_POST["employee_id"];
    $clock_in = $_POST["clock_in"];
    $clock_out = $_POST["clock_out"];
    if (isset($_POST["password"])) {
        $password = md5($_POST["password"]);
    }else{
        $password = $_POST["pass_lama"];
    }
    

    $sql = "UPDATE `users` SET `fullname` = '" . $fullname . "' , `employee_id` = '" . $employee_id . "', `role` = '" . $role . "', `clock_in` = '" . $clock_in . "', `password` = '" . $password . "' WHERE `id` = '" . $id . "' ";

    $result = mysqli_query($db, $sql) or die("<script type='text/javascript'>alert(" . mysqli_error($db) . ");</script>");

    $message = 'pegawai berhasil diupdate';
    header("Location: pegawai-admin.php?message={$message}");
}

// tambah pegawai
elseif (isset($_POST["fullname"])) {

    $fullname = $_POST["fullname"];
    $role = $_POST["role"];
    $employee_id = $_POST["employee_id"];
    $clock_in = $_POST["clock_in"];
    $clock_out = $_POST["clock_out"];
    $password = md5($_POST["password"]);

    $sql = "INSERT INTO `users` (`fullname`, `employee_id`, `role`, `clock_in`, `clock_out`, `password`) VALUES ('" . $fullname . "', '" . $employee_id . "', '" . $role . "', '" . $clock_in . "', '" . $clock_out . "', '" . $password . "')";

    $result = mysqli_query($db, $sql) or die("<script type='text/javascript'>alert('QUERY Belum Benar');</script>");

    $message = 'pegawai berhasil ditambahkan';
    header("Location: pegawai-admin.php?message={$message}");
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
</head>

<body>
    <div>

    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Absensi</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="../asset/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Absensi</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <!-- Navbar-->
        <ul class="navbar-nav d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <form action="" method="POST">
                            <button name="logout" class="btn btn-danger ml-3" type="submit">logout</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index-admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="pegawai-admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Pegawai
                        </a>
                        <a class="nav-link" href="absensi-admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Data Absensi
                        </a>
                        <a href="" class="nav-link">
                        <form action="" method="POST">
                            <button name="logout" class="btn btn-danger ml-3" type="submit">logout</button>
                        </form>
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['fullname']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <section>

                    </section><br>
                    <h1 class="mt-4">Tambah Pegawai</h1>
                    <div class="row">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">

                                <div class="card-body">
                                    <?php

                                    if (isset($_GET['edit'])) {


                                        $id = $_GET['edit'];
                                        $sql = "SELECT `id` , `employee_id` , `fullname` , `clock_in` , `clock_out` , `role` , `password`  FROM users WHERE id = $id ";
                                        $result = $db->query($sql);
                                        while ($row = $result->fetch_assoc()) {
                                    ?>
                                            <form method="post" action="form-pegawai.php?update=<?=$row['id']?>">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" name="employee_id" value="<?=$row['employee_id']?>" type="number" placeholder="name@example.com" />
                                                    <label for="inputEmail">employee ID</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" name="fullname" value="<?=$row['fullname']?>" type="text" placeholder="Full Name" />
                                                    <label for="inputEmail">Full Name</label>
                                                </div>
                                                <div class="form-floating">
                                                    <select class="form-select mb-3" name="role"  aria-label=".form-select-lg example">
                                                        <option selected value="<?=$row['role']?>"><?=$row['role']?></option>
                                                        <option value="admin">Admin</option>
                                                        <option value="operator">Operator</option>
                                                        <option value="packaging">Packaging</option>
                                                        <option value="pegawai">Pegawai</option>
                                                    </select>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" name="clock_in" value="<?=$row['clock_in']?>" type="time" placeholder="Full Name" />
                                                    <label for="inputEmail">Waktu Masuk</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" name="clock_out" value="<?=$row['clock_out']?>" type="time" placeholder="Full Name" />
                                                    <label for="inputEmail">Waktu Keluar</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputPassword" name="password"  type="password" placeholder="Password" required />
                                                    <label for="inputPassword">Password </label>
                                                </div>
                                                <input type="text" hidden name="pass_lama" value="<?=$row['password']?>">
                                                <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                    <button type="submit" class="btn btn-primary" href="form-pegawai.php">Submit</button>
                                                </div>
                                            </form>

                                        <?php }
                                    } else {
                                        ?>
                                        <form method="POST" action="form-pegawai.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="employee_id" type="number" required placeholder="name@example.com" />
                                                <label for="inputEmail">employee ID</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="fullname" type="text" required placeholder="Full Name" />
                                                <label for="inputEmail">Full Name</label>
                                            </div>
                                            <div class="form-floating">
                                                <select class="form-select mb-3" name="role" aria-label=".form-select-lg example" required>
                                                    <option selected disabled>Role</option>
                                                    <option value="admin">Admin</option>
                                                    <option value="operator">Operator</option>
                                                    <option value="packaging">Packaging</option>
                                                    <option value="pegawai">Pegawai</option>
                                                </select>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="clock_in" type="time" required placeholder="Full Name" />
                                                <label for="inputEmail">Waktu Masuk</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="clock_out" type="time" required placeholder="Full Name" />
                                                <label for="inputEmail">Waktu Keluar</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" type="password" required placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                        
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" class="btn btn-primary" >Submit</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
    <script src="../asset/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="../asset/assets/demo/chart-area-demo.js"></script>
    <script src="../asset/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="../asset/js/datatables-simple-demo.js"></script>
</body>

</html>