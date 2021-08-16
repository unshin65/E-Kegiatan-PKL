<?php
include 'koneksi.php';

if (empty($_SESSION['SID'])) {
    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $query = "select * from tbl_user where username = '" . $username . "' AND password = '" . $password . "'";
    $search = mysqli_fetch_object(mysqli_query($koneksi, $query));
    if ($search) {
        $sessionData = [
            'SID' => $search->id_user,
            'username' => $search->username
        ];
        $_SESSION = $sessionData;
        header("Location: ./admin/index.php");
    } else {
        $_SESSION["errorMessage"] = "Username dan atau password yang anda masukkan salah";
        header("Location: ./auth.php");
    }
} else {
    $_SESSION["errorMessage"] = "Silahkan login terlebih dahulu";
    header("Location: ./auth.php");
}
