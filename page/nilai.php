<!-- judul -->
<div class="panel">
    <div class="panel-middle" id="judul">
        <div id="judul-text">
            <h2 class="text-green"><i class="fas fa-user-edit"></i> Penilaian Kelayakan</h2>
            Halaman Penilaian Kelayakan Karyawan
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi']) == 'edit') {
                include 'editnilai.php';
            } elseif (@htmlspecialchars($_GET['aksi']) == 'lihat') {
                include 'lihatnilai.php';
            } else {
                include 'tambahnilai.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b style="float: left" class="text-green">Daftar Nilai</b>
                <div style="float:right;width: 250px;">
                    <select class="form-custom" name="pilih" id="pilihNilai">
                        <option value="">Semua Tanggal Penilaian</option>;
                        <?php
                        $query = "SELECT * FROM buku";
                        $execute = $konek->query($query);
                        if ($execute->num_rows > 0) {
                            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                if ($pilih == $data['id_buku']) {
                                    $selected = "selected";
                                } else {
                                    $selected = null;
                                }
                                echo "<option $selected value=$data[id_buku]>$data[tgl_buku]</option>";
                            }
                        } else {
                            echo '<option disabled value="">Tidak ada data</option>';
                        }
                        ?>
                    </select>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="panel-middle" id="animation">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Penilaian</th>
                                <th>Nama Karyawan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="isiNilai"></tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>