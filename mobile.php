<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style type="text/css">
        html {
            background: url(http://datadamis.malangkab.go.id/barcode/assets/qrcode4.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
    <style>
        .block {
            display: block;
            width: 100%;
            height: 10%;
            border: none;
            background-color: #000000;
            color: white;
            padding: 14px 28px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
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
        * {
            padding: 0;
            margin: 0;
        }

        .float {
            position: fixed;
            width: 70px;
            height: 70px;
            bottom: 80px;
            right: 40px;
            background-color: #FF0000;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float {
            margin-top: 22px;
        }

        .float2 {
            position: fixed;
            width: 70px;
            height: 70px;
            bottom: 240px;
            right: 40px;
            background-color: #FF0000;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .float3 {
            position: fixed;
            width: 70px;
            height: 70px;
            bottom: 160px;
            right: 40px;
            background-color: #FF0000;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float2 {
            margin-top: 22px;
        }
    </style>
</head>

<body>
    <table id="container" width="100%">

        <tr>
            <td valign="bottom" style="">
                <a href="#" class="w3-btn block">TANYA</a>
            </td>
            <td valign="bottom">
                <a href="rekap.php" class="w3-btn block">REKAP</a>
            </td>
            <td valign="bottom">
                <a href="materi.php" class="w3-btn block">MATERI</a>
            </td>
        </tr>

    </table>
    <a href="pegawai.php" class="float3">
        <i class="fa fa-2x fa-group my-float"></i>
    </a>
    <a href="tanda_tangan.php" class="float2">
        <i class="fa fa-2x fa-pencil my-float2"></i>
    </a>
    <a href="auth.php" class="float">
        <i class="fa fa-2x fa-user-circle my-float2" aria-hidden="true"></i>
    </a>
</body>

</html>