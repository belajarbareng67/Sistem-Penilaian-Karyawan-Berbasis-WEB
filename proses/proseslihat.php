<?php
require '../connect.php';
require '../class/crud.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = @$_GET['id'];
    $op = @$_GET['op'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = @$_POST['id'];
    $op = @$_POST['op'];
}
$crud = new crud();
switch ($op) {
    case 'subkriteria':
        if (!empty($id)) {
            $where = "WHERE nilai_kriteria.id_kriteria='$id'";
        } else {
            $where = null;
        }
        $query = "SELECT id_nilaikriteria,nilai,keterangan,namakriteria,id_kriteria FROM nilai_kriteria INNER JOIN kriteria USING (id_kriteria) $where ORDER BY id_kriteria,nilai ASC";
        $execute = $konek->query($query);
        if ($execute->num_rows > 0) {
            $no = 1;
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                echo "
                <tr id='data'>
                    <td>$no</td>
                    <td>" . $data['namakriteria'] . "</td>
                    <td>" . $data['nilai'] . "</td>
                    <td>" . $data['keterangan'] . "</td>
                    <td><div class='norebuttom'>
                    <a class=\"btn btn-light-green\" href='./?page=subkriteria&aksi=edit&id=" . $data['id_nilaikriteria'] . "'><i class='fa fa-pencil-alt'></i></a>
                    <a class=\"btn btn-yellow\" data-a=\"nilai $data[nilai] dalam $data[namakriteria]\" id='hapus' href='./proses/proseshapus.php/?op=subkriteria&id=" . $data['id_nilaikriteria'] . "'><i class='fa fa-trash-alt'</a></td></div>
                </tr>";
                $no++;
            }
        } else {
            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
        }
        break;

    case 'nilai':
        if (!empty($id)) {
            $where = "WHERE penilaian.id_buku='$id'";
        } else {
            $where = null;
        }
        $query = "SELECT id_penilaian,id_karyawan,karyawan.namakaryawan AS namakaryawan,buku.id_buku AS id_buku,buku.tgl_buku AS tgl_buku FROM penilaian INNER JOIN karyawan USING(id_karyawan) INNER JOIN buku USING (id_buku) $where GROUP BY id_karyawan ORDER BY id_buku,id_karyawan ASC";
        $execute = $konek->query($query);
        if ($execute->num_rows > 0) {
            $no = 1;
            while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                echo "
                <tr id='data'>
                    <td>$no</td>
                    <td>$data[tgl_buku]</td>
                    <td>$data[namakaryawan]</td>
                    <td>
                    <div class='norebuttom'>
                    <a class=\"btn btn-green\" href=\"./?page=penilaian&aksi=lihat&a=$data[id_karyawan]&b=$data[id_buku]\"><i class='fa fa-eye'></i></a>
                    <a class=\"btn btn-light-green\" href=\"./?page=penilaian&aksi=edit&a=$data[id_karyawan]&b=$data[id_buku]\"><i class='fa fa-pencil-alt'></i></a>
                    <a class=\"btn btn-yellow\" data-a=\".$data[tgl_buku] - $data[namakaryawan]\" id='hapus' href='./proses/proseshapus.php/?op=nilai&id=" . $data['id_karyawan'] . "'><i class='fa fa-trash-alt'></i></a></td>
                </div></tr>";
                $no++;
            }
        } else {
            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
        }
        break;
}
