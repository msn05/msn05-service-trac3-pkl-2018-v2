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
td    {  webkit-box-sizing: content-box; }
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
<p>Laporan Data Kustomer </p>
<table cellspacing="2" style="width: 100%; border: 2px solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;">
	 	   <tr>
            <th style="width: 5%; text-align: left">No</th>
            <th style="width: 19%; text-align: left"><span style="width: 16%; text-align: left">Nama Kustomer</span></th>
            <th style="width: 15%; text-align: left">No KTP</th>
            <th style="width: 15%; text-align: left"><span style="width: 24%; text-align: left">Alamat</span></th>
            <th style="width: 10%; text-align: left"><span style="width: 10%; text-align: left">Jenis Kelamin</span></th>
             <th style="width: 16%; text-align: left"><span style="width: 10%; text-align: left">No Handphone</span></th>
            <th style="width: 20%; text-align: left"><span style="width: 16%; text-align: left"> Email</span></th>
        </tr>';

         $no = 1;
         if (@$_GET['id'] != '') {
           $tampil = $ktm->tampil(@$_GET['id']);
         }else {
         $tampil = $ktm->tampil();
         }
         while($data = $tampil->fetch_object()){
         	$content .='
         			<tr> 
   		<td text-align: left">'.$no++.'.</td>
   		<td style="width: 19%; text-align: left">'.$data->kustom_nama.'</td>
      <td style="width: 15%; text-align: left">'.$data->no_ktp.'</td>
   		<td style="width: 15%; text-align: left">'.$data->kustom_alamat.'</td>
      <td style="width: 10%; text-align: left">'.$data->kustom_jk.'</td>
   		<td style="width: 16%; text-align: left">'.$data->kustom_hp.'</td>
   		<td style="width: 20%; text-align: left">'.$data->kustom_email.'</td>
   		</tr>
         	';
         }
$content .='
	 </table>
	 	<nobreak><br>
        <table cellspacing="0" style="width: 100%; text-align: left;">
            <tr>
                <td style="width:65%;"></td>
              <td style="width:35%; ">
                    <p>Palembang, <br>
                        Admin Regional </p>
                    <p>&nbsp;</p>
                    Harry <br />
                        <hr/>
                      NIP. 
                                 </td>
            </tr>
        </table>
    </nobreak>
	</page>
';	

 require_once('../asset/html2pdf/html2pdf.class.php');
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
	    $html2pdf->writeHTML($content);
        $html2pdf->Output('exemple.pdf');

?>