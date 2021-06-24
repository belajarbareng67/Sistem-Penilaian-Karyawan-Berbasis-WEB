<!-- judul -->
<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" action="./proses/prosestambah.php" method="POST">
    <input type="hidden" value="nilai" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <label for="karyawan">Karyawan</label>
            <select class="form-custom" required name="karyawan" id="karyawan">
                <option selected disabled>--Pilih Karyawan--</option>
                <?php
                $query = "SELECT id_karyawan,namakaryawan FROM karyawan";
                $execute = $konek->query($query);
                if ($execute->num_rows > 0) {
                    while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                        echo "<option value=\"$data[id_karyawan]\">$data[namakaryawan]</option>";
                    }
                } else {
                    echo "<option disabled value=\"\">Belum ada karyawan</option>";
                }
                ?>
            </select>
        </div>
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
                    echo "<option disabled value=\"\">Belum ada Catatan Pembukuan</option>";
                }
                ?>
            </select>
        </div>
        <?php
        $query = "SELECT * FROM kriteria";
        $execute = $konek->query($query);
        if ($execute->num_rows > 0) {
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                echo "<div class=\"group-input\">";
                echo "<label for=\"nilai\">$data[namakriteria]</label>";
                echo "<input type='hidden' value=$data[id_kriteria] name='kriteria[]'>";
                echo "<select class=\"form-custom\" required name=\"nilai[]\" id=\"nilai\">";
                echo "<option disabled selected>-- Pilih $data[namakriteria] --</option>";
                $query2 = "SELECT id_nilaikriteria,keterangan FROM nilai_kriteria WHERE id_kriteria='$data[id_kriteria]'";
                $execute2 = $konek->query($query2);
                if ($execute2->num_rows > 0) {
                    while ($data2 = $execute2->fetch_array(MYSQLI_ASSOC)) {
                        echo "<option value=\"$data2[id_nilaikriteria]\">$data2[keterangan]</option>";
                    }
                } else {
                    echo "<option disabled value=\"\">Belum ada Nilai Kriteria</option>";
                };
                echo "</select></div>";
            }
        }
        ?>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>