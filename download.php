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
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="materi.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>DOWNLOAD MATERI</b></a>
                </div>
            </div>
        </div><br><br><br>
        <div class="list-group">
            <?php
            include 'koneksi.php';
            include 'tanggal_indo.php';
			$id = $_GET['id'];
            $result = mysqli_query($koneksi, "SELECT * FROM tbl_materi where ID_KEGIATAN=$id");
            if ($result) {
                while ($row = mysqli_fetch_object($result)) {
					$nama = $row->NAMA;
                    ?>
            <a href="http://datadamis.malangkab.go.id/barcode/materi/<?php echo $nama; ?>" class="list-group-item list-group-item-action" target="_blank"><b><?php echo strtoupper($row->NAMA); ?></b></a>
                    <?php
                }
            }
            ?>

        </div>
    </body>
</html>


