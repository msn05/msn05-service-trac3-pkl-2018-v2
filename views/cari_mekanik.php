<?php


require_once('../config/config.php');
require_once('../models/database.php');
$connection = new Database($host, $user, $pass, $database);
include "../models/d_mekanik.php.php";

$mnk = new Mekanik($connection);
$id=$_POST['mekanik_id'];
  $tampil = $ktm->tampil($id);
while ($mnk = mysqli_fetch_array($tampil)){
  $alamat=$ktm['kustom_alamat'];
  $email=$ktm['kustom_email'];
}

?>
<div class="form-group">
	<label class="control-label" for="alamat">Alamat</label>
	<input type="text" id="kustom_alamat" class="form-control" name="kustom_alamat" value="<?php echo $alamat;?>">
</div>
<div class="form-group">
  	<label class="control-label" for="email">Email</label>
  	<input type="text" id="kustom_email" class="form-control" name="kustom_email" value="<?php echo $email;?>"> 	
</div>
