<?php
// $listWeight=array(
//     array("nama"=>"0 - Sangat Rendah","nilai"=>0),
//     array("nama"=>"0.25 - Rendah","nilai"=>0.25),
//     array("nama"=>"0.5 - Tengah","nilai"=>0.5),
//     array("nama"=>"0.75 - Tinggi","nilai"=>0.75),
//     array("nama"=>"1 - Sangat Tinggi","nilai"=>1),
// );
$id = htmlspecialchars(@$_GET['id']);
$querylihat = "SELECT namakaryawan,nik,tgl_lahir,alamat,telp,pinjaman FROM karyawan ";
$execute2 = $konek->query($querylihat);
if ($execute2->num_rows == 0) {
    header('location:./?page=karyawan');
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
            $query = "SELECT namakaryawan,nik,tgl_lahir,alamat,telp,pekerjaan,pinjaman FROM karyawan WHERE id_karyawan='$id'";
            $execute = $konek->query($query);
            $data = $execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="namakaryawan">Nama Lengkap :</label>
                <input class="form-custom" value="<?php echo $data['namakaryawan']; ?>" disabled type="text" required name="namakaryawan" id="namakaryawan" placeholder="namakaryawan">
            </div>
            <div class="group-input">
                <label for="nik">Nik :</label>
                <input class="form-custom" value="<?php echo $data['nik']; ?>" disabled type="text" required name="nik" id="nik" placeholder="nik">
            </div>
            <div class="group-input">
                <label for="tgl_lahir">Tanggal Lahir :</label>
                <input class="form-custom" value="<?php echo $data['tgl_lahir']; ?>" disabled type="date" required name="tgl_lahir" id="tgl_lahir" placeholder="tgl_lahir">
            </div>
            <div class="group-input">
                <label for="alamat">Alamat :</label>
                <input class="form-custom" value="<?php echo $data['alamat']; ?>" disabled type="text" required name="alamat" id="alamat" placeholder="alamat">
            </div>
            <div class="group-input">
                <label for="telp">Telp :</label>
                <input class="form-custom" value="<?php echo $data['telp']; ?>" disabled type="text" required name="telp" id="telp" placeholder="telp">
            </div>
            <div class="group-input">
                <label for="pekerjaan">Jabatan :</label>
                <input class="form-custom" value="<?php echo $data['pekerjaan']; ?>" disabled type="text" required name="pekerjaan" id="pekerjaan" placeholder="pekerjaan">
            </div>
            <div class="group-input">
                <label for="pinjaman">Lama Kerja :</label>
                <input class="form-custom" value="<?php echo $data['pinjaman']; ?>" disabled type="text" required name="pinjaman" id="pinjaman" placeholder="pinjaman">
            </div>
        </div>

    </div>
    <div class="panel-bottom">
    </div>
</form>