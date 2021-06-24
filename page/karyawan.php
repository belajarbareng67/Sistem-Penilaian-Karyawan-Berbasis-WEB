<?php
require './connect.php';
?>
<div class="panel">
    <div class="panel-middle" id="judul">
        <div id="judul-text">
            <h2 class="text-green"><i class="fas fa-user-alt"></i> Karyawan</h2>
            Halaman Karyawan
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi']) == 'edit') {
                include 'editkaryawan.php';
            } else if (@htmlspecialchars($_GET['aksi']) == 'lihat') {
                include 'lihatkaryawan.php';
            } else {
                include 'tambahkaryawan.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b class="text-green">Daftar Karyawan</b>

            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM karyawan";
                            $execute = $konek->query($query);
                            if ($execute->num_rows > 0) {
                                $no = 1;
                                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                    echo  "
                                <tr id='data'>
                                    <td>$no</td>
                                    <td>$data[namakaryawan]</td>
                                    <td>$data[alamat] </td>
                                    <td>
                                    <div class='norebuttom'>
                                    <a class=\"btn btn-green\" href='./?page=karyawan&aksi=lihat&id=" . $data['id_karyawan'] . "'><i class='fa fa-eye'></i></a>
                                    <a class=\"btn btn-light-green\" href='./?page=karyawan&aksi=edit&id=" . $data['id_karyawan'] . "'><i class='fa fa-pencil-alt'></i></a>
                                    <a class=\"btn btn-yellow\" data-a=" . $data['namakaryawan'] . " id='hapus' href='./proses/proseshapus.php/?op=karyawan&id=" . $data['id_karyawan'] . "'><i class='fa fa-trash-alt'></i></a>
                                    </div>
                                    </td>
                                </tr>";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td  class='text-center text-green' colspan='4'>Kosong</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>