   <?php
  include "models/d_data_sp.php";

  $sp = new Sparepart($connection);
  if (@$_GET['act'] == '') {
    
  ?>

     <div class="page-header">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Spare Part</h1>
             <ol class="breadcrumb">
              <li></i>Data Spare Part di Perusahaan</a></li>
              <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
                                        <?php if ($_SESSION['level'] ==1): ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
            <?php endif ?>
              </div> 	
              </div>
              </div>
              <div id="tambah" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Tambah Spare Part</h4>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label" for="kode_sp">Kode Spare Part</label>
                      <input type="text" name="kode_sp" class="form-control" id="kode_sp" required="">
                    </div>
                    <div class="form-group">
                <label class="control-label" for="nama_sp">Nama Spare Part</label>
                      <input type="text" name="nama_sp" class="form-control" id="nama_sp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="brand_sp">Brand</label>
                      <input type="text" name="brand_sp" class="form-control" id="brand_sp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="tipe_sp">Tipe Spare Part</label>
                      <input type="text" name="tipe_sp" class="form-control" id="tipe_sp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="model_sp">Model Spare Part</label>
                      <input type="text" name="model_sp" class="form-control" id="model_sp" required="">                    </div>
                    <div class="form-group">
                <label class="control-label" for="jumlah_sp">Jumlah Spare Part</label>
                      <input type="number" name="jumlah_sp" class="form-control" id="jumlah_sp" required="">                    </div>
                        <div class="form-group">
                <label class="control-label" for="tgl_dtg">Tanggal Masuk</label>
                      <input type="date" name="tgl_dtg" class="form-control" id="tgl_dtg" required="">                    </div>
  <div class="form-group">
                <label class="control-label" for="harga">Harga</label>
                      <input type="text" name="harga" class="form-control" id="harga" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="status">Status</label>
                      <select type="text" name="status" class="form-control" id="status" >

                        <option value="1">Tersedia</option>
                            <option value="2">Habis</option>
                                </select>
                        
                      </select>                     </div>
                      
                


                      <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan"> 
                      </div>

              </form>
              <?php
              if (@$_POST['tambah']) {        
                $kode_sp = $connection->conn->real_escape_string($_POST['kode_sp']);
                $nama_sp = $connection->conn->real_escape_string($_POST['nama_sp']);
                $brand_sp = $connection->conn->real_escape_string($_POST['brand_sp']);
                $tipe_sp = $connection->conn->real_escape_string($_POST['tipe_sp']);
                $model_sp = $connection->conn->real_escape_string($_POST['model_sp']);
                      $tgl_dtg = $connection->conn->real_escape_string($_POST['tgl_dtg']);
                $jumlah_sp = $connection->conn->real_escape_string($_POST['jumlah_sp']);
                    $harga = $connection->conn->real_escape_string($_POST['harga']);
                $status = $connection->conn->real_escape_string($_POST['status']);

        
                  $sp->tambah($kode_sp,$nama_sp,$brand_sp,$tipe_sp,$model_sp,$tgl_dtg,$jumlah_sp,$harga,$status);
                  header("location: ?page=data_sp");
                
  
              }
              ?>
            

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
            <th>Kode Spare Part</th>
            <th>Nama Spare Part</th>
            <th>Brand</th>
            <th>Tipe Spare Part</th>
                      
            <th>Model Spare Part</th>
            <th>Tanggal Masuk</th>
            <th>Jumlah</th>
          
            <th>Harga / Unit</th>
     
            <th>Status</th>
             <?php if ($_SESSION['level'] ==1): ?>
            <th>Opsi</th>
             <?php endif ?>
            </tr>
            </thead>
            <tbody>
            <?php

  			$no = 1;
			$tampil = $sp->tampil();
			while($data = $tampil->fetch_object()){
    
				?>
   		<tr> 
   		<td align="center"><?php echo $no++; ?></td>
   		<td align="center"><?php echo $data->kode_sp; ?></td>
   		<td align="center"><?php echo $data->nama_sp; ?></td>
   		<td align="center"><?php echo $data->brand_sp; ?></td>
   		<td align="center"><?php echo $data->tipe_sp; ?></td>
   		<td align="center"><?php echo $data->model_sp; ?></td>
      <td align="center"><?php echo date('d/m/Y',strtotime($data->tgl_dtg)); ?></td>
   		<td align="center"><?php echo $data->jumlah_sp; ?> Unit</td>
     
      
        <td align="right"><?php echo "Rp. ".number_format($data->harga);?></td>   
   		<td align="center"><?php 
      if($data->status == "1"){
            echo "Tersedia";
          }else if($data->status == "2"){
            echo "Habis";
          }
          ?>    </td>
                        <?php if ($_SESSION['level'] ==1): ?>
        <td align="center"> 
                    <a id="edit_sp" data-toggle="modal" data-target="#edit" data-toggle="modal"
          data-id_sp="<?php echo $data->id_sp;?>" 
          data-kode_sp="<?php echo $data->kode_sp;?>" 
          data-nama_sp="<?php echo $data->nama_sp;?>" 
          data-brand_sp="<?php echo $data->brand_sp;?>" 
          data-tipe_sp="<?php echo $data->tipe_sp;?>" 
          data-model_sp="<?php echo $data->model_sp;?>" 
          data-tgl_dtg="<?php echo $data->tgl_dtg;?>" 
          data-jumlah_sp="<?php echo $data->jumlah_sp;?>" 
        
            data-harga="<?php echo $data->harga;?>"
            data-sisa="<?php echo $data->sisa;?>" 
         
        
              data-status="<?php echo $data->status;?>" >

        		<button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </button></a>
        			<a href="?page=data_sp&act=del&id=<?php echo $data->id_sp;?>" onclick=" return confirm('yakin akan menghapus data ini?')">
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
                      <h4 class="modal-title" align="center"> Edit SparePart</h4>
                  </div>
                  <form id="form" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edit">
                    <div class="form-group">
                      <label class="control-label" for="kode_sp">Kode Spare Part</label>
                      <input type="hidden" name="id_sp" id="id_sp">
                      <input type="text" name="kode_sp" class="form-control" id="kode_sp" required="">
                    </div>
                    <div class="form-group">
                <label class="control-label" for="nama_sp">Nama Spare Part</label>
                      <input type="text" name="nama_sp" class="form-control" id="nama_sp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="brand_sp">Brand</label>
                      <input type="text" name="brand_sp" class="form-control" id="brand_sp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="tipe_sp">Tipe Spare Part</label>
                      <input type="text" name="tipe_sp" class="form-control" id="tipe_sp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="model_sp">Model Spare Part</label>
                      <input type="text" name="model_sp" class="form-control" id="model_sp" required="">                    </div>
                    <div class="form-group">
                <label class="control-label" for="jumlah_sp">Jumlah Spare Part</label>
                      <input type="number" name="jumlah_sp" class="form-control" id="jumlah_sp" required="">                    </div>
                        <div class="form-group">
                <label class="control-label" for="tgl_dtg">Tanggal Masuk</label>
                      <input type="date" name="tgl_dtg" class="form-control" id="tgl_dtg" required="">                    </div>
  <div class="form-group">
                <label class="control-label" for="harga">Harga</label>
                      <input type="text" name="harga" class="form-control" id="harga" required="">                    </div>
                 
                      <div class="form-group">
                <label class="control-label" for="status">Status</label>
                      <select type="text" name="status" class="form-control" id="status" >

                        <option value="1">Tersedia</option>
                            <option value="2">Habis</option>
                                </select>
                        
                     </div>
                      
                


              </form>
                      <div class="modal-footer">
                                                 <button type="button" class="btn btn-warning" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancel</button>
                        <input type="submit" class="btn btn-success" name="edit" value="Simpan"> 
                      </div>

              </form>
              
            </div>
          </div>
        </div>
        <script src="asset/js/jquery-1.10.2.js"></script>
         <script type="text/javascript">
          $(document).on("click", "#edit_sp", function(){
            var id_sp = $(this).data('id_sp');
            var kode_sp = $(this).data('kode_sp');
            var nama_sp = $(this).data('nama_sp');
            var brand_sp = $(this).data('brand_sp');
            var tipe_sp = $(this).data('tipe_sp');
            var model_sp = $(this).data('model_sp');
           var tgl_dtg = $(this).data('tgl_dtg');
           var jumlah_sp = $(this).data('jumlah_sp');
                    var harga = $(this).data('harga');
           
                  
            var status = $(this).data('status');
            $(" #modal-edit #id_sp").val(id_sp);  
            $(" #modal-edit #kode_sp").val(kode_sp);
            $(" #modal-edit #nama_sp").val(nama_sp);
            $(" #modal-edit #brand_sp").val(brand_sp);
            $(" #modal-edit #tipe_sp").val(tipe_sp);
            $(" #modal-edit #model_sp").val(model_sp);
            $(" #modal-edit #tgl_dtg").val(tgl_dtg);
            $(" #modal-edit #jumlah_sp").val(jumlah_sp);
            $(" #modal-edit #harga").val(harga);
                    
            $(" #modal-edit #status").val(status);
            
          })
                $(document).ready(function(e){
                  $("#form").on("submit", (function(e){
                    e.preventDefault();
                    $.ajax({
                      url : 'models/proses_edit_sparepart.php',
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

<?php
} else if (@$_GET['act'] == 'del') {
	$sp->hapus($_GET['id']);
	header("location: ?page=data_sp");
}
?>



