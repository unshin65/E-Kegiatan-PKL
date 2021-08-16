
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
            *{padding:0;margin:0;}

            .float{
                position:fixed;
                width:100px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color:#0C9;
                color:#FFF;
                border-radius:50px;
                text-align:center;
                box-shadow: 2px 2px 3px #999;
            }

            .float2{
                position:fixed;
                width:100px;
                height:60px;
                bottom:120px;
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
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="mobile.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php $nm = $_GET['nm'];
echo strtoupper($nm);
?></b></a>
                </div>
            </div>
        </div><br><br><br>
        <div class="list-group">
            <?php
            include 'koneksi.php';
            include 'tanggal_indo.php';
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
        </div>
        <div class="list-group"><br>
            <?php
            $result = mysqli_query($koneksi, "SELECT tbl_pegawai.NAMA as NAMA, tbl_pegawai.JABATAN as JABATAN, tbl_pegawai.UNIT_KERJA as UNIT_KERJA FROM tbl_daftar_hadir INNER JOIN tbl_pegawai ON tbl_daftar_hadir.ID_PEGAWAI=tbl_pegawai.ID where ID_KEGIATAN=$id group by tbl_daftar_hadir.ID_PEGAWAI ORDER BY tbl_daftar_hadir.ID ASC");
            if ($result) {
                while ($row = mysqli_fetch_object($result)) {
                    ?>
                    <a href="#" class="list-group-item list-group-item-action"><b><?php echo "Nama : " . strtoupper($row->NAMA); ?></b><br>Jabatan : <?php echo $row->JABATAN . "<br>Unit Kerja : " . $row->UNIT_KERJA ?></a>
                    <?php
                }
            }
            ?>

        </div>
        <a href="materi.php" class="float">
            Materi&nbsp;&nbsp;<i class="fa fa-download my-float"></i>
        </a>
        <a href="pertanyaan.php" class="float2">
            Pertanyaan&nbsp;&nbsp;<i class="fa fa-question my-float"></i>
        </a>
    </body>
</html>


