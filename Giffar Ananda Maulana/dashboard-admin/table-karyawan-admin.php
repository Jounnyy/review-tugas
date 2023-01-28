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
                    <th class="text-center th-sm" style="position:sticky; top:0;">Jenis Kelamin</th>
                    <th class="text-center th-sm" style="position:sticky; top:0;">Role</th>
                    <th class="text-center th-sm" style="position:sticky; top:0;">Action</th>
                </tr>

                <?php
                include("../connection.php");
                date_default_timezone_set("Asia/Jakarta"); //GMT +07

                $time = date('h:i:s');
                $no = 1;

                if (isset($_GET['keyword'])) {
                    $searchInput = $_GET['keyword'];
                    $query = "SELECT * FROM users WHERE role != 'admin' AND (employee_id LIKE '%$searchInput%' OR fullname LIKE '%$searchInput%' OR jenis_kelamin LIKE '%$searchInput%' OR role LIKE '%$searchInput%') ORDER BY id DESC";
                } else {
                    $query = "SELECT * FROM users WHERE role != 'admin' ORDER BY id DESC";
                }
                $data_absen = mysqli_query($db, $query);
                if ($data_absen) {
                    while ($row = mysqli_fetch_assoc($data_absen)) {
                        echo "<tr class='text-capitalize'>";
                        echo "<td align='center'>" . $no++ . "</td>";
                        echo "<td align='center'>" . $row['employee_id'] . "</td>";
                        echo "<td align='center'>" . $row['fullname'] . "</td>";
                        echo "<td align='center'>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td align='center'>" . $row['role'] . "</td>";
                ?>
                        <td>
                            <a class="btn btn-sm btn-primary" href="edit.php?id=<?= $row["id"] ?>"><i class="bi bi-pencil-square"></i> Edit</a>
                            <a class="btn btn-sm btn-danger" href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?');"><i class="bi bi-trash"></i> Delete </a>
                        </td>
                <?php
                        echo "</tr>";
                    }
                } else {
                    echo "Error: " . mysqli_error($db);
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<?php
include("./footer-admin.php");
?>