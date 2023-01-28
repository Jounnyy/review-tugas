<?php 

include('../connection.php');
include('../Users.php');
session_start();
// echo $_SESSION['status'];
if(!isset($_SESSION['status']) || $_SESSION['status'] != 'login'){
    header('location:../index.php?message=Silahkan Login Terlebih Dahulu');
}

// if(isset($_SESSION['status']) || $_SESSION['status'] = 'login'){
    //     header('location:../attendance.php?message=mau');
    // }
    
    if(isset($_POST['logout'])){
        session_destroy();
        header('location:../index.php?message=berhasil keluar');
    }
    
    
    
$page = "datausers";
date_default_timezone_set('Asia/Jakarta');
$time = date('H:i:s');
$date = date('l,d F Y');
$datee = date('Y-m-d');

$page = "absensi";
$employee_id = $_SESSION['employee_id'];
$sql = "SELECT * FROM attendaces WHERE employee_id=$employee_id and tgl= '$datee'";
$clock = $db->query($sql);

if(isset($_POST['clock_out'])){
    $query = "UPDATE attendaces SET clock_out = '$time' WHERE employee_id = $employee_id AND tgl = '$datee'";
    $resut = $db->query($query);

    if($resut == TRUE){
        header('location:attendance.php?message= Terima Kasih Sudah Clock Out');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Log Attendaces</title>

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
<div class="card shadow mb-4" style="height: 100%;">
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary"  >Employee Absences</h4>
    </div>

    <?php if(isset($_GET['message'])) { ?>
        <div class="row justify-content-center mt-3 px-3" data-aos="fade-down">
            <div class="col-12 pt-auto">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= $_GET['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>
        </div>
        
    <?php }?>
    <div class="row justify-content-lg-end">
    <div class="col-auto">
        <a href="detail-att.php" class="btn btn-secondary mt-3 mr-3"><i class="bi bi-eye"></i> Log Attendances</a>
    </div>
</div>
    <div class="card-body" style="color: #000; padding-top: 100px;"  data-aos="fade-down" data-aos-delay=""> 
          <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <div class="card hidden border-1 shadow-lg">
                        <div class="card-body p-0">
                            <div class="text-center">
                                <div class="pt-3">
                                    <h3><?= $time ?></h3> 
                                    <p><?= $date ?></p>
                                    <div class="responsive d-flex px-4 justify-content-center">
                                        <textarea name="" id="" cols="40" rows="2" placeholder="Note"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-6 d-block">
                                            <form action="action.php" method="POST" >
                                                <button class="btn btn-primary d-inline " name="absen">Clock In</button>
                                            </form>
                                        </div>
                                        <?php while($row = $clock->fetch_assoc()) { ?>
                                        <?php if(empty($row['clock_out']) && !empty($row['clock_in'])  && $datee == $row['tgl'])  { ?>
                                        <div class="col-6 ">
                                            <form action="" method="post">
                                                <button class="btn btn-primary" name="clock_out" type="submit">Clock Out</button>
                                            </form>
                                        </div>
                                        <?php } else {?>
                                            <div class="col-6 ">
                                            <a href"#" class="btn btn-primary disabled" >Clock Out</a>
                                        </div>
                                        <?php }?>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-4 col-md-6 col-sm-10 text-center">
                <h4>Attendance Log</h4>
                <div class="row d-flex">
                    <div class="col-4 text-left">
                        <h5>Clock in: </h5>
                    </div>
                    <div class="col-8 text-right">
                        <span class="mr-3"> <?=   $row['tgl'] ?></span>
                        <span class="mr-3"> <?=   $row['clock_in'] ?></span>
                    </div>
                    <?php if(!empty($row['clock_out'])  && !empty('clock_in')) { ?>
                    <div class="col-4 text-left">
                        <h5>Clock out: </h5>
                    </div>
                    <div class="col-8 text-right d-block">
                        <span class="mr-3"> <?=   $row['tgl'] ?></span>
                        <span class="mr-3"><?=$row['clock_out'] ?></span>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
        
    </div>
</div>

</div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!-- <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer> -->
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include('../template/footer.php') ?>
   
</body>

</html>