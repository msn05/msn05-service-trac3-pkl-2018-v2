<?php
require_once('../config/config.php');
require_once('../models/database.php');
include "../models/d_kustomer.php";
$connection = new Database($host, $user, $pass, $database);
	$ktm = new Kustomer($connection);
$content ='
<style type="text/css">
 table {
            margin: auto;
        
            font-size: 12px;

        }
tr    { box-sizing: content-box; }

.style37 {
    font-size: 20px;
    font-weight: bold;
}
.style38 {font-size: 12px}
.style14 {font-size: 10px}
-->
</style>

';
$content .= '
	<page>
	 <bookmark title="Lettre" level="0" ></bookmark>
	 <table style="width: 100%; text-align: center; font-size: 14px">
	 	 <tr>
          <td style="width:7%" rowspan="4"><img src="../img/lp.png" alt="Logo" width="90" height="80"></td>
          <td style="width:93%"> </td>
        </tr>
	 <tr>
          <td class="style37">SISTEM APLIKASI PENGOLAHAN DATA ORDER</td>
        </tr>
         <tr>
          <td class="style38">Jl. Soekarno Hatta No.45, Siring Agung, Ilir Bar. I, Kota Palembang, Sumatera Selatan 30153</td>
        </tr>
          <tr>
          <td class="style38">Telp. (0711) 444999</td>
        </tr>
         <tr>
            <td colspan="2"><hr/></td>
        </tr>
</table>
 <h3 class="box-title center">Daftar Pegawai</h3>
        <span class="pull-right">
        Pekanbaru, "<?php" 
        </span>         

<table style="width: 100%;  font-size: 10pt;">
	 	   
       ';

         $no = 1;
         if (@$_GET['id'] != '') {
           $tampil = $ktm->tampil(@$_GET['id']);
         }else {
         $tampil = $ktm->tampil();
         }
         while($data = $tampil->fetch_object()){
         	$content .='
         			<tr> 
   	<tr>
                <th class="form-label" text-align="left"><p>Nama Kustomer</p></th>
                <td class="form-control" text-align="right">'.$data->kustom_nama.'</td>
              </tr>
<tr>
                <th class="form-label" text-align="left">Nomor KTP</th>
                <td class="form-control" text-align="right">'.$data->no_ktp.'</td>
              </tr>
              <tr>
                <th class="form-label" text-align="left">Alamat</th>
                <td class="form-control" text-align="right">'.$data->kustom_alamat.'</td>
              </tr>
<tr>
                <th class="form-label" text-align="left">Jenis Kelamin</th>
                <td class="form-control" text-align="right">'.$data->kustom_jk.'</td>
              </tr>
              <tr>
                <th class="form-label" text-align="left">Nomor Handphone</th>
                <td class="form-control" text-align="right">'.$data->kustom_hp.'</td>
              </tr>
<tr>
                <th class="form-label" text-align="left">Email</th>
                <td class="form-control" text-align="right">'.$data->kustom_email.'</td>
              </tr>
      
   		</tr>
         	';
         }
$content .='
	 </table>
	 	<nobreak><br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
           
        </table>
    </nobreak>
	</page>
';	

 require_once('../asset/html2pdf/html2pdf.class.php');
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
	    $html2pdf->writeHTML($content);
        $html2pdf->Output('exemple.pdf');

?>