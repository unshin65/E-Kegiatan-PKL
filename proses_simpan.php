<?php

include 'koneksi.php';
$nama = $_POST['nama'];
$tanggal = $_POST['tanggal'];
$pukul = $_POST['pukul'];
$tempat = $_POST['tempat'];
$skpd = $_POST['skpd'];
$pimpinan = $_POST['pimpinan'];

mysqli_query($koneksi,"INSERT INTO `tbl_kegiatan`(`NAMA`, `TEMPAT`, `JAM`, `TANGGAL`, `SKPD_PENYELENGGARA`, `PIMPINAN_RAPAT`) VALUES ('$nama', '$tempat', '$pukul', $tanggal, '$skpd', '$pimpinan')");

header('Location: scan.php');
