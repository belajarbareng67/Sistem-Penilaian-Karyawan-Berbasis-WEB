<?php
$id=htmlspecialchars(@$_GET['id']);
$query="SELECT id_buku,tgl_buku FROM buku WHERE id_buku='$id'";
$execute=$konek->query($query);
if ($execute->num_rows > 0){
    $data=$execute->fetch_array(MYSQLI_ASSOC);
}else{
    header('location:./?page=buku');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Edit Tanggal Buku </b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="buku">
    <input type="hidden" name="id" value="<?php echo $data['id_buku']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="buku" >Tanggal Buku :</label>
            <input type="date" value="<?php echo $data['tgl_buku']; ?>" class="form-custom" placeholder="Tanggal Buku" id="buku" name="buku" required >
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>