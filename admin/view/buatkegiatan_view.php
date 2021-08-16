 <div class="container my-4">
     <h2>Data Kegiatan</h2>
     <p>Membuar data kegiatan baru</p>
     <hr>
     <form action="./action/createaction.php?ac=kegiatan" method="POST">
         <div class="row">
             <div class="col">
                 <div class="form-group">
                     <label for="namakegiatan">Nama Kegiatan</label>
                     <textarea class="form-control" name="namakegiatan" id="namakegiatan" aria-describedby="namakegiatanid" required rows="3"></textarea>
                 </div>
                 <div class="form-group">
                     <label for="penyelenggara">SKPD Penyelenggara</label>
                     <input type="text" class="form-control" name="penyelenggara" id="penyelenggara" aria-describedby="penyelenggarid">
                 </div>
                 <div class="form-group">
                     <label for="jam">Jam</label>
                     <input type="text" class="form-control" name="jam" id="jam" aria-describedby="jam">
                 </div>
                 <div class="form-group">
                     <label for="tanggalpelaksanaan">Tanggal Pelaksanaan</label>
                     <input type="date" class="form-control" name="tanggalpelaksanaan" id="tanggalpelaksanaan" aria-describedby="tanggalid">
                 </div>
             </div>
             <div class="col">
                 <div class="form-group">
                     <label for="namatempat">Nama Tempat</label>
                     <input type="text" class="form-control" name="namatempat" id="namatempat" aria-describedby="namatempatod">
                 </div>
                 <div class="form-group">
                     <label for="pimpinan">Pimpinan Rapat</label>
                     <input type="text" class="form-control" name="pimpinan" id="pimpinan" aria-describedby="pimpinan">
                 </div>
                 <div class="form-group">
                     <label for="peserta">Jumlah Peserta</label>
                     <input type="number" class="form-control" name="peserta" id="peserta" aria-describedby="pesertaid">
                 </div>
             </div>
         </div>
         <hr>
         <button type="submit" class="btn btn-primary btn-block">Submit</button>
         <a role="button" href="./kegiatan.php" class="btn btn-danger btn-block">Kembali</a>
     </form>
 </div>