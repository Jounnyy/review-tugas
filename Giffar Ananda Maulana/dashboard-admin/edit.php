<?php
include("./header-admin.php");
include("./function.php");

$id = $_GET["id"];

$books = query("SELECT * FROM users WHERE id=$id")[0];

if (isset($_POST["submit"])) {
    if (edit($_POST) > 0) {
        echo "<script>
            alert('data Berhasil di edit'); 
            document.location.href = './table-karyawan-admin.php'; 
        </script>";
    } else {
        echo "<script>
            alert('data gagal di edit'); 
        </script>";
    }
}

?>

<div class="content container mt-4">
    <div class="px-4 py-4">
        <div class="card px-4 py-2">
            <form class="well box-shadow row g-3" action="" method="POST">
                <input type="hidden" name="id" class="form-control" value="<?= $books["id"] ?>" id="nip">
                <div class="row mt-5">
                    <label for="nip" class="col-sm-4 col-form-label fs-6">NIP : </label>
                    <div class="col-sm-8">
                        <input type="number" name="employee_id" class="form-control" id="nip" value="<?= $books["employee_id"] ?>">
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputName" class="col-sm-4 col-form-label fs-6">Nama Lengkap:</label>
                    <div class="col-sm-8">
                        <input type="text" name="fullname" class="form-control" id="inputName" value="<?= $books["fullname"] ?>">
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputJk" class="col-sm-4 col-form-label fs-6">Jenis Kelamin :</label>
                    <div class="col-sm-8">
                        <div class="form-check-inline mt-1">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="laki-laki" id="flexRadioDefault" value="male" <?php if ($books['jenis_kelamin'] == 'laki-laki') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>> Laki-Laki
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="jenis_kelamin" class="form-check-input" value="perempuan" id="flexRadioDefault" value="male" <?php if ($books['jenis_kelamin'] == 'perempuan') {
                                                                                                                                                        echo 'checked';
                                                                                                                                                    } ?>> Perempuan
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <label for="inputPostion" class="col-sm-4 col-form-label fs-6">Bagian :</label>
                    <div class="col-sm-8">
                        <select name="role" class="form-select" aria-label="Default select example" id="inputAgama">
                            <option><?= $books["role"] ?></option>
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
                <div class=" d-flex justify-content-end px-4">
                    <button type="submit" name="submit" class="button mt-4 col-md-3 btn btn-success m-2" value="submit"><i class="bi bi-save2"></i> Simpan Perubahan</button>
                    <a href="./table-karyawan-admin.php" class="button mt-4 col-md-3 btn btn-danger m-2" value="submit"><i class="bi bi-arrow-90deg-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
    <?php
    include("./footer-admin.php");
    ?>