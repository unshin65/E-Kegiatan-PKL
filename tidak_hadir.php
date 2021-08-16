<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="assets/js-lib/jquery.signature.css" />
        <link rel="stylesheet" href="assets/js-lib/jquery-ui.css" />
        <link rel="stylesheet" href="assets/js-lib/jquery.signature.css" />

        <script src="assets/js-lib/jquery.min.js" type="text/javascript" ></script>
        <script src="assets/js-lib/jquery-ui.min.js" type="text/javascript" ></script>
        <script src="assets/js-lib/jquery.signature.js" type="text/javascript" ></script>
        <script src="assets/js-lib/jquery.ui.touch-punch.min.js" type="text/javascript" ></script>
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
            *{padding:0;margin:0;}

            .float{
                position:fixed;
                width:70px;
                height:70px;
                bottom:80px;
                right:40px;
                background-color:#FF0000;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

            .float2{
                position:fixed;
                width:100px;
                height:60px;
                bottom:10px;
                right:40px;
                background-color:#0C9;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

            .my-float{
                margin-top:22px;
            }
        </style>
        <style>
            .kbw-signature{
                height: 200px;
                width: 300px;
            }
        </style>
        <?php
        include 'koneksi.php';
        include 'tanggal_indo.php';
        ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <?php
                    $nm = $_GET['nm'];
                    $id = $_GET['id'];
                    ?>
                    <a class="navbar-brand" href="detail.php?id=<?php echo $id; ?>&nm=<?php echo $nm; ?>"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>OPD TIDAK HADIR</b></a>
                </div>
            </div>
        </div><br><br><br>

        <div class="list-group"><br>
            <?php
            if ($id == 4) {
                $result = mysqli_query($koneksi, "SELECT tbl_pegawai.NAMA as NAMA, tbl_pegawai.JABATAN as JABATAN, tbl_pegawai.UNIT_KERJA as UNIT_KERJA FROM tbl_daftar_hadir INNER JOIN tbl_pegawai ON tbl_daftar_hadir.ID_PEGAWAI=tbl_pegawai.ID where ID_KEGIATAN=$id group by tbl_daftar_hadir.ID_PEGAWAI ORDER BY tbl_daftar_hadir.ID ASC");
                if ($result) {
                    while ($row = mysqli_fetch_object($result)) {
                        ?>
                        <a href="#" class="list-group-item list-group-item-action"><b><?php echo "Nama : " . strtoupper($row->NAMA); ?></b><br>Jabatan : <?php echo $row->JABATAN . "<br>Unit Kerja : " . $row->UNIT_KERJA ?></a>
                        <?php
                    }
                }
            } else {
                $array_skpd = array();
                $result = mysqli_query($koneksi, "SELECT SKPD from tbl_tanda_tangan WHERE ID_KEGIATAN=$id "
                        . " GROUP BY SKPD ORDER BY SKPD ASC");
                if ($result) {
                    $c = 0;
                    while ($row = mysqli_fetch_object($result)) {
                        $array_skpd[] = $row->SKPD;
                    }
                }
                $array2 = array();
                $c=0;
                $result2 = mysqli_query($koneksi, "SELECT nama from tbsatkerja where (jenis=1 OR jenis=2 OR jenis=3 OR jenis=4 OR jenis=5 OR jenis=6 OR jenis=8) ORDER BY nama ASC");
                if ($result2) {
                    while ($row2 = mysqli_fetch_object($result2)) {
                        if ((in_array(strtoupper($row2->nama), $array_skpd)) == NULL) {
                            $c++;
                            ?>
                        <a href="#" class="list-group-item list-group-item-action"><br><b><?php echo $c.". ".strtoupper($row2->nama) ?></b></a>
                            <?php
                        }
                    }
                }
            }
            ?>
        </div>
        <!--        <a href="materi.php" class="float">
                    Materi&nbsp;&nbsp;<i class="fa fa-download my-float"></i>
                </a>
        -->                
        <!--<a href="print.php?id=<?php //echo $id ?>" class="float2">
            Print&nbsp;&nbsp;<i class="fa fa-print my-float"></i>
        </a>
		-->
        <a href="tanda_tangan.php" class="float">
            <i class="fa fa-2x fa-pencil my-float"></i>
        </a>
    </body>
</html>

