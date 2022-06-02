  <?php
	include "models/d_kustomer.php";
ob_start();

  $ktm = new Kustomer($connection);

  if (@$_GET['act'] == '') {
    
	?>
     <div class="page-header">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Kustomer</h1>
            <ol class="breadcrumb">
                            <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
                            <?php if ($_SESSION['level'] ==1): ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Customers</button>

               <button type="button"  class="btn btn-print " i class="fa fa-print" data-toggle="modal" data-target="#printgalo">Cetak</button>
             <?php endif ?>
              </div>  
              </div>
              <div id="tambah" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Tambah Customers</h4>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="form-group">
                      <label class="control-label" for="kustom_nama">Nama Customers</label>
                      <input type="text" name="kustom_nama" class="form-control" id="kustom_nama" required="">
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="no_ktp">Nomor KTP</label>
                      <input type="number" name="no_ktp" class="form-control" id="no_ktp" required="">
                    </div>
                      <div class="form-group">
                <label class="control-label" for="kustom_alamat">Alamat</label>
                      <input type="text" name="kustom_alamat" class="form-control" id="kustom_alamat" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="kustom_jk">Jenis Kelamin</label>
                         <select name="kustom_jk" class="form-control">
                  <?php $options = array('Laki-Laki', 'Perempuan');
                   foreach ($options as $kustom_jk) {
               $selected = @$_POST['kustom_jk'] == $kustom_jk ? ' selected="selected"' : '';
                echo '<option value="' . $kustom_jk . '"' . $selected . '>' . $kustom_jk . '</option>';
                 }?>
              </select>                   </div>
              <div class="form-group">
                <label class="control-label" for="kustom_hp">No Handphone</label>
                      <input type="text" name="kustom_hp" class="form-control" id="kustom_hp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="kustom_email">Email</label>
                      <input type="text" name="kustom_email" class="form-control" id="kustom_email" required="">                    </div>
                      
                


                      <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan"> 
                      </div>

              </form>
              <?php
              if (@$_POST['tambah']) {  
      
                $kustom_nama = $connection->conn->real_escape_string($_POST['kustom_nama']);
                $no_ktp = $connection->conn->real_escape_string($_POST['no_ktp']);
                $kustom_alamat = $connection->conn->real_escape_string($_POST['kustom_alamat']);
                $kustom_jk = $connection->conn->real_escape_string($_POST['kustom_jk']);
                $kustom_hp = $connection->conn->real_escape_string($_POST['kustom_hp']);
                $kustom_email = $connection->conn->real_escape_string($_POST['kustom_email']);
              
        
                  $ktm->tambah($kode_kustom,$kustom_nama,$no_ktp,$kustom_alamat,$kustom_jk,$kustom_hp,$kustom_email);
                  header("location: ?page=kustomer");
                
                
              }

              ?>
            </div>
          </div>
        </div>
          </div>

        </div><!-- /.row -->


           <div class="table-responsive">
       <table class="table table-bordered table-hover table-striped" id="datatables" >
      
          <thead>
          <tr>
	            <th width="10">No</th>
            <th>Nama Kustomer</th>
            <th>No Ktp</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>No Handphone</th>
            <th>Email</th>
 
              <?php if ($_SESSION['level'] ==1): ?>
            <th>Opsi</th>
          <?php endif ?>
           </tr>     
        </thead>
        <tbody> 
	       <?php 
         $no = 1;
         $tampil = $ktm->tampil();
         while($data = $tampil->fetch_object()){


      
        ?>
   		<tr> 
   		<td align="center"><?php echo $no++; ?></td>
   		<td align="center"><?php echo $data->kustom_nama; ?></td>
      <td align="center"><?php echo $data->no_ktp; ?></td>
   		<td align="center"><?php echo $data->kustom_alamat; ?></td>
      <td align="center"><?php echo $data->kustom_jk; ?></td>
   		<td align="center"><?php echo $data->kustom_hp; ?></td>
   		<td align="center"><?php echo $data->kustom_email; ?></td>
              <?php if ($_SESSION['level'] ==1): ?>  
      <td align="center">     
       <a id="edit_ktm" data-toggle="modal" data-target="#edit" data-toggle="modal" 
            data-kustom_id="<?php echo $data->kustom_id;?>"
            data-kustom_nama="<?php echo $data->kustom_nama;?>"
             data-no_ktp="<?php echo $data->no_ktp;?>"
              data-kustom_alamat="<?php echo $data->kustom_alamat;?>"
               data-kustom_jk="<?php echo $data->kustom_jk;?>"
                data-kustom_hp="<?php echo $data->kustom_hp;?>"
                 data-kustom_email="<?php echo $data->kustom_hp;?>">
     <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit </button></a>
       <a href="?page=kustomer&act=del&id=<?php echo $data->kustom_id;?>" onclick=" return confirm('yakin akan menghapus data ini?')">
       <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button> 


         <a href="./report/print_id.php?id=<?=$data->kustom_id;?>" target="_blank">
        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-priny"></i>Print</button> 
        </a>
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
                      <h4 class="modal-title" align="center"> Edit Customers</h4>
                  </div>
                  <form id="form" enctype="multipart/form-data">
                  <div class="modal-body" id="modal-edit">
                    <div class="form-group">
                      <label class="control-label" for="kustom_nama">Nama Customers</label>
                      <input type="hidden" name="kustom_id" id="kustom_id">
                      <input type="text" name="kustom_nama" class="form-control" id="kustom_nama" required="">
                    </div>

                     <div class="form-group">
                      <label class="control-label" for="no_ktp">Nomor KTP</label>
                      <input type="number" name="no_ktp" class="form-control" id="no_ktp" required="">
                    </div>
                    <div class="form-group">
                <label class="control-label" for="kustom_alamat">Alamat</label>
                      <input type="text" name="kustom_alamat" class="form-control" id="kustom_alamat" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="kustom_jk">Jenis Kelamin</label>
                         <select name="kustom_jk" class="form-control">
                  <?php $options = array('Laki-Laki', 'Perempuan');
                   foreach ($options as $kustom_jk) {
               $selected = @$_POST['kustom_jk'] == $kustom_jk ? ' selected="selected"' : '';
                echo '<option value="' . $kustom_jk . '"' . $selected . '>' . $kustom_jk . '</option>';
                 }?>
              </select>                   </div>
              </div>
              <div class="form-group">
                <label class="control-label" for="kustom_hp">No Handphone</label>
                      <input type="text" name="kustom_hp" class="form-control" id="kustom_hp" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="kustom_email">Email</label>
                      <input type="text" name="kustom_email" class="form-control" id="kustom_email" required="">                    </div>         
                 <div class="modal-footer">
                        <input type="submit" class="btn btn-success" name="edit" value="Simpan"> 
                      </div>
              </form>
              

            </div>
          </div>
        </div>
         <script src="asset/js/jquery-1.10.2.js"></script>
         <script type="text/javascript">
          $(document).on("click", "#edit_ktm", function(){
            var kustom_id = $(this).data('kustom_id');
            var kustom_nama = $(this).data('kustom_nama');
            var no_ktp = $(this).data('no_ktp');
            var kustom_alamat = $(this).data('kustom_alamat');
            var kustom_jk = $(this).data('kustom_jk');
            var kustom_hp = $(this).data('kustom_hp');
              var kustom_email = $(this).data('kustom_email');
            $(" #modal-edit #kustom_id").val(kustom_id);  
            $(" #modal-edit #kustom_nama").val(kustom_nama);
            $(" #modal-edit #no_ktp").val(no_ktp);
            $(" #modal-edit #kustom_alamat").val(kustom_alamat);
            $(" #modal-edit #kustom_jk").val(kustom_jk);
            $(" #modal-edit #kustom_hp").val(kustom_hp);
            $(" #modal-edit #kustom_email").val(kustom_email);
            
          })
                $(document).ready(function(e){
                  $("#form").on("submit", (function(e){
                    e.preventDefault();
                    $.ajax({
                      url : 'models/proses_edit_kustomer.php',
                      type  :'POST',
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
</div>
<?php
} else if (@$_GET['act'] == 'del') {
  $ktm->hapus($_GET['id']);
  header("location: ?page=kustomer");
}
?>
 <div id="printgalo" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Cetak PDF</h4>
                  </div>
                  
                  <div class="modal-body">
                      Cetak Data Kustomer
                   </div>
                      
                


                      <div class="modal-footer">
                            <a href="./report/print_kustomer.php" target="_blank" class="btn btn-primary btn-sm">Cetak Semua Data</a>
                      </div>

         
             
            </div>
          </div>
        </div>
          </div>
          
        </div><!-- /.row -->
