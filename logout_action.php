<?php
session_start();
if ($_SESSION['SID']) {
    session_destroy();
    header("Location: auth.php");
}
