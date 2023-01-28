<?php
include "../koneksi.php";
session_start();
ob_start();
if (!$_SESSION['status']) {
    header("Location:../index.php?message=Login dlu!");
}
?>
<link rel="stylesheet" href="../gradien.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

<style>
    body::-webkit-scrollbar {
        display: none;
    }
</style>

<body>
    <h4 class="text-center pt-2 text-light">Hello Admin <?= $_SESSION['fullname']; ?></h4>

    <h2 class="text-light p-2">Data Absen Pegawai</h2>
    <table class="table" style="width: 100%;">
        <tr class="table-dark table-striped">
            <th>Employee_id</th>
            <th>Tanggal</th>
            <th>Jam Masuk</th>
            <th>Jam Keluar</th>
            <th>Aksi</th>
        </tr>
        <?php

        $sql = "SELECT * FROM attendances";
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>";
            echo "<td>" . $row['employee_id'] . "</td>";
            echo "<td>" . $row['tgl'] . "</td>";
            echo "<td>" . $row['clock_in'] . "</td>";
            echo "<td>" . $row['clock_out'] . "</td>";
            echo "<td>
            <form action='' method='post'>
            <button class='btn btn-outline-danger text-light' name='hps2' id='hapus' value='$id'>Hapus</button>
            </form>
                 </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- <h2 class="text-light">Data Users</h2>
    <table class="table" style="width: 100%;">
        <tr class="table-dark">
            <th>Employee_id</th>
            <th>Nama Lengkap</th>
            <th>Role</th>
            <th>Password</th>
            <th>Aksi</th>
        </tr>
        <?php

        $sql = "SELECT * FROM users";
        $result = $db->query($sql);

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            echo "<tr>";
            echo "<td>" . $row['employee_id'] . "</td>";
            echo "<td>" . $row['fullname'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td>" . $row['pass'] . "</td>";
            echo "<td>
            <form action='../edit.php?id=$id' method='post'>
            <button class='btn btn-outline-primary text-light' name='edit' id='edit'>Edit</button>
            </form>
            <form action='' method='post'>
            <button class='btn btn-outline-danger text-light' name='hps' id='hapus' value='$id'>Hapus</button>
            </form>
                 </td>";
            echo "</tr>";
        }
        ?>
    </table> -->

    <div class="d-flex justify-content-between ps-2 pe-2">
        <form action="" method="post">
            <button class="btn btn-secondary text-light" name="tmbh">Tambah</button>
        </form>
        <form action="" method="post">
            <button class="btn btn-light text-dark" name="logout">Logout</button>
        </form>
        <form action="" method="post">
            <button class="btn btn-danger" name="btl">Batal</button>
        </form>
    </div>


</body>
<?php
if (isset($_POST['tmbh'])) {
    include "../tambah.php";
} else if (isset($_POST['btl'])) {
    DEFAULT_INCLUDE_PATH;
}

if (isset($_POST['btn'])) {
    $emp_id = $_POST['emp_id'];
    $fullname = $_POST['fname'];
    $pass = $_POST['pass'];
    $role = $_POST['selek'];
    $enk_pas = hash('sha224', '$pass');

    $sql = "INSERT INTO users (id, employee_id, fullname, role, pass) VALUES ('', '$emp_id', '$fullname', '$role', '$enk_pas')";
    $db->query($sql);
    if ($db->affected_rows > 0) {
        echo "
            <script>
            alert('Pengguna Berhasil Ditambah');
            </script>
             ";
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location:../index.php?message=Keluar dari sistem");
}
if (isset($_POST['hps'])) {
    $idd = $_POST['hps'];
    $sql = "DELETE FROM users WHERE id=$idd";
    $db->query($sql);
    if ($db->affected_rows > 0) {
        echo "
            <script>
            alert('Berhasil Dihapus');
            </script>
             ";
    }
}
if (isset($_POST['hps2'])) {
    $idd = $_POST['hps2'];
    $sql = "DELETE FROM attendances WHERE id=$idd";
    $db->query($sql);
    if ($db->affected_rows > 0) {
        echo "
            <script>
            alert('Berhasil Dihapus');
            </script>
             ";
    }
}
?>