
   <?php
   require_once('config/config.php');
	include "models/d_data_m.php";
  require_once('models/database.php');
 

//require 'asset/PHPExcel/Classes/PHPExcel.php';
	$mbl = new Mobil($connection);
  
	if (@$_GET['act'] == '') {
	

	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <div class="page-header">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Mobil</h1>
             <ol class="breadcrumb">
          
              <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
                            <?php if ($_SESSION['level'] ==1): ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#import">Import Data</button>
                              
                             <button type="button" class="btn btn-default" data-toggle="modal" data-target="#printga">Cetak</button>
                            <?php endif ?>
                             <div id="printga" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Cetak PDF</h4>
                  </div>
                  
                  <div class="modal-body">
                      Cetak Data Mobil
                   </div>
                      
                


                      <div class="modal-footer">
                            <a href="./report/print_gm.php" target="_blank" class="btn btn-primary btn-sm">Cetak Semua Data</a>
                      </div>

         
             
            </div>
          </div>
        </div>
          </div>

              </div>

        </div><!-- /.row -->


     <div class="row">
     	<div class="col-lg-12">
			<div class="table-responsive-">
				<table class="table table-bordered table-hover table-striped" id="datatables" >
				<thead>
          <tr>
	        <th width="10">No.</th>
            <th>Tanggal</th>
        
            <th>No Polisi</th>
            <th>Brand</th>
            <th>Tipe Mobil</th>
            <th>Model Mobil</th> 
            <th>Harga</th>
            <th>Tanggal Masuk</th>         
            <th>Lokasi Mobil</th>
            <th>Status</th>
                          <?php if ($_SESSION['level'] ==1): ?>
            <th>Opsi</th>
          <?php endif ?>
            </tr>
            </thead>
            <tbody>
            <?php 
  			$no = 1;
			$tampil = $mbl->tampil();
			while($data = $tampil->fetch_object()){
			
				?>
   		<tr> 
   		<td align="center"><?php echo $no++; ?></td>
         <td align="center"><?php echo date('d-m-Y H:i:s',strtotime($data->tanggal)); ?></td>
   	
   		<td align="center"><?php echo $data->no_polisi; ?></td>
   		<td align="center"><?php echo $data->brand; ?></td>
   		<td align="center"><?php echo $data->tipe_mbl; ?></td>
   		<td align="center"><?php echo $data->model_mbl; ?></td>

      <td align="center"><?php echo "Rp. ".number_format($data->harga); ?></td>
     	<td align="center"><?php echo date('d/m/Y',strtotime($data->tgl_masuk)); ?></td>
     		<td align="center"><?php echo $data->lokasi_mbl; ?></td>
        <td align="center"><?php 
      if($data->status == "1"){
            echo "Tersedia";
          }else if($data->status == "2"){
            echo "Sedang Di Rental";
          }
          ?>    </td>
                        <?php if ($_SESSION['level'] ==1): ?>
        <td align="center"> 
       		  <a id="edit_mbl" data-toggle="modal" data-target="#edit" data-toggle="modal" 
            data-id_mbl="<?php echo $data->id_mbl;?>"
         
             data-no_polisi="<?php echo $data->no_polisi;?>"
              data-brand="<?php echo $data->brand;?>"
               data-tipe_mbl="<?php echo $data->tipe_mbl;?>"
                data-model_mbl="<?php echo $data->model_mbl;?>"
                 data-harga="<?php echo $data->harga;?>"
                 data-tgl_masuk="<?php echo $data->tgl_masuk;?>"
                   data-lokasi_mbl="<?php echo $data->lokasi_mbl;?>"
                    data-status="<?php echo $data->status;?>">
        		<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </button></a>
        			<a href="?page=data_mobil&act=del&id=<?php echo $data->id_mbl;?>" onclick=" return confirm('yakin akan menghapus data ini?')">
      					<button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button></a>
					</td>
        <?php endif ?>
                </tr>
          <?php
      }
          ?>
            </tbody>         
        </table>

          <div id="edit" class="modal fade" role="dialog">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            					<h4 align="center" class="modal-title">Edit Mobil</h4>
            			</div>
            			<form id="form" enctype="multipart/form-data">
            			<div class="modal-body" id="modal-edit">
               
            				<div class="form-group">

								<label class="control-label" for="no_polisi">Nomor Polisi</label>
                <input type="hidden" name="id_mbl" id="id_mbl">
            					<input type="text" name="no_polisi" class="form-control" id="no_polisi" required="">            				</div>
            					<div class="form-group">
								<label class="control-label" for="brand">Brand</label>
            					<input type="text" name="brand" class="form-control" id="brand" required="">            				</div>
            					<div class="form-group">
								<label class="control-label" for="tipe_mbl">Tipe Mobil</label>
            					<input type="text" name="tipe_mbl" class="form-control" id="tipe_mbl" required="">            				</div>
            					<div class="form-group">
								<label class="control-label" for="model_mbl">Model Mobil</label>
            					<input type="text" name="model_mbl" class="form-control" id="model_mbl" required="">            				</div>
                      <div class="form-group">
                <label class="control-label" for="harga">Harga</label>
                      <input type="text" name="harga" class="form-control" id="harga" required="">                    </div>
            					<div class="form-group">
								<label class="control-label" for="tgl_masuk">Tanggal Masuk</label>
            					<input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" >     </div>
            					<div class="form-group">
								<label class="control-label" for="lokasi_mbl">Lokasi Mobil</label>
            					<input type="text" name="lokasi_mbl" class="form-control" id="lokasi_mbl" required="">            				</div>
                
                      <div class="form-group">
                <label class="control-label" for="status">Status</label>
                      <select type="text" name="status" class="form-control" id="status" >

                        <option value="1">Tersedia</option>
                            <option value="2">Di Rental</option>
                                </select>
                        </div>
                     </div>            					
								


            					<div class="modal-footer">
            						 <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
            						<input type="submit" class="btn btn-success" name="edit" value="Simpan"> 
            					</div>

                    </div>
                </div>
        </div>
        </form>
        </div>
 			 <script src="asset/js/jquery-1.10.2.js"></script>
				 <script type="text/javascript">
				 	$(document).on("click", "#edit_mbl", function(){
				 		var id_mbl = $(this).data('id_mbl');
				
				 		var no_polisi = $(this).data('no_polisi');
				 		var brand = $(this).data('brand');
				 		var tipe_mbl = $(this).data('tipe_mbl');
				 		var model_mbl = $(this).data('model_mbl');
            var harga = $(this).data('harga');
							var tgl_masuk = $(this).data('tgl_masuk');
              	 		var lokasi_mbl = $(this).data('lokasi_mbl');
				 		var status = $(this).data('status');
				 		$(" #modal-edit #id_mbl").val(id_mbl);	
				 		$(" #modal-edit #no_polisi").val(no_polisi);
				 		$(" #modal-edit #brand").val(brand);
				 		$(" #modal-edit #tipe_mbl").val(tipe_mbl);
				 		$(" #modal-edit #model_mbl").val(model_mbl);
				      $(" #modal-edit #harga").val(harga);
          
            $(" #modal-edit #tgl_masuk").val(tgl_masuk);
				 		$(" #modal-edit #lokasi_mbl").val(lokasi_mbl);
				 		$(" #modal-edit #status").val(status);
				 		
				 	})
								$(document).ready(function(e){
                  $("#form").on("submit", (function(e){
                    e.preventDefault();
                    $.ajax({
                      url : 'models/proses_edit_mobil.php',
                      type  : 'POST',
                      data  : new FormData(this),
                      contentType  : false,
                      cache : false,
                      processData : false,
                      success : function(msg){
                        $('.table').html(msg);
                      }
                    });
                  }));
                })			

				 </script>    
</div>
</div>

   <div id="tambah" class="modal fade" role="dialog">
            	<div class="modal-dialog">
            		<div class="modal-content">
            			<div class="modal-header">
            				<button type="button" class="close" data-dismiss="modal">&times;</button>
            					<h4 class="modal-title"> Tambah Mobil</h4>
            			</div>
            			<form action="" method="post" enctype="multipart/form-data">
            			<div class="modal-body">
            			
            				<div class="form-group">
								<label class="control-label" for="no_polisi">Nomor Polisi</label>
            					<input type="text" name="no_polisi" class="form-control" id="no_polisi" required="">            				</div>
            					<div class="form-group">
								<label class="control-label" for="brand">Brand</label>
            					<input type="text" name="brand" class="form-control" id="brand" required="">            				</div>
            					<div class="form-group">
								<label class="control-label" for="tipe_mbl">Tipe Mobil</label>
            					<input type="text" name="tipe_mbl" class="form-control" id="tipe_mbl" required="">            				</div>
            					<div class="form-group">
								<label class="control-label" for="model_mbl">Model Mobil</label>
            					<input type="text" name="model_mbl" class="form-control" id="model_mbl" required="">            				</div>
                      <div class="form-group">
                <label class="control-label" for="harga">Harga</label>
                      <input type="text" name="harga" class="form-control" id="harga" required="">                    </div>
            					<div class="form-group">
								<label class="control-label" for="tgl_masuk">Tanggal Masuk</label>
            					<input type="date" name="tgl_masuk" class="form-control" id="tgl_masuk" >     </div>
            					<div class="form-group">
								<label class="control-label" for="lokasi_mbl">Lokasi Mobil</label>
            					<input type="text" name="lokasi_mbl" class="form-control" id="lokasi_mbl" required="">            				</div>
                            <div class="form-group">
                <label class="control-label" for="status">Status</label>
                      <select type="text" name="status" class="form-control" id="status" >

                        <option value="1">Tersedia</option>
                            <option value="2">Di Rental</option>
                                </select>
                        
                     </div>                     
                

								


            					<div class="modal-footer">
            						<button type="reset" class="btn btn-danger">Reset</button>
            						<input type="submit" class="btn btn-success" name="tambah" value="Simpan"> 
            					</div>

							</form>
							<?php
							if (@$_POST['tambah']) {
                  $tanggal = date("Y-m-d H:i:s");  				
							
								$no_polisi = $connection->conn->real_escape_string($_POST['no_polisi']);
								$brand = $connection->conn->real_escape_string($_POST['brand']);
								$tipe_mbl = $connection->conn->real_escape_string($_POST['tipe_mbl']);
								$model_mbl = $connection->conn->real_escape_string($_POST['model_mbl']);
                $harga = $connection->conn->real_escape_string($_POST['harga']);
								$tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
								$lokasi_mbl = $connection->conn->real_escape_string($_POST['lokasi_mbl']);
								$status = $connection->conn->real_escape_string($_POST['status']);

				
									$mbl->tambah($tanggal,$no_polisi,$brand,$tipe_mbl,$model_mbl,$harga,$tgl_masuk,$lokasi_mbl,$status);
									header("location: ?page=data_mobil");
								
								
							}

							?>

						</div>
					</div>
				</div>
            
			</div>
		</div>

<div id="import" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Import Mobil</h4>
                  </div>
                  <form action="models/proses.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">                      <div class="form-group">
                <label class="control-label" for="file">Pilih File</label>
                      <input type="file" name="file" class="form-control" id="file" required="">                    </div>
   <div class="modal-footer">

                        <input type="submit" class="btn btn-success" name="import" value="import">
                      </div>
                      </div>
                      </form>
                      </div>

                      </div>


<?php
} else if (@$_GET['act'] == 'del') {
	$mbl->hapus($_GET['id']);
	header("location: ?page=data_mobil");
}
?>


