<?php


if (!empty($_SESSION['SID'])) {
    $checkSID = mysqli_fetch_object(mysqli_query($koneksi, "select * from tbl_user where id_user = " . $_SESSION['SID']));

    if (empty($checkSID)) {
        $_SESSION["errorMessage"] = "Session sudah berakhir, silahkan login terlebih dahulu";
        header('Location: ../auth.php');
    }
} else {
    $_SESSION["errorMessage"] = "Session sudah berakhir, silahkan login terlebih dahulu";
    header('Location: ../auth.php');
}
