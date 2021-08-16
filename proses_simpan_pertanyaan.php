<?php

include 'koneksi.php';
$pengirim = $_POST['pengirim'];
$id_keg = $_POST['id_keg'];
$pertanyaan = $_POST['pertanyaan'];
date_default_timezone_set('Asia/Jakarta');
$tgl = date('d-m-Y h:i:s');

mysqli_query($koneksi,"INSERT INTO `tbl_pertanyaan`(`PENGIRIM`, `PERTANYAAN`, `TGL_ENTRY`, `ID_KEGIATAN`) VALUES ('$pengirim', '$pertanyaan', '$tgl', $id_keg)");

header("Location: pertanyaan.php?id=$id_keg");
