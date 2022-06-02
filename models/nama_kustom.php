<?php
require_once('../models/database.php');
include "config/config.php";

$kustom_nama 		= $_GET['kustom_nama'];
if (mysqli_num_rows($result) > 0)
{  		echo "Belum ada data";
	}
?>