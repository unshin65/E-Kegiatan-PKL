<?php
session_start();
include "../../koneksi.php";
include "./authaction.php";

if ($_GET['ac'] == "kegiatan" && !empty($_GET['id'])) {

    $createQuery = "DELETE FROM `tbl_kegiatan` WHERE `ID` = " . $_GET['id'] . ";";
    $filterQuery = "SELECT * FROM `tbl_kegiatan` WHERE `ID` = " . $_GET['id'] . ";";
    $filterq = mysqli_num_rows(mysqli_query($koneksi, $filterQuery));
    if ($filterq != 0) {
        $stmt = $koneksi->query($createQuery);
        if ($stmt == true) {
            $_SESSION["successMessage"] = "Berhasil menghapus kegiatan";
        } else {
            $_SESSION["successMessage"] = $koneksi->error;
        }
    } else {
        $_SESSION["errorMessage"] = "kegiatan tidak ditemukan";
    }
    header('Location: ../kegiatan.php');
} else if ($_GET['ac'] == "unitkerja" && !empty($_GET['id'])) {
    $createQuery = "DELETE FROM `tbsatkerja` WHERE `id` = " . $_GET['id'] . ";";
    $filterQuery = "SELECT * FROM `tbsatkerja` WHERE `id` = " . $_GET['id'] . ";";
    $filterq = mysqli_num_rows(mysqli_query($koneksi, $filterQuery));
    if ($filterq != 0) {
        $stmt = $koneksi->query($createQuery);
        if ($stmt == true) {
            $_SESSION["successMessage"] = "Berhasil menghapus unit kerja";
        } else {
            $_SESSION["successMessage"] = $koneksi->error;
        }
    } else {
        $_SESSION["errorMessage"] = "Unit kerja tidak ditemukan";
    }
    header('Location: ../unitkerja.php');
} else if ($_GET['ac'] == "jabatan" && !empty($_GET['id'])) {
    $createQuery = "DELETE FROM `tbl_jabatan` WHERE `id_jabatan` = " . $_GET['id'] . ";";
    $filterQuery = "SELECT * FROM `tbl_jabatan` WHERE `id_jabatan` = " . $_GET['id'] . ";";
    $filterq = mysqli_num_rows(mysqli_query($koneksi, $filterQuery));
    if ($filterq != 0) {
        $stmt = $koneksi->query($createQuery);
        if ($stmt == true) {
            $_SESSION["successMessage"] = "Berhasil menghapus jabatan";
        } else {
            $_SESSION["successMessage"] = $koneksi->error;
        }
    } else {
        $_SESSION["errorMessage"] = "jabatan tidak ditemukan";
    }
    header('Location: ../jabatan.php');
}
