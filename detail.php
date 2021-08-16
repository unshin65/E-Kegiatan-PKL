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
        $id = $_GET['id'];
        $jml_hadir = mysqli_query($koneksi, "SELECT COUNT(tbl_tanda_tangan.ID) as jumlah from tbl_tanda_tangan where ID_KEGIATAN='$id'");
        if ($jml_hadir) {
            while ($row = mysqli_fetch_object($jml_hadir)) {
                $jumlah = $row->jumlah;
            }
        }
        $jum_laki = 0;
        $jum_perempuan = 0;
        $lakilaki = mysqli_query($koneksi, "SELECT COUNT(tbl_tanda_tangan.JEN_KEL) as jenkel from tbl_tanda_tangan where ID_KEGIATAN='$id' and JEN_KEL=1");
        while ($rowl = mysqli_fetch_object($lakilaki)) {
            $jum_laki = $rowl->jenkel;
        }
        $perempuan = mysqli_query($koneksi, "SELECT COUNT(tbl_tanda_tangan.JEN_KEL) as jenkel from tbl_tanda_tangan where ID_KEGIATAN='$id' and JEN_KEL=2");
        while ($rowp = mysqli_fetch_object($perempuan)) {
            $jum_perempuan = $rowp->jenkel;
        }
        $jumlah_peserta = mysqli_query($koneksi, "SELECT JML_PESERTA from tbl_kegiatan where ID='$id'");
        while ($rowjlm_peserta = mysqli_fetch_object($jumlah_peserta)) {
            $jum_peserta = $rowjlm_peserta->JML_PESERTA;
        }
        ?>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="rekap.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php
                            $nm = $_GET['nm'];
                            echo strtoupper($nm);
                            ?></b></a>
                </div>
            </div>
        </div><br><br><br>
        <div class="list-group">
            <?php
            if ($id == 4) {
                $id = $_GET['id'];
                $jml_hadir = mysqli_query($koneksi, "SELECT COUNT(tbl_pegawai.ID) as jumlah from tbl_daftar_hadir INNER JOIN tbl_pegawai ON tbl_daftar_hadir.ID_PEGAWAI=tbl_pegawai.ID where tbl_pegawai.JABATAN='OPERATOR' group by tbl_daftar_hadir.ID_PEGAWAI");
                $hadir = 0;
                if ($jml_hadir) {
                    while ($row = mysqli_fetch_object($jml_hadir)) {
                        $hadir++;
                        $jumlah = $row->jumlah;
                    }
                }
                ?>
                <a href="#" class="list-group-item list-group-item-action"><b>Jumlah Peserta : 86 OPD </b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Jumlah Hadir : <?php echo $hadir ?> OPD</b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Persen Kehadiran : <?php echo round(($hadir / 86) * 100, 1); ?> %</b></a>
            <?php }
            else {
                $jml_hdr = $jum_peserta;
                $nm = $_GET['nm'];
                ?>
                <a href="#" class="list-group-item list-group-item-action"><b>Jumlah Peserta : <?php echo $jml_hdr; ?> Peserta </b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Jumlah Hadir : <?php echo $jumlah ?> Peserta</b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Laki-laki : <?php echo $jum_laki; ?> Orang | Perempuan : <?php echo $jum_perempuan; ?> Orang</b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Persen Kehadiran : <?php echo round(($jumlah / $jml_hdr) * 100, 1); ?> % </b></a><a href="tidak_hadir.php?id=<?php echo $id; ?>&nm=<?php echo $nm; ?>" class="btn btn-danger" role="button">Lihat Daftar Tidak Hadir</a>
                <?php
            }
            ?>

        </div>
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
                $result = mysqli_query($koneksi, "SELECT * from tbl_tanda_tangan where ID_KEGIATAN='$id' ORDER BY DATE_TIME ASC");
                if ($result) {
                    $c = 0;
                    while ($row = mysqli_fetch_object($result)) {
                        $c++;
                        ?>
                        <a href="detail_peserta.php?id=<?php echo $id; ?>&nm=<?php echo $nm; ?>&peserta=<?php echo $row->ID; ?>" class="list-group-item list-group-item-action"><b><?php echo "Nama : " . strtoupper($row->NAMA); ?></b><br> Unit Kerja : <?php echo $row->SKPD ?></a>
                        <?php
                    }
                }
            }
            ?>
        </div>
        <!--        <a href="materi.php" class="float">
                    Materi&nbsp;&nbsp;<i class="fa fa-download my-float"></i>
                </a>
        -->                
        <a href="print.php?id=<?php echo $id   ?>" class="float2" target="_blank">
            Print&nbsp;&nbsp;<i class="fa fa-print my-float"></i>
        </a>
        <a href="tanda_tangan.php" class="float">
            <i class="fa fa-2x fa-pencil my-float"></i>
        </a>
    </body>
</html>

