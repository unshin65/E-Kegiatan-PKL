<?php
session_start();
include "../../koneksi.php";
include "./authaction.php";

if ($_GET['ac'] == "kegiatan") {
    try {
        $createQuery = "INSERT INTO tbl_kegiatan SET NAMA=:nama, TEMPAT=:tempat, JAM=:jam, TANGGAL=:tanggal, SKPD_PENYELENGGARA=:penyelenggara, PIMPINAN_RAPAT=:pimpinan, JML_PESERTA=:peserta;";
        $stmt = $conpdo->prepare($createQuery);
        $stmt->bindParam(':nama', $_POST['namakegiatan']);
        $stmt->bindParam(':tempat', $_POST['namatempat']);
        $stmt->bindParam(':jam', $_POST['jam']);
        $stmt->bindParam(':tanggal', $_POST['tanggalpelaksanaan']);
        $stmt->bindParam(':penyelenggara', $_POST['penyelenggara']);
        $stmt->bindParam(':pimpinan', $_POST['pimpinan']);
        $stmt->bindParam(':peserta', $_POST['peserta']);

        if ($stmt->execute()) {
            $_SESSION["successMessage"] = "Berhasil membuat kegiatan baru";
        } else {
            $_SESSION["errorMessage"] = "Gagal membuat kegiatan baru";
        }
        header('Location: ../kegiatan.php');
    } catch (PDOException $th) {
        die('ERROR: ' . $exception->getMessage());
    }
} else if ($_GET['ac'] == "unitkerja") {
    try {
        $createQuery = "INSERT INTO `tbsatkerja` SET nama=:nama, email=:email, website=:website, no_urut=:nourut, lat=:lat, lon=:long, mesin=:mesin, jenis=:jenis;";
        $stmt = $conpdo->prepare($createQuery);

        $stmt->bindParam(':nama', $_POST['namauk']);
        $stmt->bindParam(':email',  $_POST['emailuk']);
        $stmt->bindParam(':website', $_POST['websiteuk']);
        $stmt->bindParam(':nourut', $_POST['nourutuk']);
        $stmt->bindParam(':lat', $_POST['latitude']);
        $stmt->bindParam(':long', $_POST['longitude']);
        $stmt->bindParam(':mesin',  $_POST['mesinuk']);
        $stmt->bindParam(':jenis',  $_POST['jenis']);
        if ($stmt->execute()) {
            $_SESSION["successMessage"] = "Berhasil membuat unit kerja baru";
        } else {
            $_SESSION["errorMessage"] = "Gagal membuat unit kerja baru";
        }
        header('Location: ../unitkerja.php');
    } catch (PDOException $th) {
        die('ERROR: ' . $exception->getMessage());
    }
} else if ($_GET['ac'] == "jabatan") {
    try {
        $createQuery = "INSERT INTO tbl_jabatan SET nama_jabatan=:jabatan;";
        $stmt = $conpdo->prepare($createQuery);
        $stmt->bindParam(':jabatan', $_POST['jabatan']);

        if ($stmt->execute()) {
            $_SESSION["successMessage"] = "Berhasil membuat jabatan baru";
        } else {
            $_SESSION["errorMessage"] = "Gagal membuat jabatan baru";
        }
        header('Location: ../jabatan.php');
    } catch (PDOException $th) {
        die('ERROR: ' . $exception->getMessage());
    }
}
