<?php
if (!empty($_SESSION['SID'])) {
    $query = mysqli_query($koneksi, "select * from tbl_user where id_user = " . $_SESSION['SID']);
    $result = mysqli_fetch_object($query);
    if (empty($result)) {
        header('Location: ./index.php');
    }
} else {
    header('Location: ../auth.php');
}
?>

<div class="container my-4">
    <h2>Data Admin</h2>
    <p>Mengubah data admin dengan data baru</p>
    <?php include './assets/alert.php' ?>
    <hr>
    <form action="./action/editaction.php?ac=admin" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" value="<?= $result->username ?>" name="username" id="username" aria-describedby="userid" placeholder="username baru" required>
                    <small id="userid" class="form-text text-muted">masukkan username jika ingin mengubah</small>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="newpassword">Password baru</label>
                    <input type="password" class="form-control" name="newpassword" id="newpassword" aria-describedby="newpassid" placeholder="Password baru">
                    <small id="newpassid" class="form-text text-muted">masukkan password baru jika ingin mengubah password</small>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="password">Password lama</label>
            <input type="password" class="form-control" name="password" id="password" aria-describedby="passwordid" placeholder="Masukkan password lama" required>
            <small id="passwordid" class="form-text text-muted">Masukkan password lama jika ingin mengubah semua data</small>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <a role="button" href="./index.php" class="btn btn-danger btn-block">Kembali</a>
    </form>
</div>