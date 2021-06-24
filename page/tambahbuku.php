<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<!-- Membuat inputan tambah buku maka setelah di simpan akan dicek ke prosestambah -->
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="buku">
    <div class="panel-middle">
        <div class="group-input">
            <label for="buku">Tanggal Penilaian :</label>
            <input type="date" class="form-custom" placeholder="Tanggal Penilaian" id="buku" name="buku" required>
        </div>
    </div>

    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>