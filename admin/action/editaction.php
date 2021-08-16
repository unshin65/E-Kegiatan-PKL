<?php
session_start();
include "../../koneksi.php";
include "./authaction.php";

if ($_GET['ac'] == "kegiatan") {
    try {
        $createQuery = "UPDATE tbl_kegiatan SET NAMA=:nama, TEMPAT=:tempat, JAM=:jam, TANGGAL=:tanggal, SKPD_PENYELENGGARA=:penyelenggara, PIMPINAN_RAPAT=:pimpinan, JML_PESERTA=:peserta WHERE ID = :ID_KEGIATAN;";
        $stmt = $conpdo->prepare($createQuery);
        $stmt->bindParam(':ID_KEGIATAN', $_POST['id']);
        $stmt->bindParam(':nama', $_POST['namakegiatan']);
        $stmt->bindParam(':tempat', $_POST['namatempat']);
        $stmt->bindParam(':jam', $_POST['jam']);
        $stmt->bindParam(':tanggal', $_POST['tanggalpelaksanaan']);
        $stmt->bindParam(':penyelenggara', $_POST['penyelenggara']);
        $stmt->bindParam(':pimpinan', $_POST['pimpinan']);
        $stmt->bindParam(':peserta', $_POST['peserta']);

        if ($stmt->execute()) {
            $_SESSION["successMessage"] = "Berhasil mengubah kegiatann baru";
        } else {
            $_SESSION["errorMessage"] = "Gagal mengubah kegiatan baru";
        }
        header('Location: ../kegiatan.php');
    } catch (PDOException $th) {
        die('ERROR: ' . $exception->getMessage());
    }
} else if ($_GET['ac'] == "unitkerja") {
    try {
        $createQuery = "UPDATE tbsatkerja SET nama=:nama, email=:email, website=:website, no_urut=:nourut, lat=:lat, 
        lon=:long, mesin=:mesin, jenis=:jenis WHERE id = :id; ";
        $stmt = $conpdo->prepare($createQuery);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->bindParam(':nama', $_POST['namauk']);
        $stmt->bindParam(':email',  $_POST['emailuk']);
        $stmt->bindParam(':website', $_POST['websiteuk']);
        $stmt->bindParam(':nourut', $_POST['nourutuk']);
        $stmt->bindParam(':lat', $_POST['latitude']);
        $stmt->bindParam(':long', $_POST['longitude']);
        $stmt->bindParam(':mesin',  $_POST['mesinuk']);
        $stmt->bindParam(':jenis',  $_POST['jenis']);

        if ($stmt->execute()) {
            $_SESSION["successMessage"] = "Berhasil mengubah unit kerja baru";
        } else {
            $_SESSION["errorMessage"] = "Gagal mengubah unit kerja baru";
        }
        header('Location: ../unitkerja.php');
    } catch (PDOException $th) {
        die('ERROR: ' . $exception->getMessage());
    }
} else if ($_GET['ac'] == "jabatan") {
    try {
        $createQuery = "UPDATE tbl_jabatan SET nama_jabatan=:jabatan WHERE id_jabatan = :id;";
        $stmt = $conpdo->prepare($createQuery);
        $stmt->bindParam(':id', $_GET['id']);
        $stmt->bindParam(':jabatan', $_POST['jabatan']);

        if ($stmt->execute()) {
            $_SESSION["successMessage"] = "Berhasil mengubah jabatan";
        } else {
            $_SESSION["errorMessage"] = "Gagal mengubah jabatan";
        }
        header('Location: ../jabatan.php');
    } catch (PDOException $th) {
        die('ERROR: ' . $exception->getMessage());
    }
} else if ($_GET['ac'] == "admin" && !empty($_SESSION['SID'])) {
    $filterQuery = "SELECT * FROM tbl_user WHERE id_user = " . $_SESSION['SID'] . "";
    $filterq = mysqli_fetch_object(mysqli_query($koneksi, $filterQuery));
    print_r($_REQUEST);
    if (md5($_POST['password']) == $filterq->password) {
        try {
            $createQuery = "UPDATE tbl_user SET username=:username, password=:password WHERE id_user = :id;";
            $stmt = $conpdo->prepare($createQuery);
            $stmt->bindParam(':id', $_SESSION['SID']);
            $stmt->bindParam(':username', $_POST['username']);
            if (empty($_POST['newpassword'])) {
                $stmt->bindParam(':password', $filterq->password);
            } else {
                $stmt->bindParam(':password', md5($_POST['newpassword']));
            }

            if ($stmt->execute()) {
                if (empty($_POST['newpassword'])) {
                    $_SESSION["successMessage"] = "<p>Data admin berhasil diubah</p><p>Username : " . $_POST['username'];
                } else {
                    $_SESSION["successMessage"] = "<p>Data admin berhasil diubah</p><p>Username : " . $_POST['username'] . "</p><p>Password : " . $_POST['newpassword'] . "</p>";
                }
            } else {
                $_SESSION["errorMessage"] = "Gagal mengubah data admin";
            }
        } catch (PDOException $th) {
            die('ERROR: ' . $exception->getMessage());
        }
    } else {
        $_SESSION["errorMessage"] = "Password lama yang anda masukkan salah";
    }
    header('Location: ../edithandler.php?ac=profil');
}
