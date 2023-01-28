<?php
include("./header-admin.php");

?>

<div class="content container text-center mt-4">
    <div class="px-4 py-4">
        <nav class="col-sm-4">
            <div class="container">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" name="keyword" type="text" placeholder="Search" aria-label="Search" autofocus autocomplete="off">
                    <button class="btn btn-success" type="submit" name="cari">Search</button>
                </form>
            </div>
        </nav>
        <div class=" scroll" style="height:470px; overflow: scroll;">
            <table class="table col-md-12 mt-4  table-bordered table-fixed" cellspacing="0">
                <tr class="table-primary">
                    <th class="text-center th-sm" style="position:sticky; top:0;">No</th>
                    <th class="text-center th-sm" style="position:sticky; top:0;">NIP</th>
                    <th class="text-center th-sm" style="position:sticky; top:0;">Nama</th>
                    <th class="text-center th-sm" style="position:sticky; top:0;">Tanggal</th>
                    <th class="text-center th-sm" style="position:sticky; top:0;">Absen Masuk</th>
                    <th class="text-center th-sm" style="position:sticky; top:0;">Absen Keluar</th>
                </tr>

                <?php
                include("../connection.php");
                date_default_timezone_set("Asia/Jakarta"); //GMT +07
                $employee_id = $_SESSION['employee_id'];

                $no = 1;

                if (isset($_GET['keyword'])) {
                    $searchInput = $_GET['keyword'];
                    $query = "SELECT attendaces.*, users.fullname FROM attendaces JOIN users ON attendaces.employee_id = users.employee_id WHERE users.role != 'admin' AND (attendaces.employee_id LIKE '%$searchInput%' OR users.fullname LIKE '%$searchInput%' OR attendaces.tgl LIKE '%$searchInput%') ORDER BY attendaces.id DESC";
                } else {
                    $query = "SELECT attendaces.*, users.fullname FROM attendaces JOIN users ON attendaces.employee_id = users.employee_id WHERE users.role != 'admin' ORDER BY attendaces.id DESC";
                }
                $data_absen = mysqli_query($db, $query);
                if ($data_absen) {
                    while ($row = mysqli_fetch_assoc($data_absen)) {
                        echo "<tr>";
                        echo "<td class='text-capitalize' align='center'>" . $no++ . "</td>";
                        echo "<td class='text-capitalize' align='center'>" . $row['employee_id'] . "</td>";
                        echo "<td class='text-capitalize' align='center'>" . $row['fullname'] . "</td>";
                        echo "<td class='text-capitalize' align='center'>" . $row['tgl'] . "</td>";
                        echo "<td class='text-capitalize' align='center'>" . $row['clock_in'] . "</td>";
                        echo "<td class='text-capitalize' align='center'>" . $row['clock_out'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Error: " . mysqli_error($db);
                }
                ?>

            </table>
        </div>
    </div>

    <?php
    include("./footer-admin.php");
    ?>