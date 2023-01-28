<div class="wrapper-absensi">

    <table class="table">
        <tr class="tr">
            <th class="th">Tanggal</th>
            <th class="th">Clock In</th>
            <th class="th">Clock Out</th>
            <th class="th">Performa</th>
        </tr>

        <?php

        include("../connection.php");
        date_default_timezone_set("Asia/Jakarta");
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT * FROM absensi where user_id = '$user_id'";
        $result = $db->query($sql);
        $tgl = date('Y-m-d');

        while ($data = $result->fetch_assoc()) {
            echo "<tr class='tr'>";
            echo "<td class='td'>" . $data['tgl'] . "</td>";
            if (empty($data['jam_masuk']) && $data['tgl'] == $tgl) {
                echo "
            <td class='td'>
                <form action='../action/clockin.php' method='POST'>
                    <button name='clockout' type='submit'>Absen</button>
                </form>
            </td>";
            } else {
                echo "<td class='td'>" . $data['jam_masuk'] . "</td>";
            }
            if (empty($data['jam_keluar']) && $data['jam_masuk'] && $data['tgl'] == $tgl) {
                echo "
            <td class='td'>
                <form action='../action/clockout.php' method='POST'>
                    <button name='clockout' type='submit'>Keluar</button>
                </form>
            </td>";
            } else {
                echo "<td class='td'>" . $data['jam_keluar'] . "</td>";
            }
            if (!empty($data['jam_keluar']) && !empty($data['jam_masuk'])) {
                echo "<td class='td'>🔥</td>";
            } else {
                echo "<td class='td'>❌</td>";
            }
            echo "</tr>";
        }
        ?>

    </table>
</div>