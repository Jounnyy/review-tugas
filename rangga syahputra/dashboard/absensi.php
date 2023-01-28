<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2ce69c7166.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="dashboard-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>

    <table class="table table-striped ms-2 me-2 mt-2" style="width:98%">
        <tr class="tr-header table-dark">
            <th>Tanggal</th>
            <th>Clock In</th>
            <th>Clock Out</th>
            <th>Performa</th>
        </tr>

        <?php
        include("../connection.php");
        date_default_timezone_set("Asia/Jakarta");
        date_default_timezone_set("Asia/Jakarta");
        $user_id = $_SESSION["user_id"];
        $tgl = date("Y-m-d");
        $time = date("H:i:s");

        if (isset($_POST["clockout"])) {
            $sql = "UPDATE absensi SET jam_keluar= '$time' WHERE user_id='$user_id' AND tgl='$tgl'";
            $clockout = $db->query($sql);
            if ($clockout == TRUE) {
                session_start();
                session_destroy();
                header("location:../index.php?message=Terimakasih dengan kinerja hari ini!!");
            } else {
                echo "maaf terjadi kesalahan";
            }
        };


        $user_id = $_SESSION["user_id"];
        $sql = "SELECT * FROM absensi WHERE user_id = '$user_id' ";
        $result = $db->query($sql);

        while ($data = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $data['tgl'] . "</td>";
            echo "<td>" . $data['jam_masuk'] . "</td>";
            if (empty($data["jam_keluar"]) && !empty($data["jam_masuk"]) && $data["tgl"] == $tgl) {
                echo "<td>
            <form action='' method ='POST'>
            <button class='btn btn-danger' name ='clockout' type='submit'>Keluar</button>
            </form>
            </td>";
            } else {
                echo "<td>" . $data['jam_keluar'] . "</td>";
            };

            if (!empty($data["jam_keluar"]) && !empty($data["jam_masuk"])) {
                echo "<td>✔</td>";
            } else {
                echo "<td>❌</td>";
            }
            echo "</tr>";
        };
        ?>
    </table>

    <form action="action.php" method="POST">
        <button class="btn btn-success ms-2" name="absen" type="submit">ABSENSI</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>

</html>