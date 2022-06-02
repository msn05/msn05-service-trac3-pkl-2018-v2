<?php
require_once("config/config.php");
@session_start();
unset($_SESSION['admin']);
@session_destroy();
echo "<script>window.location='index.php';</script>";
?>