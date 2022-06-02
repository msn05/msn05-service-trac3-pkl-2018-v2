<?php 
require_once('../config/config.php');
require_once('../models/database.php');
// session_start();
$connection = new Database($host, $user, $pass, $database);


  include "../models/d_servis.php";
  include "../models/d_kustomer.php";
  include "../models/d_data_m.php";
  include "../models/d_password.php";

  $os = new Servis($connection);
  $ktm = new Kustomer($connection);
  $mbl = new Mobil($connection);
  $user = new Password($connection);

session_start();

// $no_order = $connection->conn->real_escape_string($_POST['no_order']);

$tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
$kustom_id = $connection->conn->real_escape_string($_POST['kustom_id']);
$sparepart = $connection->conn->real_escape_string($_POST['sparepart']);
$mekanik = $connection->conn->real_escape_string($_POST['mekanik']);
$jumlah = $connection->conn->real_escape_string($_POST['jumlah']);
$harga = $connection->conn->real_escape_string($_POST['harga_sp']);
$status = $connection->conn->real_escape_string($_POST['status']);
$prakiraan = $connection->conn->real_escape_string($_POST['prakiraan']);
$total = $connection->conn->real_escape_string($_POST['total']);

$alamat = $connection->conn->real_escape_string($_POST['kustom_alamat']);
$email = $connection->conn->real_escape_string($_POST['kustom_email']);

$nama = $connection->conn->real_escape_string($_POST['nama_sp']);
$model = $connection->conn->real_escape_string($_POST['model_sp']);
$tipe = $connection->conn->real_escape_string($_POST['tipe_sp']);

// tampilkan username session
$username = $_SESSION['admin'];

$id_karyawan = $user->tampilId($username)->fetch_object()->id;

// $or->tambah($id_karyawan, '0001', $kustom_id,$harga, $tgl_dirental, $denda, $tgl_kembali, 0,$status);
$os->tambah($id_karyawan,$tgl_masuk,$kustom_id,$sparepart,$mekanik,$jumlah,$harga,$prakiraan,$status,$total,$alamat,$email,$nama,$model,$tipe);

header("location: ../home.php?page=os");


