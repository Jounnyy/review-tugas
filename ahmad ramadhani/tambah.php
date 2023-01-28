<form class="m-2" action="" method="post" id="insert">
    <label class="form-label" for="fullname">Nama Lengkap</label>
    <input class="form-control" type="text" id="fullname" name="fname"><br>
    <label for="emp_id">Employee_id</label>
    <input class="form-control" type="text" id="emp_id" name="emp_id"><br>
    <label for="selek">Role </label>
    <select class="form-control" id="selek" form="insert" name="selek">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select><br>
    <label for="pass">Password</label>
    <input class="form-control" type="password" id="pass" name="pass">
    <br>
    <input class="form-control" type="reset">
    <div class="d-flex">
        <button name="btn" id="btn" class="btn btn-primary mt-2">Submit</button><br>
    </div>
</form>