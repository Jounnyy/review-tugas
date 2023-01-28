
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN SYSTEM</title>
    <link rel="stylesheet" href="style-ad.css">
</head>
<body>
    <div class="container">
        <section class="wrapper">
        <h3 class="title">TAMBAH DATA KARYAWAN</h3>
        <div class="form-login">
            <form action="insert.php" method="POST" class="form-login">
                <label for="induk">masukan nomor induk</label>
                <input type="number" id="induk" placeholder="nip" name="employee_id" class="input-login" required>
                <br>
                <label for="nama">masukan nama lengkap</label>
                <input type="text" id="nama" placeholder="Nama Lengkap" name="fullname" class="input-login" required>
                <br>
                <label for="role">masukan role</label>
                <input type="text" id="role" placeholder="Role" name="role" class="input-login" required>
                <br>
                <label for="pass">password</label>
                <input type="password"  id="pass" placeholder="*****" name="password" class="input-login" required>
                <br>
                <button type="submit" class="button-login" name="login">Tambah</button>
            </form>
        </div>
        </section>
    </div>
</body>
</html>