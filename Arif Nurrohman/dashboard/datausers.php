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

$page = "datausers";



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Karyawan</title>

    <!-- Custom fonts for this template-->
    <link href="..sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../sbadmin/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="../sbadmin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
        <h6 class="m-0 font-weight-bold text-primary" data-aos="fade-down">DataSeluruh Karyawan</h6>
        <a href="#" class="btn btn-primary flex my-4" data-toggle="modal" data-target="#TambahUser" >Tambah User +</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Emloyee Id</th>
                        <th>Name</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Name</th>
                        <th>Emloyee Id</th>
                        <th>Role</th>
                    </tr>
                </tfoot>
                <?php
                $data = "SELECT * FROM users ";
                $result = $db->query($data);
                // $folldata = $result->fetch_assoc();
                
                while($row = $result->fetch_assoc()) {
                        echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" .$row['employee_id']. "</td>";
                            echo "<td>" .$row['fullname'] . " </td>";
                            echo "<td>" . $row['role'] . "</td>";
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
    <div class="modal py-5" id="TambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog py-4" role="document">
            <div class="modal-content mb-4" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="tambahuser.php" method="post">
                        <div class="container" class="form-group">
                            <div class="row">
                                <div class="col-12">
                                <label for="">Input Employee ID</label>
                                <input type="text" name="employee_id" class="form-control" placeholder="102">
                            </div>
                            <div class="col-12">
                                <label for="">Input Nama Lengkap</label>
                                <input type="text" name="fullname" class="form-control" placeholder="Hulk">
                            </div>
                            <div class="col-12">
                                <label for="">Input Role</label>
                                <!-- <input type="text" name="role" class="form-control" placeholder="Admin"> -->
                                <select name="role" id="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="programmer">Programmer</option>
                                    <option value="manager">Manager</option>
                                    <option value="itdev">IT Dev</option>
                                </select>
                                    
                            </div>
                            <div class="col-12">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="*****">
                            </div>
                            <div class="col-12 pl-auto">
                                <button class="btn btn-primary mt-3 mx-auto" name="createuser">
                                    Save
                                </button>
                            </div>
                        </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('../template/footer.php') ?>
   
</body>

</html>