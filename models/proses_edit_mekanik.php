<?php
ob_start();
require_once('../config/config.php');
require_once('../models/database.php');
include "../models/d_mekanik.php";
$connection = new Database($host, $user, $pass, $database);
$mnk = new Mekanik($connection);

$id_mnk = $_POST['id_mnk'];
$nama_mnk = $connection->conn->real_escape_string($_POST['nama_mnk']);
$no_telephone = $connection->conn->real_escape_string($_POST['no_telephone']);
$alamat_mnk = $connection->conn->real_escape_string($_POST['alamat_mnk']);

$mnk->edit("UPDATE tbl_mekanik SET nama_mnk = '$nama_mnk', no_telephone = '$no_telephone', alamat_mnk = '$alamat_mnk' WHERE id_mnk = '$id_mnk'");
	echo "<script>window.location='?page=mekanik';</script>";
?>