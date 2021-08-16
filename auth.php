<?php
session_start();
if (!empty($_SESSION['SID'])) {
    header('Location: ./admin/index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <style>
        html,
        body {
            height: 100%;
            background: url(http://datadamis.malangkab.go.id/barcode/assets/qrcode4.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .full-height {
            height: 100%;
        }
    </style>
</head>

<body>

    <div style="height: -webkit-fill-available;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card text-white bg-dark shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Login</h3>
                            <p class="text-center ">Login untuk melakukan pengelolaan data</p>
                            <?php
                            if (isset($_SESSION["errorMessage"])) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $_SESSION["errorMessage"]; ?>
                                </div>
                            <?php
                                unset($_SESSION["errorMessage"]);
                            }
                            ?>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="./auth_action.php">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                </div>
                                <hr />
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    <a href="./mobile.php" class="btn btn-secondary btn-block" role="button">Home</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>