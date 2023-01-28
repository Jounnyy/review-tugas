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
$time = date('H:i:s');
$employee_id = $_SESSION['employee_id'];

$sql = "SELECT * FROM attendance WHERE employee_id=$employee_id";
$result = $db->query($sql);
 
while($row = $result->fetch_assoc())
{
  echo "<tr>";
  echo "<td>" . $row['tgl'] . "</td>";
  echo "<td>" . $row['clock_in'] . "</td>";

  if (empty($row['clock_out']) && !empty($row['clock_in']) && $tgl == $row['tgl']) 
  {
    
    echo "<td>
    <form action='' method = 'POST'>
    <button type = 'SUBMIT' name = 'keluar'>KELUAR</button></td>
    </form>
        </td>";

  } else 
  {
    
    echo "<td>" . $row['clock_out'] . "</td>";
  }
  echo "<td>😂</td>";
  echo "</tr>";
}


?>

</table>

<form action="action.php" method="POST">
  <button type="submit" name="absen" class="absensekarang">ABSEN SEKARANG</button>
</form>

<?php
    if(isset($_POST['keluar']))
    {
        $update = "UPDATE attendance SET clock_out='$time' WHERE
        employee_id = $employee_id && tgl = '$tgl'";

        $clock_out = $db-> query($update);
        if($clock_out === true)
        {   
            session_start();
            session_destroy();
            header("location:../index.php");
        }
    }
?>