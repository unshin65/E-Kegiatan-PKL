<?php
session_start();
include "../koneksi.php";
include "./action/authaction.php";

$queryJabatan = "SELECT * FROM `tbl_jabatan`";
$resultJabatan = mysqli_fetch_all(mysqli_query($koneksi, $queryJabatan));
?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
</head>

<body>
    <?php include './assets/header.php' ?>
    <div class="container my-4">
        <h2>Data Jabatan</h2>
        <p>Menampilkan data jabatan secara keseluruhan</p>
        <?php include './assets/alert.php' ?>
        <hr>
        <div class="table-responsive">
            <table class="table" id="datatables">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Jabatan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultJabatan as $key => $value) { ?>
                        <tr>
                            <td scope="row"><?= $key + 1 ?></td>

                            <?php foreach ([1] as $index) { ?>
                                <td><?= $value[$index] ?></td>
                            <?php } ?>
                            <td>
                                <div class="dropdown open">
                                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="menuId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa fa-bars" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="menuId">
                                        <a role="button" class="dropdown-item" href="./edithandler.php?ac=jabatan&i=<?= $value[0] ?>">Edit</a>
                                        <button onclick="deleteJabatan(<?= $value[0] ?>)" class="dropdown-item">Hapus</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(() => {
            $("#datatables").DataTable();
            $("#datatables_filter").append("<a class='btn btn-sm btn-success mx-3 ' href='./createhandler.php?ac=jabatan' role='button'><i class='fa fa-plus' aria-hidden='true'></i> Buat Jabatan</a>");

        });

        const deleteJabatan = (id) => {
            var answer = confirm('Apakah anda yakin untuk menghapus data jabatan?');
            if (answer) {
                window.location = `action/delaction.php?ac=jabatan&id=${id}`;
            }
        };
    </script>
</body>

</html>