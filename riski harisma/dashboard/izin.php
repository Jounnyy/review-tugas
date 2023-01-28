<form action="index.php?page=request" name="izin" method="POST">
    <button type="submit">+Izin</button>
</form>
<br>
<table class="table">
    <tr class="tr">
        <th class="th">No</th>
        <th class="th">Tanggal Izin</th>
        <th class="th">Sampai Dengan</th>
        <th class="th">alasan</th>
        <th class="th">Status</th>
    </tr>
    <?php
    include("../connection.php");
    $user_id = $_SESSION['user_id'];
    // var_dump($user_id);

    $sql = "SELECT * FROM izin  WHERE user_id = '$user_id'";
    $result = $db->query($sql);
    $no = 1;
    while ($data = $result->fetch_assoc()) {
        echo "<tr class='tr'>";
        echo "<td class='td'>" . $no++ . "</td>";
        echo "<td class='td'>" . $data['tgl_awal'] . "</td>";
        echo "<td class='td'>" . $data['tgl_awal'] . "</td>";
        echo "<td class='td'>" . $data['alasan'] . "</td>";
        echo "<td class='td'>" . $data['status'] . "</td>";
        echo "</tr>";
    }
    ?>

</table>