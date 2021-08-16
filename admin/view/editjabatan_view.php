<?php
if (!empty($_GET['i'])) {
    $queryKegiatan = mysqli_query($koneksi, "select * from tbl_jabatan where id_jabatan = " . $_GET['i']);
    $result = mysqli_fetch_object($queryKegiatan);
    if (empty($result)) {
        $_SESSION["errorMessage"] = "jabatan yang dicari tidak ditemukan";
        header('Location: ./jabatan.php');
    }
} else {
    $_SESSION["errorMessage"] = "Wrong query";
    header('Location: ./jabatan.php');
}
?>
<div class="container my-4">
    <h2>Data Jabatan</h2>
    <p>Mengubah data jabatan dengan data baru</p>
    <hr>
    <form action="./action/editaction.php?ac=jabatan&id=<?= $result->id_jabatan ?>" method="POST">
        <div class="form-group">
            <label for="jabatan">Nama Jabatan</label>
            <input type="text" class="form-control" value="<?= $result->nama_jabatan ?>" name="jabatan" id="jabatan" aria-describedby="jabatanid" placeholder="Nama Jabatan">
            <small id="jabatanId" class="form-text text-muted">Nama jabatan sebelumnya adalah <?= $result->nama_jabatan ?></small>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <a role="button" href="./jabatan.php" class="btn btn-danger btn-block">Kembali</a>
    </form>
</div>