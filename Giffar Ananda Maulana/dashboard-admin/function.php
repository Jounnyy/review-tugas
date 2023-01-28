<?php
include("../connection.php");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $db;

    $employee_id = strtolower(stripslashes($data["employee_id"]));
    $fullname = strtolower(stripslashes($data["fullname"]));
    $jenis_kelamin = strtolower(stripslashes($data["jenis_kelamin"]));
    $role = strtolower(stripslashes($data["role"]));
    $password = mysqli_real_escape_string($db, $data["password"]);

    $result = mysqli_query($db, "SELECT employee_id FROM users WHERE 
    employee_id = '$employee_id'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert ('NIP Yang Digunakan Sudah Tersedia!!');
            </script>";
        return false;
    }

    if (empty(trim($employee_id && $fullname && $jenis_kelamin && $role && $password))) {
        echo "<script>
            alert ('Tidak Boleh Kosong!!');
        </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($db, "INSERT INTO users VALUES( 
        '',
        '$employee_id',
        '$fullname',
        '$jenis_kelamin',
        '$role',
        '$password'
    )
    ");
    return mysqli_affected_rows($db);
}


// edit data karyawan
function edit($data)
{
    global $db;
    $id = $data["id"];
    $employee_id = htmlspecialchars($data["employee_id"]);
    $fullname = htmlspecialchars($data["fullname"]);
    $jenis_kelamin = htmlspecialchars($data["jenis_kelamin"]);
    $role = htmlspecialchars($data["role"]);
    $password = htmlspecialchars(mysqli_real_escape_string($db, $data["password"]));
    $result = mysqli_query($db, "SELECT employee_id FROM users WHERE 
    employee_id = '$employee_id'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert ('NIP Yang Digunakan Sudah Tersedia!!');
            </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE users SET 
        employee_id = '$employee_id', 
        fullname = '$fullname', 
        jenis_kelamin = '$jenis_kelamin', 
        role = '$role',
        password = '$password' 
        WHERE id = $id 
    ";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}


// delete
function delete($id)
{
    global $db;
    mysqli_query($db, "DELETE FROM users WHERE id = $id");
    return mysqli_affected_rows($db);
}
