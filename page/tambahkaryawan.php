<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="karyawan">
    <div class="panel-middle">
        <div class="group-input">
            <label for="namakaryawan">Nama Lengkap :</label>
            <input type="text" class="form-custom" placeholder="Nama Lengkap" id="karyawan" name="karyawan" required>
        </div>
        <div class="group-input">
            <label for="nik">Nik :</label>
            <input type="text" class="form-custom" placeholder="Nik" id="nik" name="nik" required>
        </div>
        <div class="group-input">
            <label for="tgl_lahir">Tanggal Lahir :</label>
            <input type="date" class="form-custom" placeholder="Tanggal Lahir" id="tgl_lahir" name="tgl_lahir" required>
        </div>
        <div class="group-input">
            <label for="alamat">Alamat :</label>
            <input type="text" class="form-custom" placeholder="Alamat" id="alamat" name="alamat" required>
        </div>
        <div class="group-input">
            <label for="telp">Nomer Telepon :</label>
            <input type="text" class="form-custom" placeholder="No.Telepon" id="telp" name="telp" required>
        </div>
        <div class="group-input">
            <label for="pekerjaan">Jabatan :</label>
            <!-- <input type="text" class="form-custom" placeholder="Jabatan" id="pekerjaan" name="pekerjaan" required> -->
           
            <select class="form-custom" required id="pinjaman" name="pinjaman">
                <option selected disabled>-- pekerjaan --</option>
                <option value="< 3 Bulan">
                    Customer Service</option> <option value="> 6 bulan">Operator Produksi
                </option>
                <option value="ob1">Staff</option>
                <option value="2 tahun">Marketing</option>
                <option value="3 tahun">OB</option>
                <option value="> 3 tahun">Security</option>
            </select>
        </div>
        <div class="group-input">
            <label for="pinjaman">Lama Kerja :</label>
            <select class="form-custom" required id="pinjaman" name="pinjaman">
                <option selected disabled>-- Lama Kerja --</option>
                <option value="< 3 Bulan">
                    <= 3 Bulan</option> <option value="> 6 bulan">> 6 Bulan
                </option>
                <option value="1 tahun">1 tahun</option>
                <option value="2 tahun">2 tahun</option>
                <option value="3 tahun">3 tahun</option>
                <option value="> 3 tahun">>3 tahun</option>
            </select>
        </div>



    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>