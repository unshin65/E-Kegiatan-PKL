 <div class="container my-4">
     <h2>Data unit kerja</h2>
     <p>Buat data unit kerja baru</p>
     <hr>
     <form action="./action/createaction.php?ac=unitkerja" method="POST">
         <div class="row">
             <div class="col">
                 <div class="form-group">
                     <label for="namauk">Nama Unit Kerja</label>
                     <input type="text" class="form-control" name="namauk" id="namauk" aria-describedby="namaukid" placeholder="Nama Unit Kerja" required>
                     <small id="namaukid" class="form-text text-muted">Nama unit kerja baru</small>
                 </div>
                 <div class="form-group">
                     <label for="emailuk">Email</label>
                     <input type="text" class="form-control" name="emailuk" id="emailuk" aria-describedby="emailukid" placeholder="Email unit kerja">
                     <small id="emailukid" class="form-text text-muted">Email unit kerja baru</small>
                 </div>
                 <div class="form-group">
                     <label for="websiteuk">Website</label>
                     <input type="text" class="form-control" name="websiteuk" id="websiteuk" aria-describedby="webisteukid" placeholder="Website unit kerja baru">
                     <small id="webisteukid" class="form-text text-muted">Website unit kerja baru</small>
                 </div>
             </div>
             <div class="col">
                 <div class="form-group">
                     <label for="nourutuk">No urut</label>
                     <input type="number" class="form-control" name="nourutuk" id="nourutuk" aria-describedby="nourutuk" placeholder="Nomor urut unit kerja baru">
                     <small id="nourutuk" class="form-text text-muted">Nomor urut unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="latitude">Lat / Lon</label>
                     <input type="text" class="form-control" name="latitude" id="latitude" aria-describedby="Latitudeid" placeholder="Latitude">
                     <input type="text" class="form-control" name="longitude" id="longitude" aria-describedby="Latitudeid" placeholder="Longitude">
                     <small id="Latitudeid" class="form-text text-muted">Latitude dan Longitude unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="mesinuk">Mesin</label>
                     <input type="text" class="form-control" name="mesinuk" id="mesinuk" aria-describedby="mesinuk" placeholder="Mesin">
                     <small id="mesinuk" class="form-text text-muted">Mesin unit kerja</small>
                 </div>
                 <div class="form-group">
                     <label for="jenisuk">Jenis</label>
                     <input type="text" class="form-control" name="jenisuk" id="jenisuk" aria-describedby="jenisukid" placeholder="Jenis">
                     <small id="jenisukid" class="form-text text-muted">Jenis unit kerja</small>
                 </div>
             </div>
         </div>
         <hr>
         <button type="submit" class="btn btn-primary btn-block">Submit</button>
         <a role="button" href="./unitkerja.php" class="btn btn-danger btn-block">Kembali</a>
     </form>
 </div>