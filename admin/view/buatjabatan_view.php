 <div class="container my-4">
     <h2>Data Jabatan</h2>
     <p>Membuat data jabatan baru</p>
     <hr>
     <form action="./action/createaction.php?ac=jabatan" method="POST">
         <div class="form-group">
             <label for="jabatan">Nama Jabatan</label>
             <input type="text" class="form-control" name="jabatan" id="jabatan" aria-describedby="jabatanid" placeholder="Nama Jabatan">
         </div>
         <hr>
         <button type="submit" class="btn btn-primary btn-block">Submit</button>
         <a role="button" href="./jabatan.php" class="btn btn-danger btn-block">Kembali</a>
     </form>
 </div>