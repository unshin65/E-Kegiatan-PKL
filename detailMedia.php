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
        $jml_hadir = mysqli_query($koneksi, "SELECT COUNT(tbl_komunikasi.ID) as jumlah from tbl_komunikasi where ID_KEGIATAN='$id' AND KAT_PESERTA=1");
        if ($jml_hadir) {
            while ($row = mysqli_fetch_object($jml_hadir)) {
                $jumlah = $row->jumlah;
            }
        }
        $jum_laki = 0;
        $jum_perempuan = 0;
        $lakilaki = mysqli_query($koneksi, "SELECT COUNT(tbl_komunikasi.JEN_KEL) as jenkel from tbl_komunikasi where ID_KEGIATAN='$id' and JEN_KEL=1  AND KAT_PESERTA=1");
        while ($rowl = mysqli_fetch_object($lakilaki)) {
            $jum_laki = $rowl->jenkel;
        }
        $perempuan = mysqli_query($koneksi, "SELECT COUNT(tbl_komunikasi.JEN_KEL) as jenkel from tbl_komunikasi where ID_KEGIATAN='$id' and JEN_KEL=2  AND KAT_PESERTA=1");
        while ($rowp = mysqli_fetch_object($perempuan)) {
            $jum_perempuan = $rowp->jenkel;
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
            $jml_hdr = 40;
                ?>
                <a href="#" class="list-group-item list-group-item-action"><b>Jumlah Peserta : <?php echo $jml_hdr; ?> Peserta </b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Jumlah Hadir : <?php echo $jumlah ?> Peserta</b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Laki-laki : <?php echo $jum_laki; ?> Orang | Perempuan : <?php echo $jum_perempuan; ?> Orang</b></a>
                <a href="#" class="list-group-item list-group-item-action"><b>Persen Kehadiran : <?php echo round(($jumlah / $jml_hdr) * 100, 1); ?> %</b></a>
                <?php
            ?>

        </div>
		<div class="list-group"><br>
		<a href="#" class="list-group-item list-group-item-action"><b>NARASUMBER / UNDANGAN</b></a>
            <?php
				$result = mysqli_query($koneksi, "SELECT * from tbl_komunikasi where ID_KEGIATAN='$id' AND KAT_PESERTA=2 ORDER BY DATE_TIME ASC");
                if ($result) {
                    $c = 0;
                    while ($row = mysqli_fetch_object($result)) {
                        $c++;
                        ?>
                        <a href="detail_peserta.php?id=<?php echo $id; ?>&nm=<?php echo $nm; ?>&peserta=<?php echo $row->ID; ?>" class="list-group-item list-group-item-action"><b><?php echo "Nama : " . strtoupper($row->NAMA); ?></b><br> Unit Kerja / Media: <?php echo $row->MEDIA ?></a>
                        <?php
                    }
                }            ?>
        </div>
        <div class="list-group"><br>
		<a href="#" class="list-group-item list-group-item-action"><b>PESERTA</b></a>
            <?php
				$result = mysqli_query($koneksi, "SELECT * from tbl_komunikasi where ID_KEGIATAN='$id' AND KAT_PESERTA=1 ORDER BY DATE_TIME ASC");
                if ($result) {
                    $c = 0;
                    while ($row = mysqli_fetch_object($result)) {
                        $c++;
                        ?>
                        <a href="detail_peserta.php?id=<?php echo $id; ?>&nm=<?php echo $nm; ?>&peserta=<?php echo $row->ID; ?>" class="list-group-item list-group-item-action"><b><?php echo "Nama : " . strtoupper($row->NAMA); ?></b><br> Unit Kerja / Media: <?php echo $row->MEDIA ?></a>
                        <?php
                    }
                }            ?>
        </div>
		<div class="list-group"><br>
		<a href="#" class="list-group-item list-group-item-action"><b>LAIN - LAIN / PANITIA</b></a>
            <?php
				$result = mysqli_query($koneksi, "SELECT * from tbl_komunikasi where ID_KEGIATAN='$id' AND KAT_PESERTA=3 ORDER BY DATE_TIME ASC");
                if ($result) {
                    $c = 0;
                    while ($row = mysqli_fetch_object($result)) {
                        $c++;
                        ?>
                        <a href="detail_peserta.php?id=<?php echo $id; ?>&nm=<?php echo $nm; ?>&peserta=<?php echo $row->ID; ?>" class="list-group-item list-group-item-action"><b><?php echo "Nama : " . strtoupper($row->NAMA); ?></b><br> Unit Kerja / Media: <?php echo $row->MEDIA ?></a>
                        <?php
                    }
                }            ?>
        </div>
        <!--        <a href="materi.php" class="float">
                    Materi&nbsp;&nbsp;<i class="fa fa-download my-float"></i>
                </a>
        -->                
        <?php 
		if($id==9){
			?>
			<a href="printMedia.php?id=<?php echo $id   ?>" class="float2" target="_blank">
            Print&nbsp;&nbsp;<i class="fa fa-print my-float"></i>
			</a>
			<?php
		}else {
			?>
			<a href="print.php?id=<?php echo $id   ?>" class="float2" target="_blank">
            Print&nbsp;&nbsp;<i class="fa fa-print my-float"></i>
			</a>
			<?php
		}
		?>
        <a href="tanda_tangan.php" class="float">
            <i class="fa fa-2x fa-pencil my-float"></i>
        </a>
    </body>
</html>

