<?php
include("./header-admin.php");
include("./function.php");

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
            alert('Berhasil Registrasi!');
        </script>";
    } else {
        echo mysqli_error($db);
    }
}
?>

<div class="content container mt-4">
    <div class="px-4 py-4">
        <div class="card px-4 py-2">
            <form class="well box-shadow row g-3" action="" method="POST">
                <div class="row mt-5">
                    <label for="nip" class="col-sm-4 col-form-label fs-6">NIP : </label>
                    <div class="col-sm-8">
                        <input type="number" name="employee_id" class="form-control" id="nip">
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputName" class="col-sm-4 col-form-label fs-6">Nama Lengkap:</label>
                    <div class="col-sm-8">
                        <input type="text" name="fullname" class="form-control" id="inputName">
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputJk" class="col-sm-4 col-form-label fs-6" required>Jenis Kelamin :</label>
                    <div class="col-sm-8">
                        <div class="form-check-inline mt-1">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="LAKI-LAKI" id="flexRadioDefault" required> Laki-Laki
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="PEREMPUAN" id="flexRadioDefault" required> Perempuan
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputPostion" class="col-sm-4 col-form-label fs-6">Bagian :</label>
                    <div class="col-sm-8">
                        <select name="role" class="form-select" aria-label="Default select example" id="inputAgama">
                            <option>-none</option>
                            <option class="text-capitalize">warehouse</option>
                            <option class="text-capitalize">purchasing</option>
                            <option class="text-capitalize">qa/qc</option>
                            <option class="text-capitalize">engineer</option>
                            <option class="text-capitalize">marketing</option>
                            <option class="text-capitalize">maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputPw" class="col-sm-4 col-form-label fs-6">Password :</label>
                    <div class="col-sm-8">
                        <input type="password" name="password" class="form-control" id="inputPw">
                    </div>
                </div>
                <div class="d-flex justify-content-end px-4">
                    <button type="submit" name="register" class="button mt-4 col-md-2 btn btn-success m-2" value="submit"><i class="bi bi-plus-circle"></i> Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("./footer-admin.php");
    ?>