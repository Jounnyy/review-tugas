<?php
session_start();
if (!$_SESSION['status']) {
    header("Location: index.php?message=Blum login");
} else if ($_SESSION['role'] == 'user') {
    header("location: dashboard/index.php");
}

include "koneksi.php";
$id = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = $db->query($sql);


?>

<?php while ($row = $result->fetch_assoc()) : ?>
    <form action="" method="post" id="insert">
        <input type="hidden" value="<?= $row['id']; ?>" name="id">
        <label for="fullname">Nama Lengkap</label>
        <input type="text" id="fullname" name="fname" value="<?= $row['fullname']; ?>"><br>
        <label for="emp_id">Employee_id</label>
        <input type="text" id="emp_id" name="emp_id" value="<?= $row['employee_id']; ?>"><br>
        <label for="selek">Role </label>
        <select id="selek" form="insert" name="selek">
            <option value="<?= $row['role']; ?>"><?= $row['role']; ?></option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select><br>
        <label for="pass">Password</label>
        <input type="password" id="pass" name="pass">
        <input type="hidden" name="def_pass" value="<?= $row['pass']; ?>">
        <br>
        <input type="reset">
        <button name="btn" id="btn">Submit</button><br>
    </form>
<?php endwhile; ?>

<?php
if (isset($_POST['btn'])) {
    if (isset($_POST['pass'])) {
        $pwuerd = $_POST['def_pass'];
    } else if (!isset($_POST['pass'])) {
        // $eng = $_POST['pass'];
        $enk = hash('sha224', '$_POST["pass"]');
        $pwuerd = $enk;
    }
    $id = $_POST['id'];
    $emp_id = $_POST['emp_id'];
    $fullname = $_POST['fname'];
    $pass = $_POST['pass'];
    $role = $_POST['selek'];
    $result_pass = $pwuerd;

    $sql = "UPDATE users SET employee_id = '$emp_id', fullname = '$fullname', role = '$role', pass = '$result_pass' WHERE id = $id";
    $db->query($sql);
    if ($db->affected_rows > 0) {
        echo "
            <script>
            alert('Data Berhasil Diubah');
            </script>
             ";
    }
    header('location: dashboard/index-admin.php');
}
?>