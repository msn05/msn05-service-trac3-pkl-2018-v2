<?php
ob_start();
require_once('../config/config.php');
require_once('../models/database.php');
include "../models/d_kustomer.php";
$connection = new Database($host, $user, $pass, $database);
$ktm = new Kustomer($connection);

$kustom_id = $_POST['kustom_id'];
$kustom_nama = $connection->conn->real_escape_string($_POST['kustom_nama']);
$no_ktp = $connection->conn->real_escape_string($_POST['no_ktp']);
$kustom_alamat = $connection->conn->real_escape_string($_POST['kustom_alamat']);
$kustom_jk = $connection->conn->real_escape_string($_POST['kustom_jk']);
$kustom_hp = $connection->conn->real_escape_string($_POST['kustom_hp']);
$kustom_email = $connection->conn->real_escape_string($_POST['kustom_email']);

$cek = $ktm->edit("UPDATE kustom SET kustom_nama = '$kustom_nama', no_ktp = '$no_ktp', kustom_alamat = '$kustom_alamat', kustom_jk = '$kustom_jk', kustom_hp = '$kustom_hp', kustom_email = '$kustom_email' WHERE kustom_id = '$kustom_id'");
	echo "<script>window.location='?page=kustomer';</script>";
?>