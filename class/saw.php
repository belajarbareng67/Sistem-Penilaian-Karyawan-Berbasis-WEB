<?php

class saw {

    private $konek;
    private $idCookie;
    public $simpanNormalisasi=array();
    public function setconfig($konek,$idCookie){
        $this->konek=$konek;
        $this->idCookie=$idCookie;
    }
    public function getConnect(){
       return $this->konek;
    }
    //mendapatkan kriteria
    public function getKriteria(){
        $data=array();
        $querykriteria="SELECT namakriteria FROM kriteria"; //query tabel kriteria
        $execute=$this->getConnect()->query($querykriteria);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['namakriteria']);
        }
        return $data;
    }

    //mendapatkan alternative
    public function getAlternative(){
        $data=array();
        $queryAlternative="SELECT karyawan.namakaryawan AS namakaryawan,id_karyawan FROM penilaian INNER JOIN karyawan USING(id_karyawan) WHERE id_buku='$this->idCookie' GROUP BY id_karyawan";
        $execute=$this->getConnect()->query($queryAlternative);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array("namakaryawan"=>$row['namakaryawan'],"id_karyawan"=>$row['id_karyawan']));
        }
        return $data;
    }

    public function getNilaiMatriks($id_karyawan){
        $data=array();
        $queryGetNilai="SELECT nilai_kriteria.nilai AS nilai,kriteria.sifat AS sifat,penilaian.id_kriteria AS id_kriteria FROM penilaian JOIN kriteria ON kriteria.id_kriteria=penilaian.id_kriteria JOIN nilai_kriteria ON nilai_kriteria.id_nilaikriteria=penilaian.id_nilaikriteria WHERE (id_buku='$this->idCookie' AND id_karyawan='$id_karyawan')";
        $execute=$this->getConnect()->query($queryGetNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array(
                "nilai"=>$row['nilai'],
                "sifat"=>$row['sifat'],
                "id_kriteria"=>$row['id_kriteria']
            ));
        }
        return $data;
    }

    public function getArrayNilai($id_kriteria){
        $data=array();
        $queryGetArrayNilai="SELECT nilai_kriteria.nilai AS nilai FROM penilaian INNER JOIN nilai_kriteria ON penilaian.id_nilaikriteria=nilai_kriteria.id_nilaikriteria WHERE penilaian.id_kriteria='$id_kriteria' AND penilaian.id_buku='$this->idCookie'";
        $execute=$this->getConnect()->query($queryGetArrayNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['nilai']);
        }
        return $data;
    }

    //rumus normalisasai
    public function normalisasi($array,$sifat,$nilai){
        if ($sifat=='benefit'){
            $result=$nilai/max($array);
        }elseif ($sifat=='cost'){
            $result=min($array)/$nilai;
        }
        return round($result,3);
    }

    //mendapatkan bobot kriteria
    public function getBobot($id_kriteria){
        $queryBobot="SELECT bobot FROM bobot_kriteria WHERE id_buku='$this->idCookie' AND id_kriteria='$id_kriteria' ";
        $row=$this->getConnect()->query($queryBobot)->fetch_array(MYSQLI_ASSOC);
        return $row['bobot'];
    }

    //meyimpan hasil perhitungan
    public function simpanHasil($id_karyawan,$hasil){
        $queryCek="SELECT hasil FROM hasil WHERE id_karyawan='$id_karyawan' AND id_buku='$this->idCookie'";
        $execute=$this->getConnect()->query($queryCek);
        if ($execute->num_rows > 0) {
            $querySimpan="UPDATE hasil SET hasil='$hasil' WHERE id_karyawan='$id_karyawan' AND id_buku='$this->idCookie'";
        }else{
            $querySimpan="INSERT INTO hasil(hasil,id_karyawan,id_buku) VALUES ('$hasil','$id_karyawan','$this->idCookie')";
        }
        $execute=$this->getConnect()->query($querySimpan);

    }

    //Kmencari kesimpulan
    public function getHasil(){
    $queryHasil     =   "SELECT hasil.hasil AS hasil,buku.tgl_buku,karyawan.namakaryawan AS namakaryawan FROM hasil JOIN buku ON buku.id_buku=hasil.id_buku JOIN karyawan ON karyawan.id_karyawan=hasil.id_karyawan WHERE hasil.hasil=(SELECT MAX(hasil) FROM hasil WHERE id_buku='$this->idCookie')";
    $execute        =   $this->getConnect()->query($queryHasil)->fetch_array(MYSQLI_ASSOC);
    echo "<p>Jadi Rekomendasi Pemilihan Karyawan Terbaik untuk pembukuan pada tanggal <i>$execute[tgl_buku]</i> jatuh pada <i>$execute[namakaryawan]</i> dengan Nilai <b>".round($execute['hasil'],3)."</b></p>";
    }

}