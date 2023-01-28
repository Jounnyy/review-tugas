<table border="1">
  <tr>
    <th>Tanggal</th>
    <th>Jam Masuk</th>
    <th>Jam Keluar</th>
    <th>Performa</th>
  </tr>

<?php
include("../connection.php");

date_default_timezone_set("Asia/Jakarta"); //GMT +07

$tgl = date('Y-m-d');
$clock_in = date('H:i:s');
$employee_id = $_SESSION['employee_id'];

$sql = "SELECT * FROM attendaces WHERE employee_id=$employee_id";
$result = $db->query($sql);

$page = "absensi";

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $row['tgl'] . "</td>";
  echo "<td>" . $row['clock_in'] . "</td>";

  if (empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']) {
    echo "<td>
    <form action='' method='POST' onsubmit='return alert(`terimakasih sudah bekerja hari ini`)'>
      <button type='submit' name='keluar'>KELUAR</button>
    </form>
    </td>";
  } else {
    echo "<td>" . $row['clock_out'] . "</td>";
  }
  echo "<td>😂</td>";
  echo "</tr>";
}
?>
</table>

<form action="action.php" method="POST">
  <button type="submit" name="absen" style="margin-top: 10px">ABSENn SEKARANG</button>
</form>

<?php
if (isset($_POST['keluar'])) {
  $update = "UPDATE attendaces SET clock_out='$clock_in' WHERE employee_id=$employee_id AND tgl='$tgl'";

  $clock_out = $db->query($update);
  if ($clock_out === TRUE) {
    session_start();
    session_destroy();
    header("location:../index.php");
  }

}
?>