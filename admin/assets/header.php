<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="./index.php">Barcode</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="./kegiatan.php">Kegiatan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./unitkerja.php">Unit Kerja</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./jabatan.php">Jabatan</a>
            </li>
        </ul>
        <div class="my-2 my-lg-0 text-white">
            <div class="btn-group">
                <a class="nav-link dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['username'] ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                    <a class="dropdown-item" href="./edithandler.php?ac=profil">Ganti profil</a>
                    <a class="dropdown-item" href="../logout_action.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>