<table class="table">
    <tr class="tr">
        <th class="th">No.</th>
        <th class="th">User_id</th>
        <th class="th">Nama</th>
        <th class="th">Tanggal Izin</th>
        <th class="th">Sampai Dengan</th>
        <th class="th">Alasan</th>
        <th class="th">Status</th>
        <th class="th" colspan="2">Aksi</th>
    </tr>

    <?php
    include("../connection.php");
    $user_id = $_SESSION['user_id'];

    $sql = "SELECT *, izin.id as izin_id FROM izin join users on izin.user_id = users.user_id order by users.user_id ";
    $result = $db->query($sql);
    $no = 1;
    while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $data['izin_id'] . "</td>";
        echo "<td class='td'>" . $data['nama_lengkap'] . "</td>";
        echo "<td class='td'>" . $data['tgl_awal'] . "</td>";
        echo "<td class='td'>" . $data['tgl_akhir'] . "</td>";
        echo "<td class='td'>" . $data['alasan'] . "</td>";
        echo "<td class='td'>" . $data['status'] . "</td>";
        echo "<td class='td'>
                <form action='../action/approve.php' method='POST'>
                    <input type='hidden' name='status' value='diizinkan'>
                    <input type='hidden' name='izin_id' value='" . $data['izin_id'] . "'>
                    <button name='approve' type='submit' class='button'>✔</button>
                </form>
        </td>";
        echo "<td class='td'>
                <form action='../action/approve.php' method='POST'>
                    <input type='hidden' name='izin_id' value='" . $data['izin_id'] . "'>
                    <input type='hidden' name='status' value='ditolak'>
                    <button name='approve' type='submit' class='button'>❌</button>
                </form>
        </td>";
        echo "</tr>";
    }
    ?>
</table>
<div style="display: flex; justify-content:center;align-items:center; margin-top: 20px;">
    <button style="text-align: center;" onclick="window.print()">Print Laporan</button>
</div>