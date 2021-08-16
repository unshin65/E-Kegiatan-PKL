<?php

include 'koneksi.php';
$kegiatan = $_POST['kegiatan'];
$nama = $_POST['nama'];
$jen_kel = $_POST['jen_kel'];
$jabatan = $_POST['jabatan'];
$sat_ker = $_POST['satker'];
$hp = $_POST['hp'];
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d H:i:s');
$img = $_POST['img'];
$sql = "INSERT INTO `tbl_tanda_tangan` (`ID_KEGIATAN`, `SKPD`, `NAMA`, `JEN_KEL`,`TTD`,`DATE_TIME`,`JABATAN`,`NO_HP`) VALUES ('$kegiatan', '$sat_ker', '$nama', $jen_kel, '$img', '$tanggal', '$jabatan', '$hp')";
mysqli_query($koneksi, $sql);
var_dump($sql);
header('Location: rekap.php');
