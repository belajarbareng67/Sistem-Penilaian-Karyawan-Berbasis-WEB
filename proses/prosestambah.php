<?php
require '../connect.php';
require '../class/crud.php';
$crud = new crud($konek);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = @$_GET['id'];
    $op = @$_GET['op'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = @$_POST['id'];
    $op = @$_POST['op'];
}
// digunakan untuk variable
$buku = @$_POST['buku'];
$karyawan = @$_POST['karyawan'];
$alamat = @$_POST['alamat'];
$nik = @$_POST['nik'];
$telp = @$_POST['telp'];
$tgl_lahir = @$_POST['tgl_lahir'];
$pekerjaan = @$_POST['pekerjaan'];
$pinjaman = @$_POST['pinjaman'];
$kriteria = @$_POST['kriteria'];
$sifat = @$_POST['sifat'];
$nilai = @$_POST['nilai'];
$keterangan = @$_POST['keterangan'];
$bobot = @$_POST['bobot'];
switch ($op) {
    case 'buku': //tambah data buku atau tanggal buku
        $query = "INSERT INTO buku (tgl_buku) VALUES ('$buku')";
        $crud->addData($query, $konek);
        break;
    case 'karyawan': //tambah data karyawan
        $cek = "SELECT namakaryawan FROM karyawan WHERE namakaryawan='$karyawan'";
        $query = null;
        $query = "INSERT INTO karyawan (namakaryawan,nik,tgl_lahir,alamat,telp,pekerjaan,pinjaman) VALUES ('$karyawan','$nik','$tgl_lahir','$alamat','$telp','$pekerjaan','$pinjaman')";
        $crud->multiAddData($cek,$query, $konek);
        break;
    case 'kriteria': //tambah data kriteria
        $cek = "SELECT namakriteria FROM kriteria WHERE namakriteria='$kriteria'";
        $query = null;
        $query = "INSERT INTO kriteria (namakriteria,sifat) VALUES ('$kriteria','$sifat')";
        $crud->multiAddData($cek, $query, $konek);
        break;
    case 'subkriteria': //tambah data sub kriteria atau alternatif kriteria
        $cek = "SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query = null;
        $query .= "INSERT INTO nilai_kriteria (id_kriteria,nilai,keterangan) VALUES ('$kriteria','$nilai','$keterangan');";
        $crud->multiAddData($cek, $query, $konek);
        break;
    case 'bobot': //tambah data bobot
        $cek = "SELECT id_bobot FROM bobot_kriteria WHERE id_buku='$buku'";
        $query = null;
        for ($i = 0; $i < count($kriteria); $i++) {
            $query .= "INSERT INTO bobot_kriteria (id_buku,id_kriteria,bobot) VALUES ('$buku','$kriteria[$i]','$bobot[$i]');";
        }
        $crud->multiAddData($cek, $query, $konek);
        break;
    case 'nilai': //tambah data nilai atau penilaian
        $cek = "SELECT id_karyawan FROM penilaian WHERE id_karyawan='$karyawan'";
        $query = null;
        for ($i = 0; $i < count($nilai); $i++) {
            $query .= "INSERT INTO penilaian (id_karyawan,id_buku,id_kriteria,id_nilaikriteria) VALUES ('$karyawan','$buku','$kriteria[$i]','$nilai[$i]');";
        }
        $crud->multiAddData($cek, $query, $konek);
        break;
}
