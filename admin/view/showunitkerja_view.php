 <?php
    if (!empty($_GET['i'])) {
        $query = mysqli_query($koneksi, "select * from tbsatkerja where id = " . $_GET['i']);
        $result = mysqli_fetch_row($query);
        if (empty($result)) {
            $_SESSION["errorMessage"] = "Satuan kerja tidak ditemukan";
            header('Location: ./unitkerja.php');
        }
    } else {
        $_SESSION["errorMessage"] = "Wrong query";
        header('Location: ./unitkerja.php');
    }
    $arrNamaIndex = ['id', 'nama', 'email', 'website', 'no_urut', 'lat', 'lon', 'mesin', 'jenis'];
    ?>

 <div class="container my-4">
     <h2>Data detail unit kerja</h2>
     <p>Menampilkan data secara detail unit kerja</p>
     <hr>
     <table class="table table-bordered table-inverse">
         <thead class="thead-inverse">
             <tr>
                 <th>Data</th>
                 <th>Isi</th>
             </tr>
         </thead>
         <tbody>
             <?php foreach ($result as $key => $value) { ?>
                 <tr>
                     <td scope="row"><strong><?= $arrNamaIndex[$key] ?></strong></td>
                     <td><?= empty($value) ? '-' : $value ?></td>
                 </tr>
             <?php } ?>
         </tbody>
     </table>
     <a role="button" href="././edithandler.php?ac=unitkerja&i=<?= $result[0] ?>" class="btn btn-primary btn-block">Edit</a>
     <a role="button" href="./unitkerja.php" class="btn btn-danger btn-block">Kembali</a>
 </div>