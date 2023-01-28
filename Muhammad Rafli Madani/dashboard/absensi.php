<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<table class="table table-striped-columns">
  <tr>
    <th>Tanggal</th>
    <th>Jam Masuk</th>
    <th>Jam Keluar</th>
    <th>Performa</th>
  </tr>

  <style>
      tr{
    margin: auto;
    text-align: center;
    justify-content: center;
}
body{
        margin-left: 20px;
    }
  </style>

<?php
include("../connection.php");

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
  header("location:../index.php?message=silahkan login terlebih dahulu");
}

date_default_timezone_set("Asia/Jakarta"); //GMT +07

$tgl = date('Y-m-d');
$time = date('H:i:s');
$employee_id = $_SESSION['employee_id'];

$sql = "SELECT * FROM attendances WHERE employee_id=$employee_id";
$result = $db->query($sql);

while ($row = $result->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" .htmlspecialchars($row['tgl'] ). "</td>";
  echo "<td>" .htmlspecialchars($row['clock_in'])  . "</td>";

  if (empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']) {
    echo "<td>
    <form action='' method='POST' onsubmit='return alert(`terimakasih sudah bekerja hari ini`)'>
      <button type='submit' name='keluar'>KELUAR</button>
    </form>
    </td>";
  } else {
    echo "<td>" . $row['clock_out'] . "</td>";
  }
  echo "<td>👌</td>";
  echo "</tr>";
}
?>
</table>

<form action="action.php" method="POST">
  <button type="submit" name="absen" class="btn btn-secondary" >ABSEN SEKARANG</button>
</form>

<?php
if (isset($_POST['keluar'])) {
  $update = "UPDATE attendances SET clock_out='$time' WHERE employee_id=$employee_id AND tgl='$tgl'";

  $clock_out = $db->query($update);
  if ($clock_out === TRUE) {
    session_start();
    session_destroy();
    header("location:../index.php");
  }

}
?>