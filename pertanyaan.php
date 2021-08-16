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
                width:120px;
                height:60px;
                bottom:40px;
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
                    <a class="navbar-brand" href="rekap.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>PERTANYAAN</b></a>
                </div>
            </div>
        </div><br><br><br>
        <div class="list-group">
            <?php
            include 'koneksi.php';
            include 'tanggal_indo.php';
            $id_keg = $_GET['id'];
            $result = mysqli_query($koneksi, "SELECT * FROM tbl_pertanyaan where ID_KEGIATAN=$id_keg ORDER BY ID DESC");
            if ($result) {
                while ($row = mysqli_fetch_object($result)) {
                    $id = $row->ID;
                    ?>
                    <a onclick="return theFunction(<?php echo $id; ?>);" class="list-group-item list-group-item-action"><b><?php echo "Pengirim : " . strtoupper($row->PENGIRIM); ?></b><br>Pertanyaan : <?php echo $row->PERTANYAAN; ?><br>
                        <div class="pull-right">
                            <?php
                            $komentar = mysqli_query($koneksi, "SELECT * FROM tbl_komentar where ID_PERTANYAAN=$id");
                            $jml_komentar = 0;
                            if ($komentar) {
                                while ($row = mysqli_fetch_object($komentar)) {
                                    $jml_komentar++;
                                }
                            }
                            ?>
                            <?php echo $jml_komentar; ?>
                            <i class="fa fa-commenting-o"></i>
                        </div><br>
                    </a>
                    <script type="text/javascript">
                        function theFunction(id) {
                            console.log(id);
                        }
                    </script>
                    <?php
                }
            }
            ?>

        </div>
        <a href="tambah_pertanyaan.php?id=<?php echo $id_keg; ?>" class="float">
            <i class="fa fa-plus my-float">&nbsp;&nbsp;Saya Tanya !</i>
        </a>
    </body>
</html>


