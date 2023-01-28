<?php 

include('../connection.php');
include('../Users.php');
session_start();
// echo $_SESSION['status'];
if(!isset($_SESSION['status']) || $_SESSION['status'] != 'login'){
    header('location:../index.php?message=Silahkan Login Terlebih Dahulu');
}

if(isset($_POST['logout'])){
    session_destroy();
    header('location:../index.php?message=berhasil keluar');
}

$page = "datakarywan";



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Absensi</title>

    <!-- Custom fonts for this template-->
    <link href="..sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include('../template/sidebar.php') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include('../template/header.php') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

<!-- Page Heading -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-down">Data Absensi Karyawan</h6>
    </div>
    <form action="" class="form-group mt-3 ml-4" method="get">
    <div class="row" >
        <div class="col-auto">
            <input type="date" name="dari" class="form-control" value="<?php if(isset($_GET['dari'] )){ echo $_GET['dari']; } ?>">
        </div>
        <div class="col-auto">
            <input type="date" name="ke" class="form-control" value="<?php if(isset($_GET['ke'] )){ echo $_GET['ke']; } ?>">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" type="submit">Cari</button>
        </div>
    </div>
    </form>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Emloyee Id</th>
                        <th>Date</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Emloyee Id</th>
                        <th>Date</th>
                        <th>Clock In</th>
                        <th>Clock Out</th>
                    </tr>
                </tfoot>
                <?php
                if(isset($_GET['dari']) && $_GET['ke']){
                    $data = "SELECT * FROM attendaces JOIN users ON users.employee_id = attendaces.employee_id WHERE tgl between '".$_GET['dari']."'and '".$_GET['ke']."'";
                }else {
                    $data = "SELECT * FROM attendaces JOIN users ON users.employee_id = attendaces.employee_id";
                }

                $result = $db->query($data);
                // $folldata = $result->fetch_assoc();
                $nourut = 1;
                while($row = $result->fetch_assoc()) {
                    echo "<tbody>";
                            echo "<tr>";
                            echo "<td>". $nourut++ . "</td>";
                            echo "<td>" .$row['fullname']. "</td>";
                            echo "<td>" .$row['employee_id']. "</td>";
                            echo "<td>" .$row['tgl'] . " </td>";
                            echo "<td>" . $row['clock_in'] . "</td>";
                            echo "<td>" . $row['clock_out'] . "</td>";
                            echo "</tr>"; 
                        }
                    echo "</tbody>";
                        ?>
            </table>
        </div>
    </div>
</div>

</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->

    <?php include('../template/footer.php') ?>
   
</body>

</html>