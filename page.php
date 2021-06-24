<?php
$page=htmlspecialchars(@$_GET['page']);
switch ($page){
    case null:
        include 'page/beranda.php';
        break;
    case 'beranda':
        include 'page/beranda.php';
        break;
    case 'buku':
        include 'page/buku.php';
        break;
    case 'karyawan':
        include 'page/karyawan.php';
        break;
    case 'penilaian':
        include 'page/nilai.php';
        break;
    case 'bobot':
        include 'page/bobot.php';
        break;
    case 'kriteria':
        include 'page/kriteria.php';
        break;
    case 'subkriteria':
        include 'page/subkriteria.php';
        break;
    case 'hasil':
        include 'page/hasil.php';
        break;
    default:
        include 'page/404.php';
}