<?php
include("./header.php");
?>
<div class="content container text-center mt-4">
    <div class="container text-center">
        <div class="d-flex justify-content-evenly m-auto">
            <form method="POST" class="row mt-4">
                <div class="col-auto">
                    <input type="date" name="dari_tgl" class="form-control">
                </div>
                <div class="col-auto ">
                    <p class="text-center my-2">s/d</p>
                </div>
                <div class="col-auto">
                    <input type="date" name="sampai_tgl" class="form-control">
                </div>
                <div class="col-auto">
                    <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>
    </div>
    <div class=" scroll" style="height:450px; overflow: scroll;">
        <table class="table col-md-12 mt-4  table-bordered table-fixed" cellspacing="0">
            <tr class="table-primary">
                <th class="text-center th-sm" style="position:sticky; top:0;">No</th>
                <th class="text-center th-sm" style="position:sticky; top:0;">Tanggal</th>
                <th class="text-center th-sm" style="position:sticky; top:0;">Absen Masuk</th>
                <th class="text-center th-sm" style="position:sticky; top:0;">Absen Keluar</th>
            </tr>

            <?php
            include("../connection.php");
            date_default_timezone_set("Asia/Jakarta"); //GMT +07

            $time = date('h:i:s');
            $no = 1;
            $employee_id = $_SESSION['employee_id'];

            if (isset($_POST['filter'])) {
                $dari_tgl = mysqli_real_escape_string($db, $_POST['dari_tgl']);
                $sampai_tgl = mysqli_real_escape_string($db, $_POST['sampai_tgl']);

                if ($dari_tgl != NULL || $sampai_tgl != NULL) {
                    $data_absen = mysqli_query($db, "SELECT * FROM attendaces WHERE employee_id=$employee_id AND tgl BETWEEN '$dari_tgl' AND '$sampai_tgl' ORDER BY id DESC");
                } else {
                    $data_absen = mysqli_query($db, "SELECT * FROM attendaces WHERE employee_id=$employee_id");
                }
            } else {
                $data_absen = mysqli_query($db, "SELECT * FROM attendaces WHERE employee_id=$employee_id ORDER BY id DESC");
            }
            while ($row = mysqli_fetch_array($data_absen)) {

            ?>
                <tr>
                    <td align=" center"> <?= $no++; ?></td>
                    <td align="center"> <?php echo  $row['tgl']; ?></td>
                    <td align="center"> <?php echo  $row['clock_in']; ?></td>
                    <td align="center"> <?php echo  $row['clock_out']; ?></td>
                </tr>
            <?php
            }
            ?>

        </table>
    </div>
</div>
</div>
<?php
include("./footer.php");
?>