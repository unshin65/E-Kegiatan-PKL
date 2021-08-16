<?php

include 'koneksi.php';
$nama = $_GET['nama'];
$jabatan = $_GET['jabatan'];
$unit_kerja = $_GET['unit_kerja'];
$id_kegiatan = 4;
$skpd = str_replace("-", " ", $unit_kerja);

$result = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai where (NAMA='$nama' AND JABATAN='$jabatan' AND UNIT_KERJA='$skpd')");
    if ($result) {
        while ($row = mysqli_fetch_object($result)) {
            $id_pegawai = $row->ID;
			mysqli_query($koneksi,"INSERT INTO `tbl_daftar_hadir`(`ID_KEGIATAN`, `ID_PEGAWAI`) VALUES ($id_kegiatan, $id_pegawai)");
        }
    }

header('Location: rekap.php');
