<div class="wrapper-izin">
    <div class="izin-title">
        <h1>Form Izin</h1>
    </div>
    <form action="../action/request.php" method="POST" class="izin-form">
        <label class="label-izin" for="tgl-awal">Tanggal Izin : </label>
        <input name="tgl-awal" type="date" class="tgl-input" />
        <label class="label-izin" for="tgl-akhir">Sampai Dengan :</label>
        <input name="tgl-akhir" type="date" class="tgl-input" />
        <label class="label-izin" for="alasan">Alasan Izin :</label>
        <textarea name="alasan" id="" cols="30" rows="10"></textarea>
        <button type="submit" name="izin" class="izin-button">IZIN</button>
    </form>
</div>