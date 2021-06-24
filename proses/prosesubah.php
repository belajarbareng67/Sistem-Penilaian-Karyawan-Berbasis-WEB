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
$buku = @$_POST['buku'];
$karyawan = @$_POST['karyawan'];
$alamat = @$_POST['alamat'];
$telp = @$_POST['telp'];
$nik = @$_POST['nik'];
$tgl_lahir = @$_POST['tgl_lahir'];
$pekerjaan = @$_POST['pekerjaan'];
$pinjaman = @$_POST['pinjaman'];
$kriteria = @$_POST['kriteria'];
$sifat = @$_POST['sifat'];
$nilai = @$_POST['nilai'];
$keterangan = @$_POST['keterangan'];
$bobot = @$_POST['bobot'];
switch ($op) {
    case 'buku':
        $query = "UPDATE buku SET tgl_buku='$buku' WHERE id_buku='$id'";
        $crud->update($query, $konek, './?page=buku');
        break;
    case 'karyawan':
        $query = "UPDATE karyawan SET namakaryawan='$karyawan', nik='$nik', tgl_lahir='$tgl_lahir', alamat='$alamat', telp='$telp', pekerjaan='$pekerjaan', pinjaman='$pinjaman' WHERE id_karyawan='$id';";
        $crud->update($query, $konek, './?page=karyawan');
        break;
    case 'kriteria':
        // $cek = "SELECT namakriteria FROM kriteria WHERE namakriteria='$kriteria'"; //Cek digunakan untuk mengecek data apakah data kembar atau tidak
        $query = "UPDATE kriteria SET namakriteria='$kriteria', sifat='$sifat' WHERE id_kriteria='$id';";
        $crud->update($query, $konek, './?page=kriteria');
        break;
    case 'subkriteria':
        // $cek = "SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query = "UPDATE nilai_kriteria SET id_kriteria='$kriteria',nilai='$nilai',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
        $crud->update($query, $konek, './?page=subkriteria');
        break;
    case 'bobot':
        $query = null;
        for ($i = 0; $i < count($id); $i++) {
            $query .= "UPDATE bobot_kriteria SET bobot='$bobot[$i]' WHERE id_bobot='$id[$i]';";
        }
        $crud->update($query, $konek, './?page=bobot');
        break;
    case 'nilai':
        $query = null;
        for ($i = 0; $i < count($id); $i++) {
            $query .= "UPDATE penilaian SET id_nilaikriteria='$nilai[$i]' WHERE id_penilaian='$id[$i]';";
        }
        $crud->update($query, $konek, './?page=penilaian');
        break;
}
