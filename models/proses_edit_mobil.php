<?php
ob_start();
require_once('../config/config.php');
require_once('../models/database.php');
include "../models/d_data_m.php";


$connection = new Database($host, $user, $pass, $database);
$mbl = new Mobil($connection);



$id_mbl = $_POST['id_mbl'];

$no_polisi = $connection->conn->real_escape_string($_POST['no_polisi']);
$brand = $connection->conn->real_escape_string($_POST['brand']);
$tipe_mbl = $connection->conn->real_escape_string($_POST['tipe_mbl']);
$model_mbl = $connection->conn->real_escape_string($_POST['model_mbl']);
$harga = $connection->conn->real_escape_string($_POST['harga']);
$tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
$lokasi_mbl = $connection->conn->real_escape_string($_POST['lokasi_mbl']);
$status = $connection->conn->real_escape_string($_POST['status']);

$mbl->edit("UPDATE tbl_mobil SET no_polisi = '$no_polisi', brand = '$brand', tipe_mbl = '$tipe_mbl', model_mbl = '$model_mbl',harga = '$harga', tgl_masuk = '$tgl_masuk', lokasi_mbl = '$lokasi_mbl', status = '$status' WHERE id_mbl = '$id_mbl'");
	echo "<script>window.location='?page=data_mobil';</script>";

?>