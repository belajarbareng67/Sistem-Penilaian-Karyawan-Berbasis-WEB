<?php
$id = htmlspecialchars(@$_GET['id']);
$query = "SELECT * FROM karyawan WHERE id_karyawan='$id'";
$pinjaman = array("< 3 bulan", "> 6 bulan", "1 tahun", "2 tahun", "3 tahun", ">3 tahun");
$execute = $konek->query($query);
if ($execute->num_rows > 0) {
    $data = $execute->fetch_array(MYSQLI_ASSOC);
} else {
    header('location:./?page=karyawan');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Edit data</b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="karyawan">
    <input type="hidden" name="id" value="<?php echo $data['id_karyawan']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="namakaryawan">Nama Lengkap :</label>
            <input type="text" value="<?php echo $data['namakaryawan']; ?>" class="form-custom" placeholder="Nama Lengkap" id="karyawan" name="karyawan" required>
        </div>
        <div class="group-input">
            <label for="nik">Nik :</label>
            <input type="text" value="<?php echo $data['nik']; ?>" class="form-custom" placeholder="Nik" id="nik" name="nik" required>
        </div>
        <div class="group-input">
            <label for="tgl_lahir">Tanggal Lahir :</label>
            <input type="date" value="<?php echo $data['tgl_lahir']; ?>" class="form-custom" placeholder="Tanggal Lahir" id="tgl_lahir" name="tgl_lahir" required>
        </div>
        <div class="group-input">
            <label for="alamat">Alamat :</label>
            <input type="text" value="<?php echo $data['alamat']; ?>" class="form-custom" placeholder="Alamat" id="alamat" name="alamat" required>
        </div>
        <div class="group-input">
            <label for="telp">Nomer Telepon :</label>
            <input type="text" value="<?php echo $data['telp']; ?>" class="form-custom" placeholder="No.Telp" id="telp" name="telp" required>
        </div>
        <div class="group-input">
            <label for="pekerjaan">Jabatan :</label>
            <input type="text" value="<?php echo $data['pekerjaan']; ?>" class="form-custom" placeholder="Jabatan" id="pekerjaan" name="pekerjaan" required>
        </div>
        <div class="group-input">
            <label for="pinjaman">Lama Kerja :</label>
            <select class="form-custom" id="pinjaman" name="pinjaman" required>
                <?php
                foreach ($pinjaman as $datapinjaman) {
                    if ($datapinjaman == $data['pinjaman']) {
                        $selected = "selected";
                    } else {
                        $selected = null;
                    }
                    echo "<option $selected value=\"$datapinjaman\">$datapinjaman</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>