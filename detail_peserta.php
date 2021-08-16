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
        <style>
            .kbw-signature{
                height: 300px;
                width: 400px;
            }
        </style>
        <?php
        include 'koneksi.php';
        include 'tanggal_indo.php';
        $peserta = $_GET['peserta'];
        $id = $_GET['id'];
        $nm = $_GET['nm'];
        ?>
        <script>
            $(function () {
                $('#prev').signature().signature('enable');
                $('#prev').signature('draw', $('#json_output').val());
            });

        </script>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="detail.php?id=<?php echo $id; ?>&nm=<?php echo $nm; ?>"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>DETAIL PESERTA</b></a>
                </div>
            </div>
        </div><br><br><br>
        <div class="list-group"><br>
            <?php
            $result = mysqli_query($koneksi, "SELECT * from tbl_tanda_tangan where ID=$peserta");
            if ($result) {
                $c = 0;
                while ($row = mysqli_fetch_object($result)) {
                    $c++;
                    if($row->JEN_KEL == 1){
                        $jenkel = 'LAKI - LAKI';
                    }elseif($row->JEN_KEL == 2){
                        $jenkel = 'PEREMPUAN';
                    }
                    ?>
                    <a href="#" class="list-group-item list-group-item-action"><b><?php echo "Nama : " . strtoupper($row->NAMA); ?></b><br>JENIS KELAMIN : <?php echo $jenkel . "<br>Unit Kerja : " . $row->SKPD ?><br>
                        <textarea id="json_output" style="display:none;"><?php echo $row->TTD ?></textarea><div id='prev'></div></a>
                    <?php
                }
            }
            ?>
        </div>
<!--        <a href="materi.php" class="float">
            Materi&nbsp;&nbsp;<i class="fa fa-download my-float"></i>
        </a>
        <a href="pertanyaan.php?id=<?php // echo $id ?>" class="float2">
            Pertanyaan&nbsp;&nbsp;<i class="fa fa-question my-float"></i>
        </a>-->
    </body>
</html>

