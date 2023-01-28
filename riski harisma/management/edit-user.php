<div class="wrapper-izin">
    <div class="izin-title">
        <h1>Edit User</h1>
    </div>
    <form action="../action/user-edit.php?action=edit" method="POST" class="izin-form">
        <input name="user_id" type="hidden" class="tgl-input" value="<?= $_POST['user_id'];?>"/>
        <label class="label-nama" for="nama">Nama : </label>
        <input name="nama" type="text" class="tgl-input" value="<?= $_POST['nama'];?>"/>
        <label class="label-password" for="password">Password : </label>
        <input name="password" type="text" class="input" value="<?= $_POST['password'];?>"/>
        
        <button type="submit" name="edit" class="edit-button">Simpan</button>
    </form>
</div>