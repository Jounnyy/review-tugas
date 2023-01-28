<h3>Kehadiran</h3>
<div class="d-flex justify-content-between">
    <form action="action.php" method="POST">
        <button type="submit" name="absen" class="btn hvr-ripple-out mb-1 fw-semibold">ABSEN SEKARANG</button>
    </form>
    <form action="" method="post" class="ps-3 float-end">
        <button name="logout" type="submit" class="btn btn-outline-secondary hvr-bob text-light">Logout</button>
    </form>
</div>
<div class="overflow-auto" style="height: 75vh">
    <table class="table">
        <tr class="table-dark">
            <th>No</th>
            <th>Hari</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Performa</th>
        </tr>
        <?php
        include '../koneksi.php';
        if (!$_SESSION['status']) {
            header("Location:../index.php?message=Login dlu!");
        }

        date_default_timezone_set("Asia/Jakarta");
        $tgl = date('d-m-Y');
        $time = date('H:i:s');
        $employee_id = $_SESSION['employee_id'];

        $sql = "SELECT * FROM attendances WHERE employee_id=$employee_id";
        $result = $db->query($sql);

        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row['hari'] . "</td>";
            echo "<td>" . $row['tgl'] . "</td>";
            echo "<td>" . $row['clock_in'] . "</td>";

            if (empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']) {
                echo "<td>
            <form action='' method='POST'>
            <button class='btn btn-sm btn-outline-dark' type='submit' name='keluar' style='backdrop-filter: blur(20px); background-color: rgba(255, 255, 255, 0.13);'>KELUAR</button>
            </form>
            </td>";
            } else {
                echo "<td>" . $row['clock_out'] . "</td>";
            }
            $in = intval($row['clock_in']);
            $out = intval($row['clock_out']);
            $bar = $in + $out;
            echo "<td>
        <div style='backdrop-filter: blur(20px); background-color: rgba(255, 255, 255, 0.13);' class='progress' role='progressbar' aria-label='Animated striped example' aria-valuenow='$bar' aria-valuemin='0' aria-valuemax='100'>
            <div class='progress-bar bg-dark progress-bar-striped progress-bar-animated' style='width: $bar%'></div>
        </div> 
            </td>";
            echo "</tr>";
            $no++;
        }
        ?>
    </table>
</div>


<?php
if (isset($_POST['keluar'])) {
    $update = "UPDATE attendances SET clock_out='$time' WHERE employee_id=$employee_id AND tgl='$tgl'";

    $clock_out = $db->query($update);
    if ($clock_out === true) {
        session_destroy();
        header("location:../index.php?message=anda sudah membuat jam keluar");
    }
}
?>