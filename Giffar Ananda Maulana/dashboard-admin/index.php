<?php
include("./header-admin.php");

?>
<div class="content container mt-4">
    <div class="px-2 py-4">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="row justify-content-end">
                    <?php
                    include("../connection.php");

                    $roles = array("Warehouse", "Purchasing", "QA/QC", "Engineer", "Marketing", "Maintenance",);
                    foreach ($roles as $role) {
                        $sql = "SELECT COUNT(*) as jumlah FROM users WHERE role='$role'";
                        $result = $db->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            $jumlah_role = $row["jumlah"];
                        } else {
                            $jumlah_role = 0;
                        }
                        echo '<div class="col-sm-3 p-1">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">' . $role . '</h5>
                                <p class="fs-5 card-text"><i class="bi bi-person-circle"></i> ' . $jumlah_role . '</p>
                            </div>
                        </div>
                        </div>';
                    }
                    $db->close();
                    ?>
                </div>
            </div>
            <div class="px-4 py-2">
                <div style="height:370px; width:480px; position:absolute; top: 220px;">
                    <h1 class="mt-4 fs-2">AKTIVITAS <i class="bi-primary bi-clock-fill"></i></h1>
                    <table class="table col-md-12 mt-4  table-bordered-none table-fixed" cellspacing="0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center th-sm" style="position:sticky; top:0;">No</th>
                                <th class="text-center th-sm" style="position:sticky; top:0;">NIP</th>
                                <th class="text-center th-sm" style="position:sticky; top:0;">Absen Masuk</th>
                                <th class="text-center th-sm" style="position:sticky; top:0;">Absen Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../connection.php");
                            date_default_timezone_set("Asia/Jakarta"); //GMT +07

                            $time = date('h:i:s');
                            $no = 1;

                            $data_absen = mysqli_query($db, "SELECT * FROM attendaces ORDER BY id DESC LIMIT 5");

                            while ($row = mysqli_fetch_array($data_absen)) {

                            ?>

                                <tr>
                                    <td align=" center"> <?= $no++; ?></td>
                                    <td align="center"> <?php echo  $row['employee_id']; ?></td>
                                    <td align="center"> <?php echo  $row['clock_in']; ?></td>
                                    <td align="center"> <?php echo  $row['clock_out']; ?></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("./footer-admin.php");
?>