<table class="table">
    <tr class="tr">
        <th class="th">No.</th>
        <th class="th">ID</th>
        <th class="th">Nama</th>
        <th class="th">Jabatan</th>
        <th class="th">Tanggal</th>
        <th class="th">Jam Masuk</th>
        <th class="th">Jam Keluar</th>

    </tr>

    <?php
    include("../connection.php");
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT  * FROM users join absensi on users.user_id = absensi.user_id order by users.user_id";
    $result = $db->query($sql);
    $no = 1;
    while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $data['user_id'] . "</td>";
        echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
        echo "<td class='td'>" . $data['role'] . "</td>";
        echo "<td class='td'>" . $data['tgl'] . "</td>";
        echo "<td class='td'>" . $data['jam_masuk'] . "</td>";
        echo "<td class='td'>" . $data['jam_keluar'] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
    <button style="text-align: center;" onclick="window.print()">Print Laporan</button>
</div>