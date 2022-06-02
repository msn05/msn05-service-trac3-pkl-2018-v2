<?php
ob_start();
require_once('../config/config.php');
require_once('../models/database.php');
include "../models/d_data_sp.php";
$connection = new Database($host, $user, $pass, $database);
$sp = new Sparepart($connection);

$id_sp = $_POST['id_sp'];
$kode_sp = $connection->conn->real_escape_string($_POST['kode_sp']);
$nama_sp = $connection->conn->real_escape_string($_POST['nama_sp']);
$brand_sp = $connection->conn->real_escape_string($_POST['brand_sp']);
$tipe_sp = $connection->conn->real_escape_string($_POST['tipe_sp']);
$model_sp = $connection->conn->real_escape_string($_POST['model_sp']);
$tgl_dtg = $connection->conn->real_escape_string($_POST['tgl_dtg']);
$jumlah_sp = $connection->conn->real_escape_string($_POST['jumlah_sp']);                    
$harga = $connection->conn->real_escape_string($_POST['harga']);        
$status = $connection->conn->real_escape_string($_POST['status']);

$sp->edit("UPDATE tbl_sparepart SET kode_sp = '$kode_sp', nama_sp = '$nama_sp', brand_sp = '$brand_sp', tipe_sp = '$tipe_sp', model_sp = '$model_sp', tgl_dtg = '$tgl_dtg', jumlah_sp = '$jumlah_sp', harga = '$harga', status = '$status' WHERE id_sp = '$id_sp'");
	echo "<script>window.location='?page=data_sp';</script>";

?>