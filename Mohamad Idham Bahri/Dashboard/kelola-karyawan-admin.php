<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
 
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
<div class="container-fluid">
  <a class="navbar-brand" href="#">SISTEM ABSENSI</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
 
  <div class=" collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ms-auto ">
      <li class="nav-item">
        <a class="nav-link mx-2 active" aria-current="page" href="./index-admin.php">Beranda</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="./kelola-karyawan-admin.php">Kelola Karyawan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link mx-2" href="./tentang-admin.php">Tentang</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link mx-2 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Company
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <li><a class="dropdown-item" href="#">Blog</a></li>
          <li><a class="dropdown-item" href="#">About Us</a></li>
          <li><a class="dropdown-item" href="#">Contact us</a></li>
        </ul>
      </li> -->
    </ul>
  </div>
</div>
</nav>

<center>
    <h1>KELOLA KARYAWAN</h1>
    <?php
    // koneksi ke database
    $koneksi = mysqli_connect("localhost","root","",
                "db_absen");

    // query untuk menampilkan data tamu
    $tampil = "SELECT * FROM karyawan ORDER BY id_karyawan";
    $hasil = mysqli_query($koneksi,$tampil);

    echo "<table >
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Alamat</th>
                <th>Nomer HP</th>
            </tr>";
            
            // menampilkan data nama,jabatan, alamat, telepon, ke browser

            while ($data = mysqli_fetch_array($hasil)) {
                echo "<tr>
                        <td>$data[nama]</td>
                        <td>$data[jabatan]</td>
                        <td>$data[alamat]</td>
                        <td>$data[no_hp]</td>
                    </tr>
                ";
            }
        echo "</table>";
    

    // menampilkan data nama, alamat, telepon ke browser
    while ($data = mysqli_fetch_array($hasil)) {
        echo "Nama: $data [nama] <br>";
        echo "Alamat: $data[jabatan] <br>";
        echo "Alamat: $data[alamat] <br>";
        echo "Telepon: $data[no_hp] <br><hr>";
    }
?>
</center><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<footer class="bg-dark text-center text-white">
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2023 Copyright: Idham Bhr
    <a class="text-white" href="https://mdbootstrap.com/"></a>
  </div>
  <!-- Copyright -->
</body>
</html>