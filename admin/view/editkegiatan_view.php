<?php
if (!empty($_GET['i'])) {
    $queryKegiatan = mysqli_query($koneksi, "select * from tbl_kegiatan where id = " . $_GET['i']);
    $result = mysqli_fetch_object($queryKegiatan);
    if (empty($result)) {
        $_SESSION["errorMessage"] = "Id kegiatan tidak ditemukan";
        header('Location: ./kegiatan.php');
    }
} else {
    $_SESSION["errorMessage"] = "Wrong query";
    header('Location: ./kegiatan.php');
}
?>

<div class="container my-4">
    <h2>Data Kegiatan</h2>
    <p>Mengubah data kegiatan dengan data baru</p>
    <hr>
    <form action="./action/editaction.php?ac=kegiatan&id=<?= $result->ID ?>" method="POST">
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="namakegiatan">Nama Kegiatan</label>
                    <textarea class="form-control" name="namakegiatan" id="namakegiatan" aria-describedby="namakegiatanid" required rows="3"><?= $result->NAMA ?></textarea>
                </div>
                <div class="form-group">
                    <label for="penyelenggara">SKPD Penyelenggara</label>
                    <input type="text" class="form-control" value="<?= $result->SKPD_PENYELENGGARA ?>" name="penyelenggara" id="penyelenggara" aria-describedby="penyelenggarid">
                </div>
                <div class="form-group">
                    <label for="jam">Jam</label>
                    <input type="text" class="form-control" value="<?= $result->JAM ?>" name="jam" id="jam" aria-describedby="jam">
                </div>
                <div class="form-group">
                    <label for="tanggalpelaksanaan">Tanggal Pelaksanaan</label>
                    <input type="date" value="<?= $result->TANGGAL ?>" class="form-control" name="tanggalpelaksanaan" id="tanggalpelaksanaan" aria-describedby="tanggalid">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="namatempat">Nama Tempat</label>
                    <input type="text" class="form-control" value="<?= $result->TEMPAT ?>" name="namatempat" id="namatempat" aria-describedby="namatempatod">
                </div>
                <div class="form-group">
                    <label for="pimpinan">Pimpinan Rapat</label>
                    <input type="text" class="form-control" value="<?= $result->PIMPINAN_RAPAT ?>" name="pimpinan" id="pimpinan" aria-describedby="pimpinan">
                </div>
                <div class="form-group">
                    <label for="peserta">Jumlah Peserta</label>
                    <input type="number" class="form-control" value="<?= $result->JML_PESERTA ?>" name="peserta" id="peserta" aria-describedby="pesertaid">
                </div>
                <div class="p-3">
                    <input value="<?= $result->ID ?>" type="text" name="id" id="id" hidden>
                    <input value="<?= $_SESSION['SID'] ?>" type="text" name="sid" id="sid" hidden>
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
        <a role="button" href="./kegiatan.php" class="btn btn-danger btn-block">Kembali</a>
    </form>
</div>