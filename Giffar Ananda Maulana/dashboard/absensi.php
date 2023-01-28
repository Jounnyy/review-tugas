<?php
include("./header.php");
include("../connection.php");
if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../index.php?message=silahkan login terlebih dahulu");
}
$tgl = date('Y-m-d');
$time = date('H:i:s');
$employee_id = $_SESSION['employee_id'];

$get_absen = "SELECT clock_in, clock_out FROM attendaces WHERE employee_id = $employee_id AND tgl = '$tgl'";
$absen = $db->query($get_absen);
$row = $absen->fetch_assoc();


?>
<div class="content container mt-4">
    <div class="d-flex align-items-center h-100 ">
        <div class="container m-auto text-center">
            <div class="row justify-content-around ">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body my-5">
                            <h5 class="fs-3 card-title mb-5">Absen Masuk</h5>
                            <?php
                            if (isset($row["clock_in"])) {
                                echo "<p class='fs-1 card-text mb-5'> " . $row['clock_in'] . "</p>";
                            } else {
                                echo "<p class='card-text mb-5'> ----- </p>";
                            }
                            // Menampilkan pesan jika ada
                            if (isset($_GET['message'])) {
                                $message = $_GET['message'];
                                echo "<p class='fs-5  text-capitalize card-text mb-5'>$message</p>";
                            }

                            ?>
                            <form action="./action.php" method="POST">
                                <button type="submit" name="absen_in" class="col-8 btn btn-lg btn-success">Absen Masuk</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body my-5">
                            <h5 class="fs-3 card-title mb-5">Absen Keluar</h5>
                            <?php
                            if (isset($row["clock_out"])) {
                                echo "<p class='fs-1 card-text mb-5'> " . $row['clock_out'] . "</p>";
                            } else {
                                echo "<p class='card-text mb-5'> ----- </p>";
                            }
                            // Menampilkan pesan jika ada
                            if (isset($_GET['status'])) {
                                $status = $_GET['status'];
                                echo "<p class='fs-5  text-capitalize card-text mb-5'>$status</p>";
                            }
                            ?>
                            <form action="./action.php" method="POST">
                                <button type="submit" name="absen_out" class="col-8 btn btn-lg btn-danger">Absen Keluar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("./footer.php");
?>