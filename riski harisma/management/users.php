<table class="table">
    <tr class="tr">
        <th class="th">No.</th>
        <th class="th">User_id</th>
        <th class="th">Nama</th>
        <th class="th">Jabatan</th>
        <th class="th" colspan="2">Aksi</th>
    </tr>

    <?php
    include("../connection.php");
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT * FROM users";
    $result = $db->query($sql);
    $no = 1;
    while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $data['user_id'] . "</td>";
        echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
        echo "<td class='td'>" . $data['role'] . "</td>";
        echo "<td class='td'>
        <form action='../dashboard/index-admin.php?page=edit' method='POST'>
            <input type='hidden' name='user_id' value='" . $data['user_id'] . "'>
            <input type='hidden' name='password' value='" . $data['password'] . "'>
            <input type='hidden' name='nama' value='" . $data['nama_lengkap'] . "'>
            <button name='approve' type='submit' class='button'>Edit</button>
        </form>
        </td>";
        echo "<td class='td'>
        <form action='../action/user-edit.php?action=delete' method='POST'>
            <input type='hidden' name='user_id' value='" . $data['user_id'] . "'>
            <button name='delete' type='submit' class='button'>Delete</button>
        </form>
        </td>";
        echo "</tr>";
    }
    ?>
</table>
<div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
    <button style="text-align: center;" onclick="window.print()">Print Laporan</button>
</div>