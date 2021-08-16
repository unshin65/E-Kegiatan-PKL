<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <style>
            .block {
                display: block;
                width: 100%;
                height: 10%;
                border: none;
                background-color: 808080;
                color: black;
                padding: 14px 28px;
                font-size: 20px;
                cursor: pointer;
                text-align: left;
            }

            .block:hover {
                background-color: #ddd;
                color: black;
            }
        </style>
        <style>
            #container {
                height: 100%;
                border-collapse: collapse;
            }
        </style>
        <style>
            #form {
                border-radius: 5px;
                padding: 20px;
            }
            input[type=submit] {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="pegawai.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>TAMBAH PEGAWAI</b></a>
                </div>
            </div>
        </div><br><br><br>
        <div id="form">
            <form action="proses_simpan_pegawai.php" method="post">
                <div class="form-group">
                    <label>Nama Lengkap</label><br>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                    <label>NIP</label><br>
                    <input type="text" class="form-control" name="nip" placeholder="NIP">
                    <label>Jabatan</label><br>
                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan">
                    <label>Unit Kerja</label><br>
                    <input type="text" class="form-control" name="unit_kerja" placeholder="Unit Kerja" required="">
                    <label>No HP</label><br>
                    <input type="text" class="form-control" name="no_hp" placeholder="No HP">
                    <label>Email</label><br>
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <input type="submit" value="Simpan">
                </div>	
            </form>
        </div>
    </body>
</html>


