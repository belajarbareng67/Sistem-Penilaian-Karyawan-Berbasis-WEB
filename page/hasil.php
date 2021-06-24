<!-- judul -->
<div class="panel">
    <div class="panel-middle" id="judul">
        <!-- <img src="asset/image/rank.svg"> -->
        <div id="judul-text">
            <h2 class="text-green"><i class="fas fa-user-check"></i> Hasil</h2>
            Halaman Hasil Penilaian
        </div>
    </div>
</div>
<!-- judul -->
<div class="panel">
    <div class="panel-top">

        <div style="float:left;width: 300px;">
            <select class="form-custom" name="pilih" id="pilihHasil">
                <option disabled selected value="">-- Pilih Tanggal Penilaian --</option>;
                <?php
                $query = "SELECT * FROM buku";
                $execute = $konek->query($query);
                if ($execute->num_rows > 0) {
                    while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                        echo "<option value=$data[id_buku]>$data[tgl_buku]</option>";
                    }
                } else {
                    echo '<option disabled value="">Tidak ada data</option>';
                }
                ?>
            </select>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="panel-middle">
        <div id="valueHasil">
            <p class='text-center'><b>Pilih Tanggal Buku, untuk menampilkan hasil</b></p>
        </div>
    </div>
    <div class="panel-bottom"></div>
</div>