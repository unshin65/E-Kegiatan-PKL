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
        <style>
            .responsive {
                max-width: 97%;
                height: auto;
            }
        </style>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="pegawai.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>QRCODE PAGAWAI</b></a>
                </div>
            </div>
        </div><br><br><br>
        <?php
        include 'koneksi.php';
        include 'tanggal_indo.php';
        $id = $_GET['id'];
        $result = mysqli_query($koneksi, "SELECT * FROM tbl_pegawai where ID=$id");
        if ($result) {
            while ($row = mysqli_fetch_object($result)) {
                $nama = $row->NAMA;
                $jabatan = $row->JABATAN;
                $qrcode = $row->QRCODE;
                $unitkerja = $row->UNIT_KERJA;
                $nip = $row->NIP;
                $no_hp = $row->NO_HP;
                $email = $row->EMAIL;
                if($no_hp == null){
                    $no_hape="-";
                }else{
                    $no_hape = $no_hp;
                }
                if($email == null){
                    $e_mail = "-";
                } else {
                    $e_mail = $email;
                }
            }
        }
        ?>
        <div id="form">
            <form>
                <div class="form-group">
                    <img src="http://datadamis.malangkab.go.id/barcode/temp/<?php echo $qrcode; ?>" alt="QRCODE" class="responsive" width="600" height="400">
                    <hr>
                    Unit Kerja
                    <h4><?php echo $unitkerja; ?></h4><br>
                    Nama Lengkap
                    <h4><?php echo $nama; ?></h4><br>
                    NIP
                    <h4><?php echo $nip; ?></h4><br>
                    Jabatan
                    <h4><?php echo $jabatan; ?></h4><br>
                    No HP
                    <h4><?php echo $no_hape; ?></h4><br>
                    Email
                    <h4><?php echo $e_mail; ?></h4><br>
                </div>	
            </form>
        </div>
    </body>
</html>


