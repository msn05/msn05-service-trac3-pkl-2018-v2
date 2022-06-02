
   <?php
   require_once('config/config.php');
	include "models/d_rental.php";
	include "models/d_servis.php";
	include "models/d_data_m.php";
	include "models/d_data_sp.php";
  require_once('models/database.php');

  $rental = new Oren($connection);
  $dataRental = $rental->tampilRental();
  $jumlahRental = $rental->count();

  $servis = new Servis($connection);
  $dataServis = $servis->tampilServis();
  $jumlahServis = $servis->count();

  $mobil = new Mobil($connection);
  $jumlahMobil = $mobil->count();

  $sparepart = new Sparepart($connection);
  $jumlahSparepart = $sparepart->count();



?>

        <div class="row">
          <div class="col-lg-12">
            <h1>Dashboard </h1>
            <ol class="breadcrumb">
              <marquee direction="left" scrollamount="2" align="center" behavior="alternate"><h1>Selamat Bekerja Sahabat TRAC ASTRA PALEMBANG</marquee></a>
              <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
          </div>
          
        </div><!-- /.row -->
     
        <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-car fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $jumlahMobil ?></div>
                                        <div>Mobil</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<!--                                         <i class="fa fa-tasks fa-5x"></i> -->
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $jumlahSparepart ?></div>
                                        <div>Jumlah Sparepart</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
<!--                                         <i class="fa fa-shopping-cart fa-5x"></i> -->
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $jumlahServis ?></div>
                                        <div>Servis</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $jumlahRental ?></div>
                                        <div>Rental</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             

             <div class="row">
             	<div class="col-lg-12">
             		<div class="panel panel-default">
             			<div class="panel-body">
             				<h3>Transaksi Order Rental</h3>
             				<table class="table table-bordered table-hover table-striped"  >
				<thead>
          <tr>
	        <th width="10">No.</th>
            <th>Kustomer</th>
        
            <th>Tipe Mobil</th>
            <th>Tanggal Dirental</th>
            <th>Tanggal Kembali</th>
            <th>Tgl Dikembalikan</th> 
            <th>Status</th>         
            </tr>
            </thead>
            <tbody>
            <?php 
            while ($d = mysqli_fetch_array($dataRental)) {
            	?>
		<tr>
			<td><?php echo $d['no_order'] ?></td>
			<td><?php echo $d['kustom_nama'] ?></td>
		       <td><?php echo $d['tipe_mobil']  ?></td>
			<td><?php echo date('d-m-Y ',strtotime($d['tgl_dirental'])) ?></td>
			<td><?php echo date('d-m-Y ',strtotime($d['tgl_kembali'])) ?></td>
			<td><?php echo $d['tgl_dikembalikan'] ?></td>
			<td><?php echo $d['status'] ?></td>
		</tr>
            	<?php
            }

             ?>
            </tbody>
            </table>


             			</div>
             		</div>
             	</div>
             </div>


             <div class="row">
             	<div class="col-lg-12">
             		<div class="panel panel-default">
             			<div class="panel-body">
             				<h3>Transaksi Order Servis</h3>
             				<table class="table table-bordered table-hover table-striped"  >
				<thead>
          <tr>
	        <th width="10">No.</th>
            <th>Kustomer</th>
        		<th>Total Bayar</th>
            <th>Tanggal Masuk</th>
            <th>Perkiraan Selesai</th> 
            <th>Status</th>         
            </tr>
            </thead>
            <tbody>
            <?php 
            while ($s = mysqli_fetch_array($dataServis)) {
            	?>
		<tr>
			<td><?php echo $s['id_servis'] ?></td>
			<td><?php echo $s['kustom_nama'] ?></td>
			<td><?php echo "Rp. ".number_format($s['total_bayar']) ?></td>
			<td><?php echo date('d-m-Y ',strtotime($s['tgl_masuk'])) ?></td>
			<td><?php echo date('d-m-Y ',strtotime($s['perkiraan_selesai'])) ?></td>
			<td><?php echo $s['status_os'] ?></td>
		</tr>
            	<?php
            }

             ?>
            </tbody>
            </table>


             			</div>
             		</div>
             	</div>
             </div>