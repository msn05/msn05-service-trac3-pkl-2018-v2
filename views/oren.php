   <?php
   // error_reporting(0);
  include "models/d_rental.php";
  include "models/d_kustomer.php";
  include "models/d_data_m.php";
  include "models/d_password.php";

  
  $or = new Oren($connection);
  $ktm = new Kustomer($connection);
  $mbl = new Mobil($connection);
  $user = new Password($connection);

  $tampil = $or->dataRental();
  ?>
  <div class="page-header">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Order Rental</h1>
             <ol class="breadcrumb">
          
              <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
                                        <?php if ($_SESSION['level'] ==1): ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
            <?php endif ?>
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
            <th>Nomor Order</th>
     
            <th>Nama Karyawan</th>
            <th>Nama Kustomer</th>
            <th>Alamat</th>
            <th>Email </th>      
            <th>Nomor Polisi</th>
            <th>Brand</th>
            <th>Tipe Mobil</th>
            <th>Harga / Hari</th>
            <th>Tanggal Dirental</th>
            <th>Tanggal Kembali</th>
            <th>Denda / Hari</th>
                        <th>Tanggal Dikembalikan</th>
                        <th>Denda Lain lain</th>
                        <th>Total Denda</th>
                        <th>Total</th>
            <th>Status</th>
           <?php if ($_SESSION['level'] ==1): ?>
            <th>Opsi</th>
              <?php endif ?>

            </tr>

            </thead>
            <tbody>
<?php 
$no=1;while ($d = mysqli_fetch_array($tampil)) {
?>
      
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d['order_no'] ?></td>
        <td><?php echo $d['nama_karyawan']  ?></td>
        <td><?php echo $d['nama_kustomer']  ?></td>
        <td><?php echo $d['alamat']  ?></td>
        <td><?php echo $d['email']  ?></td>
        <td><?php echo $d['no_polisi']  ?></td>
        <td><?php echo $d['brand']  ?></td>
        <td><?php echo $d['tipe']  ?></td>
        <td><?php echo "Rp. ".number_format($d['harga'])  ?></td>
         <td><?php echo date('d-m-Y ',strtotime($d['tgl_dirental']))  ?></td>
        <td><?php echo date('d-m-Y ',strtotime($d['tgl_kembali']))  ?></td>
        <td><?php echo "Rp. ".number_format($d['denda'])  ?></td>
         <td><?php echo date('d-m-Y', strtotime($d['tgl_dikembalikan']));  ?></td>
        <td><?php echo "Rp. ".number_format($d['denda_lain'])  ?></td>
        <td><?php echo "Rp. ".number_format($d['total_denda'])  ?></td>
        <td><?php echo "Rp. ".number_format($d['total'])  ?></td>
        <td><?php echo $d['status']  ?></td>     
            <?php if ($_SESSION['level'] ==1): ?>
           <td align="center">
           
               <button class="btn btn-success"><i class="fa fa-submit"></i>Selesaikan</button></a>
                
              <button class="btn btn-info btn-xs"><i class="fa fa-edit"></i>Hitung</button></a>
              <a href="?page=oren&aksi=batal&id=<?php echo $d['order_no'] ?>">
              <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Batalkan</button></a>
               <button type="button" class="btn btn-default btn-xs"><i class="fa fa-priny"></i>Print</button> 
        </a>
          </td>
          <?php endif ?>
      </tr>
      
<?php
} ?>

            
                    </tbody>
          </table>
           </div>
         
          </div>
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

                <label class="control-label" for="order_no">Nomor Orderan</label>
                <input type="hidden" name="id_rental" id="id_rental">
                      <input type="text" name="no_order" class="form-control" id="no_order" readonly="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="id_mobil">Nomor Polisi</label>
                      <input type="text" name="no_polisi" class="form-control" id="no_polisi" required="">                    </div>
                      <div class="form-group">
                <label class="control-label" for="tipe_mbl">Tanggal Dikembalikan</label>
                      <input type="date" name="tgl_dikembalikan" class="form-control" id="tgl_dikembalikan" required="">                    </div>
                      <div class="form-group">
                      <label class="control-label" for="total_denda">Total Denda</label>
                      <input type="text" name="total_denda" class="form-control" id="total_denda" required="" >
                    </div>
                 
                       <div class="form-group">
                <label class="control-label" for="total">Total</label>
                <input type="number" name="total" class="form-control" id="total">
                        
                     </div>    
                         <div class="form-group">
                <label class="control-label" for="status">Status</label>
                      <select type="text" name="status" class="form-control" id="status" >

                        <option value="1">Disewa</option>
                            <option value="2">Belum Dikembalikan</option>
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
<div id="tambah" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Tambah Transaksi</h4>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                 
                     <div class="form-group">
                      <label class="control-label" for="kustom_id">Nama Kustomer</label>
                      <select name="kustom_id" id="kustom_id"  class="form-control required">
                          <option value="">--Pilih--</option>
                            <?php
                                  $tampil = $ktm->tampil();
                                while ($ktm = mysqli_fetch_array($tampil)){
                                  echo '<option value="'.$ktm['kustom_id'].'">'.$ktm['kustom_nama'].'</option>';
                                }
                            ?>
                          </select>
                      </div>
                      
                         <div id="tampil"></div>
                         <div class="form-group">
  <label class="control-label">Nomor Polisi</label>
  <select name="id_mbl" id="id_mbl" class="form-control required">
      <option value="">--Pilih--</option>
        <?php
              $tampil = $mbl->tampil();
            while ($mbl = mysqli_fetch_array($tampil)){
              echo '<option value="'.$mbl['id_mbl'].'">'.$mbl['no_polisi'].'</option>';
            }
        ?>
      </select>
  </div>
                          <div id="tampil1"></div>
                             <div class="form-group">
                      <label class="control-label" for="tgl_dirental">Tanggal Rental</label>
                      <input type="date" name="tgl_dirental" class="form-control" id="tgl_dirental" required="" >
                    </div>
                          <div class="form-group">
                      <label class="control-label" for="tgl_kembali">Tanggal Kembali</label>
                      <input type="date" name="tgl_kembali" class="form-control" id="tgl_kembali" required="" 
                      >
                    </div>
                     <div class="form-group">
                      <label class="control-label" for="denda">Denda / Hari</label>
                      <input type="text" name="denda" class="form-control" id="denda" required="" >
                    </div>
                 

                  
                     <div class="form-group">
                <label class="control-label" for="status">Status</label>
                      <select type="text" name="status" class="form-control" id="status" >

                        <option value="Disewa">Disewa</option>
                            <option value="Belum Dikembalikan">Belum Dikembalikan</option>
                                </select>
                        
                     </div>     
                     <div class="form-group">
                <label class="control-label" for="total">Total</label>
                <input type="number" name="total" class="form-control" id="total">
                        
                     </div>        
                      </div>


                      <div class="modal-footer">
                        <button type="reset" class="btn btn-danger">Reset</button>
                        <input type="submit" class="btn btn-success" name="tambah" value="Simpan"> 
                      </div>



