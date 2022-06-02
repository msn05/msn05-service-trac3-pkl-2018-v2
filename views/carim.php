<?php
require_once('../config/config.php');
require_once('../models/database.php');
$connection = new Database($host, $user, $pass, $database);
include "../models/d_data_m.php";	

$mbl = new Mobil($connection);	

$id_mbl=$_POST['id_mbl'];
  $tampil1 = $mbl->ambek($id_mbl);
while ($mbl = mysqli_fetch_array($tampil1)){
  $tipe=$mbl['tipe_mbl'];
  $harga=$mbl['harga'];

}
?>
<div class="form-group">
	<label class="control-label">Tipe Mobil</label>
	<input type="text" id="tipe_mbl" class="form-control" name="tipe_mbl" value="<?php echo $tipe;?>">
</div>
<div class="form-group">
	<label class="control-label">Harga Mobil</label>
	<input type="text" id="harga" class="form-control" name="harga" value="<?php echo $harga;?>">
</div>
