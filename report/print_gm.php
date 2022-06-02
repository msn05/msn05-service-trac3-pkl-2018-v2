<?php
require_once('../config/config.php');
require_once('../models/database.php');
include "../models/d_data_m.php";
$connection = new Database($host, $user, $pass, $database);
	$mbl = new Mobil($connection);
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
<table cellspacing="2" style="width: 100%; border: 2px solid 1px black; background: #E7E7E7; text-align: center; font-size: 8pt;">
	 	   <tr>
            <th style="width: 5%; text-align: left">No</th>
               <th style="width: 10%; text-align: left"><span style="width: 24%; text-align: left">Tanggal</span></th>
          
               <th style="width: 10%; text-align: left"><span style="width: 24%; text-align: left">No Polisi</span></th>
            <th style="width: 10%; text-align: left"><span style="width: 24%; text-align: left">Brand</span></th>
            <th style="width: 10%; text-align: left"><span style="width: 10%; text-align: left">Tipe Mobil</span></th>

            <th style="width: 10%; text-align: left"><span style="width: 10%; text-align: left">model Mobil</span></th>
             <th style="width: 10%; text-align: left"><span style="width: 10%; text-align: left">Tanggal Masuk</span></th>
            <th style="width: 10%; text-align: left"><span style="width: 16%; text-align: left">Lokasi </span></th>
               <th style="width: 15%; text-align: left"><span style="width: 24%; text-align: left">Status</span></th>
        </tr>';

         $no = 1;
         if (@$_GET['id'] != '') {
           $tampil = $mbl->tampil(@$_GET['id']);
         }else {
         $tampil = $mbl->tampil();
         }
         while($data = $tampil->fetch_object()){
         	$content .='
         			<tr> 
  <td text-align: right">'.$no++.'.</td>
      <td style="width: 10%; text-align: left">'.$data->tanggal.'</td>
        <td style="width: 10%; text-align: left">'.$data->no_polisi.'</td>
             <td style="width: 10%; text-align: left">'.$data->brand.'</td>
                <td style="width: 10%; text-align: left">'.$data->tipe_mbl.'</td>
                   <td style="width: 10%; text-align: left">'.$data->model_mbl.'</td>
                      <td style="width: 10%; text-align: left">'.$data->tgl_masuk.'</td>
                         <td style="width: 10%; text-align: left">'.$data->lokasi_mbl.'</td>
                            <td style="width: 10%; text-align: left">'.$data->status.'</td>
          </tr>
         	';
         }
$content .='
	 </table>
	 	<nobreak><br>
        <table cellspacing="0" style="width: 100%; text-align: left;" bordered:3px">
            
        </table>
    </nobreak>
	</page>
';	

 require_once('../asset/html2pdf/html2pdf.class.php');
        $html2pdf = new HTML2PDF('P', 'A4', 'en');
	    $html2pdf->writeHTML($content);
        $html2pdf->Output('exemple.pdf');

?>