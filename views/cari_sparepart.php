<?php


require_once('../config/config.php');
require_once('../models/database.php');
$connection = new Database($host, $user, $pass, $database);
include "../models/d_data_sp.php";

$s = new Sparepart($connection);
$id=$_POST['sparepart_id'];
  $tampil = $s->tampil($id);
$mnk = mysqli_fetch_array($tampil);
  $nama=$mnk['nama_sp'];
  $model=$mnk['model_sp'];
  $tipe=$mnk['tipe_sp'];
  $harga=$mnk['harga'];


?>
<div class="form-group">
	<label class="control-label" for="alamat">Nama Sparepart</label>
	<input type="text" id="nama_sp" class="form-control" name="nama_sp" value="<?php echo $nama;?>">
</div>

<div class="form-group">
  	<label class="control-label" for="model_sp">Model</label>
  	<input type="text" id="model_sp" class="form-control" name="model_sp" value="<?php echo $model;?>"> 	
</div>

<div class="form-group">
  	<label class="control-label" for="model_sp">Tipe</label>
  	<input type="text" id="tipe_sp" class="form-control" name="tipe_sp" value="<?php echo $tipe;?>"> 	
</div>

<div class="form-group">
    <label class="control-label" for="harga_sp">Harga</label>
    <input type="text" id="harga_sp" class="form-control" name="harga_sp" value="<?php echo $harga;?>">  
</div>
