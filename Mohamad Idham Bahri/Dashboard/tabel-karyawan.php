<?php
    // koneksi ke database
    $koneksi = mysqli_connect("localhost","root","",
                "db_absen");

    // query untuk menampilkan data tamu
    $tampil = "SELECT * FROM karyawan ORDER BY id_karyawan";
    $hasil = mysqli_query($koneksi,$tampil);

    echo "<table>
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