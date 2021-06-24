<?php
$a = htmlspecialchars(@$_GET['a']);
$b = htmlspecialchars(@$_GET['b']);
$querylihat = "SELECT id_penilaian,kriteria.namakriteria AS namakriteria,nilai_kriteria.keterangan AS keterangan FROM penilaian
INNER JOIN kriteria USING (id_kriteria)
INNER JOIN nilai_kriteria USING (id_nilaikriteria)
WHERE penilaian.id_karyawan='$a' AND penilaian.id_buku='$b'";
$execute2 = $konek->query($querylihat);
if ($execute2->num_rows == 0) {
    header('location:./?page=penilaian');
}
?>
<!-- judul -->
<div class="panel-top">
    <b class="text-green">Detail data</b>
</div>
<form>
    <div class="panel-middle">
        <div class="group-input">
            <?php
            $query = "SELECT namakaryawan FROM karyawan WHERE id_karyawan='$a'";
            $execute = $konek->query($query);
            $data = $execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="buku">Nama Karyawan</label>
                <input class="form-custom" value="<?php echo $data['namakaryawan']; ?>" disabled type="text" required name="buku" id="buku">
            </div>
        </div>
        <div class="group-input">
            <?php
            $query = "SELECT tgl_buku FROM buku WHERE id_buku='$b'";
            $execute = $konek->query($query);
            $data = $execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="buku">Tanggal Penilain</label>
                <input class="form-custom" value="<?php echo $data['tgl_buku']; ?>" disabled type="text" required name="buku" id="buku" placeholder="Tanggal Buku">
            </div>
        </div>
        <?php
        $execute2 = $konek->query($querylihat);
        while ($data2 = $execute2->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class=\"group-input\">
                        <label for=\"\">$data2[namakriteria]</label>
                        <input class=\"form-custom\" value=\"$data2[keterangan]\" disabled type=\"text\" autocomplete=\"off\" required name=\"bobot[]\">
                      </div>
                ";
        }
        ?>
    </div>
    <div class="panel-bottom">


    </div>
</form>