<?php
include "./koneksi.php";
?>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/js-lib/jquery.signature.css" />
    <link rel="stylesheet" href="assets/js-lib/jquery-ui.css" />
    <link rel="stylesheet" href="assets/js-lib/jquery.signature.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>

    <script src="assets/js-lib/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js-lib/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/js-lib/jquery.signature.js" type="text/javascript"></script>
    <script src="assets/js-lib/jquery.ui.touch-punch.min.js" type="text/javascript"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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

        #container {
            height: 100%;
            border-collapse: collapse;
        }

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

        .kbw-signature {
            height: 300px;
            width: 400px;
        }
    </style>

    <script>
        $(function() {
            $('#tandatangan').signature({
                guideline: true
            });

            $('#hapus').click(function() {
                $('#tandatangan').signature('clear');
            });
            $('canvas').on('mouseup', function() {
                var ttd = $('#tandatangan').signature('toJSON');
                $('#json_output').val(ttd);
            });
            $('.select2init').select2();
        });
    </script>
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="mobile.php"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;&nbsp;&nbsp;<b>ISI DAFTAR HADIR</b></a>
            </div>
        </div>
    </div>
    <br><br><br>
    <div id="form" class="container">
        <h1>Isi daftar hadir</h1>
        <form action="proses_simpan_ttd.php" method="post">
            <div class="form-group">
                <label>Pilih Sosialisasi / Bimbingan Teknis</label>
                <select class="form-control select2init" name="kegiatan">
                    <option value="" selected="" disabled="">PILIH</option>
                    <?php
                    $queryJabatan = "SELECT * FROM `tbl_kegiatan`";
                    $resultJabatan = mysqli_fetch_all(mysqli_query($koneksi, $queryJabatan));
                    foreach ($resultJabatan as $key => $value) {
                        echo '<option value="' . $value[0] . '">' . $value[1] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Masukkan Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="nama">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select class="form-control" name="jen_kel">
                    <option value="" selected="" disabled="">PILIH</option>
                    <option value="1">Laki - laki</option>
                    <option value="2">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Nomor HP</label><br>
                <input type="number" class="form-control" name="hp" placeholder="Nomor HP">
            </div>
            <div class="form-group">
                <label>Satuan Kerja</label>
                <select class="form-control select2init" name="satker">
                    <option value="" selected="" disabled="">PILIH</option>
                    <?php
                    $result = mysqli_query($koneksi, "SELECT * FROM `tbsatkerja` ORDER BY `nama`");
                    if ($result) {
                        while ($row = mysqli_fetch_object($result)) {
                    ?>
                            <option value="<?php echo strtoupper($row->nama); ?>"><?php echo strtoupper($row->nama); ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Jabatan</label>
                <select class="form-control select2init" name="jabatan">
                    <option value="" selected="" disabled="">PILIH</option>
                    <?php
                    $queryJabatan = "SELECT * FROM `tbl_jabatan`";
                    $resultJabatan = mysqli_fetch_all(mysqli_query($koneksi, $queryJabatan));
                    foreach ($resultJabatan as $key => $value) {
                        echo '<option value="' . $value[1] . '">' . $value[1] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label>Tanda Tangan</label><br>
                <div id="tandatangan"></div>
                <p style="clear: both;">
                    <a id="hapus"><b>HAPUS</b></a>
                </p>
                <input type="hidden" id='json_output' name="img">

            </div>
            <button type="submit" class="btn btn-success btn-block">Submit</button>

        </form>
    </div>
</body>

</html>