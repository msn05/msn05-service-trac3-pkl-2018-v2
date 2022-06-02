  <?php
  include "models/d_mekanik.php";
	$mnk = new Mekanik($connection);
if (@$_GET['act'] == '') {
  
    
	?>
     <div class="page-header">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Mekanik</h1>
            <ol class="breadcrumb">
                            <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
                                        <?php if ($_SESSION['level'] ==1): ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Mekanik</button>
            <?php endif ?>
              </div>  
          </div>
        </div><!-- /.row -->



           <div class="table-responsive">
       <table class="table table-bordered table-hover table-striped" id="datatables" >
      
          <thead>
          <tr>
	            <th width="10">No</th>
            <th>Nama Mekanik / Team</th>
            <th>Nomor Telephone</th>
              
            <th>Alamat</th>
             
              <?php if ($_SESSION['level'] ==1): ?>
            <th>Opsi</th>
          <?php endif ?>
           </tr>     
        </thead>
        <tbody> 
	       <?php 
         $no = 1;
         $tampil = $mnk->tampil();
         while($data = $tampil->fetch_object()){


      
        ?>
   		<tr> 
   		<td align="center"><?php echo $no++; ?></td>
   		<td align="center"><?php echo $data->nama_mnk; ?></td>
      <td align="center"><?php echo $data->no_telephone; ?></td>
      <td align="center"><?php echo $data->alamat_mnk; ?></td>

              <?php if ($_SESSION['level'] ==1): ?>
   		<td align="center">

      <a id="edit_mnk" data-toggle="modal" data-target="#edit" 
      data-id_mnk="<?php echo $data->id_mnk;?>" 
      data-nama_mnk="<?php echo $data->nama_mnk;?>"
       data-no_telephone="<?php echo $data->no_telephone;?>"
       data-alamat_mnk="<?php echo $data->alamat_mnk;?>">
       <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </button></a>
       <a href="?page=mekanik&act=del&id=<?php echo $data->id_mnk;?>" onclick=" return confirm('yakin akan menghapus data ini?')">
       <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button> 
      </td>
<?php endif ?>
              
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
                      <h4 align="center" class="modal-title">Edit Mekanik</h4>
                  </div>
                  <form id="form" enctype="multipart/form-data">
                  <div class="modal-body" id="modal-edit">
                    <div class="form-group">
                      <label class="control-label" for="nama_mnk">Nama Mekanik / Team</label>
                      <input type="hidden" name="id_mnk" id="id_mnk">
                      <input type="text" name="nama_mnk" class="form-control" id="nama_mnk" required="">
                    </div>
                    <div class="form-group">
                <label class="control-label" for="no_telephone">Nomor Telephone</label>
                      <input type="text" name="no_telephone" class="form-control" id="no_telephone" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="alamat_mnk">Alamat</label>
                      <input type="text" name="alamat_mnk" class="form-control" id="alamat_mnk" required="">                    </div>
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
          $(document).on("click", "#edit_mnk", function(){
            var id_mnk = $(this).data('id_mnk');
            var nama_mnk = $(this).data('nama_mnk');
            var no_telephone = $(this).data('no_telephone');
            var alamat_mnk = $(this).data('alamat_mnk');
              $(" #modal-edit #id_mnk").val(id_mnk);  
            $(" #modal-edit #nama_mnk").val(nama_mnk);
            $(" #modal-edit #no_telephone").val(no_telephone);
            $(" #modal-edit #alamat_mnk").val(alamat_mnk);
              })
                $(document).ready(function(e){
                  $("#form").on("submit", (function(e){
                    e.preventDefault();
                    $.ajax({
                      url : 'models/proses_edit_mekanik.php',
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
                      <h4 class="modal-title" align="center" > Tambah Mekanik</h4>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label" for="nama_mnk">Nama Mekanik / Team</label>
                      <input type="text" name="nama_mnk" class="form-control" id="nama_mnk" required="">
                    </div>
                    <div class="form-group">
                <label class="control-label" for="no_telephone">Nomor Telephone</label>
                      <input type="text" name="no_telephone" class="form-control" id="no_telephone" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="alamat_mnk">Alamat</label>
                      <input type="text" name="alamat_mnk" class="form-control" id="alamat_mnk" required="">                    </div>
                     
                      <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan"> 
                      </div>

              </form>
              <?php
              if (@$_POST['tambah']) {        
                $nama_mnk = $connection->conn->real_escape_string($_POST['nama_mnk']);
                $no_telephone = $connection->conn->real_escape_string($_POST['no_telephone']);
                $alamat_mnk = $connection->conn->real_escape_string($_POST['alamat_mnk']);
                $mnk->tambah($nama_mnk,$no_telephone,$alamat_mnk);
                  header("location: ?page=mekanik");
                
                
              }

              ?>
                </div>
          </div>
        </div>
        
</div>
  </div>
<?php
} else if (@$_GET['act'] == 'del') {
  $mnk->hapus($_GET['id']);
  header("location: ?page=mekanik");
}
?>


