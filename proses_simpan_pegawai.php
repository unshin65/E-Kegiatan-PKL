<?php

include 'koneksi.php';
include "phpqrcode/qrlib.php"; //<-- LOKASI FILE UTAMA PLUGINNYA

$nama = $_POST['nama'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
$unit_kerja = $_POST['unit_kerja'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$skpd = str_replace(" ", "-", $unit_kerja);

$tempdir = "temp/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir)) {#kalau folder belum ada, maka buat.
    mkdir($tempdir);
}
#parameter inputan
date_default_timezone_set('Asia/Jakarta');
$tgll = date('d-m-Y h-i-s');
$isi_teks = "<a href=\"http://datadamis.malangkab.go.id/barcode/proses_simpan_kehadiran.php?nama=$nama&jabatan=$jabatan&unit_kerja=$skpd\"></a>";
$namafile = "$tgll".".png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
$padding = 0;

QRCode::png($isi_teks, $tempdir . $namafile, $quality, $ukuran, $padding);

mysqli_query($koneksi, "INSERT INTO `tbl_pegawai`(`NAMA`, `NIP`, `JABATAN`, `UNIT_KERJA`, `QRCODE`, `NO_HP`, `EMAIL`) VALUES ('$nama', '$nip', '$jabatan', '$unit_kerja', '$namafile', '$no_hp', '$email')");

header('Location: pegawai.php');