<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<script type="text/javascript">

  $(document).ready(function(){
    $('#kustom_id').change(function(){
      var kustom = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'views/carik.php',
        data: 'kustom_id='+kustom,
        success:function(msg){
          $("#tampil").html(msg);                  
        }
      });
     
    });
     $("#total").keyup(function(){
      var val = $(this).val();
       var harga = $("#harga").val();
      $("#total").val(total);

    });

    $('#id_mbl').change(function(){
      var tbl_mobil = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'views/carim.php',
        data: 'id_mbl='+tbl_mobil,
        success:function(msg){
          $("#tampil1").html(msg);                  
        }
      });
    });
  });
</script>


<?php 
if (@$_POST['tambah']) {        
$kustom_id = $connection->conn->real_escape_string($_POST['kustom_id']);
$harga = $connection->conn->real_escape_string($_POST['harga']);

$id_mbl = $connection->conn->real_escape_string($_POST['id_mbl']);

$tgl_kembali = $connection->conn->real_escape_string($_POST['tgl_kembali']);
$tgl_dirental = $connection->conn->real_escape_string($_POST['tgl_dirental']);
$denda = $connection->conn->real_escape_string($_POST['denda']);
$status = $connection->conn->real_escape_string($_POST['status']);
$total = $connection->conn->real_escape_string($_POST['total']);

$alamat = $connection->conn->real_escape_string($_POST['kustom_alamat']);
$email = $connection->conn->real_escape_string($_POST['kustom_email']);


$tipe = $connection->conn->real_escape_string($_POST['tipe_mbl']);
$model = $connection->conn->real_escape_string($_POST['model']);

// tampilkan username session
$username = $_SESSION['admin'];

$id_karyawan = $user->tampilId($username)->fetch_object()->id;

$or->tambah($id_karyawan,$id_mbl , $kustom_id,$harga, $tgl_dirental, $denda, $tgl_kembali, 0,$status,$total,$alamat,$email,$tipe,$model);


header("location: ?page=oren");
//      header("location: ?page=mekanik");
                
  }        
          if (@$_GET['aksi']=='batal') {
  # code...
  $id = @$_GET['id'];
  $or->batalkan($id);
  header("location: ?page=oren");

  
      
}

?>