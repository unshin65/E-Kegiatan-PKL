 <?php
    if (!empty($_GET['i'])) {
        $query = mysqli_query($koneksi, "select * from tbsatkerja where id = " . $_GET['i']);
        $result = mysqli_fetch_object($query);
        if (empty($result)) {
            $_SESSION["errorMessage"] = "Satuan kerja tidak ditemukan";
            header('Location: ./unitkerja.php');
        }
    } else {
        $_SESSION["errorMessage"] = "Wrong query";
        header('Location: ./unitkerja.php');
    }
    ?>
 <div class="container my-4">
     <h2>Data Unit kerja</h2>
     <p>Mengubah data unit kerja dengan data baru</p>
     <hr>
     <form action="./action/editaction.php?ac=unitkerja&id=<?= $result->id ?>" method="POST">
         <div class="row">
             <div class="col">
                 <div class="form-group">
                     <label for="namauk">Nama Unit Kerja</label>
                     <input type="text" class="form-control" value="<?= $result->nama ?>" name="namauk" id="namauk" aria-describedby="namaukid" placeholder="Nama Unit Kerja" required>
                     <small id="namaukid" class="form-text text-muted">Nama unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="emailuk">Email</label>
                     <input type="text" class="form-control" value="<?= $result->email ?>" name="emailuk" id="emailuk" aria-describedby="emailukid" placeholder="Email unit kerja">
                     <small id="emailukid" class="form-text text-muted">Email unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="websiteuk">Website</label>
                     <input type="text" class="form-control" value="<?= $result->website ?>" name="websiteuk" id="websiteuk" aria-describedby="webisteukid" placeholder="Website unit kerja baru">
                     <small id="webisteukid" class="form-text text-muted">Website unit kerja</small>
                 </div>
             </div>
             <div class="col">
                 <div class="form-group">
                     <label for="nourutuk">No urut</label>
                     <input type="number" class="form-control" value="<?= $result->nourutuk ?>" name="nourutuk" id="nourutuk" aria-describedby="nourutuk" placeholder="Nomor urut unit kerja baru">
                     <small id="nourutuk" class="form-text text-muted">Nomor urut unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="latitude">Lat / Lon</label>
                     <input type="text" class="form-control" value="<?= $result->lat ?>" name="latitude" id="latitude" aria-describedby="Latitudeid" placeholder="Latitude">
                     <input type="text" class="form-control" value="<?= $result->lon ?>" name="longitude" id="longitude" aria-describedby="Latitudeid" placeholder="Longitude">
                     <small id="Latitudeid" class="form-text text-muted">Latitude dan Longitude unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="mesinuk">Mesin</label>
                     <input type="text" class="form-control" value="<?= $result->mesin ?>" name="mesinuk" id="mesinuk" aria-describedby="mesinuk" placeholder="Mesin">
                     <small id="mesinuk" class="form-text text-muted">Mesin unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="jenisuk">Jenis</label>
                     <input type="text" class="form-control" value="<?= $result->jenis ?>" name="jenisuk" id="jenisuk" aria-describedby="jenisukid" placeholder="Jenis">
                     <small id="jenisukid" class="form-text text-muted">Jenis unit kerja</small>
                 </div>
             </div>
         </div>
         <hr>
         <button type="submit" class="btn btn-primary btn-block">Submit</button>
         <a role="button" href="./unitkerja.php" class="btn btn-danger btn-block">Kembali</a>
     </form>
 </div>