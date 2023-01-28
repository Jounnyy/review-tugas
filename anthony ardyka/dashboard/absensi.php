

<table border="1" id="datatablesSimple">
  <thead>
    <tr>
      <th>Tanggal</th>
      <th>Jam Masuk</th>
      <th>Jam Keluar</th>
      <th>Peforma</th>
    </tr>
  </thead>

  <tbody>
    <?php
    include("../connection.php");

    date_default_timezone_set("Asia/Jakarta"); //GMT +07

    $tgl = date('Y-m-d');
    $time = date('H:i:s');
    $employee_id = $_SESSION['employee_id'];

    $sql = "SELECT  tgl, fullname , a.clock_in , a.clock_out , u.clock_in as clock_in_user  FROM attendances a join users u on a.employee_id = u.employee_id WHERE a.employee_id=$employee_id";
    $result = $db->query($sql);


    while ($row = $result->fetch_assoc()) {
      if ($row['clock_in_user'] >= $row['clock_in']) {
        $peforma = "Good 😉";
    }elseif($row['clock_in_user'] < $row['clock_in']){
        $peforma = "Bad 😞";
    }   
      echo "<tr>";
      echo "<td>" . $row['tgl'] . "</td>";
      echo "<td>" . $row['clock_in'] . "</td>";

      if (empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']) {
        echo "<td>
    <form action='' method='POST' onsubmit='return alert(`terimakasih sudah bekerja hari ini`)'>
      <button class='btn btn-danger' type='submit' name='keluar'>KELUAR</button>
    </form>
    </td>";
      } else {
        echo "<td>" . $row['clock_out'] . "</td>";
      }
      echo "<td>$peforma</td>";
      echo "</tr>";
    }
    ?>
  </tbody>

</table>

<form action="action.php" method="POST">
  <button type="submit" class="btn btn-primary" name="absen">ABSEN SEKARANG</button>
</form>

<?php
if (isset($_POST['keluar'])) {
  $update = "UPDATE attendances SET clock_out='$time' WHERE employee_id=$employee_id AND tgl='$tgl'";

  $clock_out = $db->query($update);
  if ($clock_out === TRUE) {
    session_destroy();
    header("location:../index.php");
  }
}
?>