<?php
session_start();

if (isset($_POST['logout'])) {
    session_destroy();
    $_SESSION['status'] == "";
    header("location:../index.php?message=keluar dari sistem");
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
                    <h1 class="mt-4">Data Absensi seluruh pegawai</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">status pegawai: <?php echo $_SESSION['role']; ?></li>
                    </ol>
                    <?php
                    if (isset($_GET['message'])) {
                        echo "<div class='alert alert-danger'>" + $_GET['message'] + "</div>";
                    }
                    ?>
                    <div class="row">


                        <table border="1" id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Pegawai</th>
                                    <th>Jam Masuk Pegawai</th>
                                    <th>Jam Masuk</th>
                                    <th>Jam Keluar</th>
                                    <th>Peforma</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include("../connection.php");

                                date_default_timezone_set("Asia/Jakarta"); //GMT +07

                                $tgl = date('Y-m-d');
                                $time = date('H:i:s');
                                $employee_id = $_SESSION['employee_id'];



                                $sql = "SELECT tgl, fullname , a.clock_in , a.clock_out , u.clock_in as clock_in_user  FROM attendances a join users u on a.employee_id = u.employee_id ";
                                $result = $db->query($sql);



                                while ($row = $result->fetch_assoc()) {
                                    $clock_in = date('H:i:s', (int)$row['clock_in']);
                                    $clock_in_user = date('H:i:s', (int)$row['clock_in_user']);

                                    if ($row['clock_in_user'] >= $row['clock_in']) {
                                        $peforma = "Good 😉";
                                    }elseif($row['clock_in_user'] < $row['clock_in']){
                                        $peforma = "Bad 😞";
                                    }   

                                    echo "<tr>";
                                    echo "<td>" . $row['tgl'] . "</td>";
                                    echo "<td>" . $row['fullname'] . "</td>";
                                    echo "<td>" . $row['clock_in_user'] . "</td>";
                                    echo "<td>" . $row['clock_in'] . "</td>";
                                    echo "<td>" . $row['clock_out'] . "</td>";
                                    echo "<td>". $peforma ."</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>

                        </table>

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