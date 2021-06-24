<?php
// $listWeight=array(
//     array("nama"=>"0 - Sangat Rendah","nilai"=>0),
//     array("nama"=>"0.25 - Rendah","nilai"=>0.25),
//     array("nama"=>"0.5 - Tengah","nilai"=>0.5),
//     array("nama"=>"0.75 - Tinggi","nilai"=>0.75),
//     array("nama"=>"1 - Sangat Tinggi","nilai"=>1),
// );
$id = htmlspecialchars(@$_GET['id']);
$querylihat = "SELECT id_buku,bobot,id_bobot,kriteria.namakriteria AS namakriteria FROM bobot_kriteria INNER JOIN kriteria USING(id_kriteria) WHERE id_buku='$id'";
$execute2 = $konek->query($querylihat);
if ($execute2->num_rows == 0) {
    header('location:./?page=bobot');
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
            $query = "SELECT tgl_buku FROM buku WHERE id_buku='$id'";
            $execute = $konek->query($query);
            $data = $execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="buku">Tanggal Buku</label>
                <input class="form-custom" value="<?php echo $data['tgl_buku']; ?>" disabled type="text" required name="buku" id="buku" placeholder="buku">
            </div>
        </div>
        <?php
        $execute2 = $konek->query($querylihat);
        while ($data = $execute2->fetch_array(MYSQLI_ASSOC)) {
            echo "<div class=\"group-input\">
                    <label for=\"$data[namakriteria]\">$data[namakriteria]</label>
                    <input type='hidden' value=\"$data[id_bobot]\" name=\"id[]\">
                    <input class=\"form-custom\" value=\"$data[bobot]\" type=\"text\" autocomplete=\"off\" disabled name=\"bobot[]\" id=\"$data[namakriteria]\" placeholder=\"Nilai $data[namakriteria]\">
                 </div> ";
        }
        ?>
    </div>
    <div class="panel-bottom">
    </div>
</form>