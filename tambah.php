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
                    <a class="navbar-brand" href="scan.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>TAMBAH KEGIATAN</b></a>
                </div>
            </div>
        </div><br><br><br>
        <div id="form">
            <form action="proses_simpan.php" method="post">
                <div class="form-group">
                    <label>Nama Kegiatan</label><br>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Kegiatan">
                    <label>Tanggal</label><br>
                    <input type="date" class="form-control" name="tanggal" placeholder="Tanggal">
                    <label>Pukul</label><br>
                    <input type="text" class="form-control" name="pukul" placeholder="Pukul">
                    <label>Tempat</label><br>
                    <input type="text" class="form-control" name="tempat" placeholder="Tempat">
                    <label>SKPD Penyelenggara</label><br>
                    <input type="text" class="form-control" name="skpd" placeholder="Tempat">
                    <label>Pimpinan Rapat</label><br>
                    <input type="text" class="form-control" name="pimpinan" placeholder="Tempat">
                    <input type="submit" value="Simpan">
                </div>	
            </form>
        </div>
    </body>
</html>


