 <!-- // Syarat untuk mulai php harus di dalame
    // panggil db
    // include("connection.php");// Print php = echo
    // include ("Users.php");
//     // 3 line below call
//     $select_usersql = "SELECT * FROM users";
//     // result bukan ngeluarin data
//     $result = $db->query($select_usersql);
//     // digguanakn untuk mengambil data
//    // The var_dump() function is used to dump
// //    // information about a variable
// //     while($x = mysqli_fetch_assoc($result))
// //     {
// //         // ALT SHIFT BAWAH UNTUK COPY COPY KE BAWAH
// //         echo $x['employee_id'];
// //         echo $x['full_name'];
// //         echo $x['role'];
// //         echo $x['password'];
// //     }
    // $user = new Users();
    // $user -> set_login_data($employee_id, $password); -->

<!-- pake tanda seru "!" generate auto semua -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css"/> <!-- link css -->
    <title>Login Sistem</title>
</head>
<body>
    <div class = "container">
        <section class = "wrapper">
            <h3 class = "title">Login System</h3> <!-- Heading 3 -->
            <!-- notifikasi error -->
            <?php
      // notification
      if (isset($_GET['message'])) {
        $message = $_GET['message'];
        echo "<div class= 'notif-login'>$message</div>";
      }
      ?>
            <div class="form-login">
                <!-- action digunakan untuk mengalihkan setleah submit -->
                <form action="login.php" method="POST" class="form-login" >
                    <label class="haloap">NIP</label>
                    <input placeholder="NIP" name = "nip" type="number" class = "input-login" required/>
                    <label class="pass">Password</label>
                    <!-- placeholder untuk mengisi input dnegna tulisan untuk
                    membantu user -->
                    <input placeholder="Password" name = "password" type="password" class = "input-login" required/>
                    <button type="submit" class="button-login" name="login">Login</button>
                    <!-- required harsu diisii -->
                </form>
            </div>
        </section>
    </div>
</body>
</html>