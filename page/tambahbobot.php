<!-- judul -->
<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" action="./proses/prosestambah.php" method="POST">
    <input type="hidden" value="bobot" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <label for="buku">Tanggal Penilaian</label>
            <select class="form-custom" required name="buku" id="buku">
                <option selected disabled>--Pilih Tanggal Penilaian--</option>
                <?php
                $query = "SELECT * FROM buku";
                $execute = $konek->query($query);
                if ($execute->num_rows > 0) {
                    while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                        echo "<option value=\"$data[id_buku]\">$data[tgl_buku]</option>";
                    }
                } else {
                    echo "<option value=\"\">Belum ada Catatan Pembukuan</option>";
                }
                ?>
            </select>
        </div>
        <?php
        $query = "SELECT * FROM kriteria";
        $execute = $konek->query($query);
        if ($execute->num_rows > 0) {
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class=\"group-input\">
                        <label for=\"$data[namakriteria]\">$data[namakriteria]</label>
                        <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                            <input class=\"form-custom\" type=\"text\" autocomplete=\"off\" required name=\"bobot[]\" id=\"$data[namakriteria]\" placeholder=\"Nilai $data[namakriteria]\">
                      </div>
                ";
            }
        }
        ?>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>