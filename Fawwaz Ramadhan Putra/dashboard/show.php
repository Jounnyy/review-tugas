<?php
    session_start();
    include ("../connection.php");
    include ("../Users.php");
    if( $_SESSION['status'] != "login")
    {
        header("location:../index.php?message=silahkan login terlebih dahulu");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style2.css">
    <title>Show Attendance</title>
</head>
<body  class="show-body">
    <div class="show-container">
    <table border="1">
        <tr>
            <th>id</th>
            <th>employee_id</th>
            <th>Tanggal</th>
            <th>clock_in</th>
            <th>clock_out</th>
        </tr>
        <?php
            $sql = "SELECT * FROM attendance ORDER BY id";
            $result = $db->query($sql);
            while($row = $result->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['employee_id'] . "</td>";
            echo "<td>" . $row['tgl'] . "</td>";
            echo "<td>" . $row['clock_in'] . "</td>";
            echo "<td>" . $row['clock_out'] . "</td>";
            echo "</tr>";
        }
        ?>

        <div class="back-container">
            <form action="admin-page.php" method="POST" class="back">
                <button type="submit" class="back" name="back">Back</button>
            </form>
        </div>
    </div>


</body>
</html>