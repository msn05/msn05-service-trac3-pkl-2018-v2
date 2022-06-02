   <?php
   // error_reporting(0);
  include "models/d_servis.php";
  include "models/d_kustomer.php";
  include "models/d_data_m.php";
  include "models/d_password.php";
  include "models/d_data_sp.php";
  include "models/d_mekanik.php";

  
  $os = new Servis($connection);
  $ktm = new Kustomer($connection);
  $mbl = new Mobil($connection);
  $user = new Password($connection);
  $sparepart = new Sparepart($connection);
  $mekanik = new Mekanik($connection);

  $tampil = $os->dataServis();
  ?>


   <div class="page-header">
        <div class="row">
          <div class="col-lg-12">
            <h1>Data Order Servis</h1>
             <ol class="breadcrumb">
          
              <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
                            <?php if ($_SESSION['level'] ==1): ?>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah">Tambah Data</button>
            <?php endif ?>
              </div>  
              </div>  
              </div>

        </div><!-- /.row -->
  
      <div class="col-lg-12">
      <div class="table-responsive-">
        <table class="table table-bordered table-hover table-striped" id="datatables" >
          <thead>
          <tr>
          <th width="10">No.</th>
            <th>Nomor Order</th>
     		<th>Tanggal Masuk</th>
            <th>Nama Karyawan</th>
            <th>Nama Kustomer</th>
            <th>Alamat</th>
            <th>Email </th>      
            <th>Nama Spare Part</th>
            
            <th>Tipe Spare Part</th>
            <th>Model Spare Part</th>
            <th>Nama Mekanik</th>

            <th>Jumlah Barang</th>
            <th>Harga</th>
            <th>Perkiraan Selesai</th>
            <th>Total Bayar</th>
            <th>Status</th>
                <?php if ($_SESSION['level'] ==1): ?>
            <th>Opsi</th>
              <?php endif ?>
            </tr>

            </thead>
            <tbody>
            <?php 
            $no=1;
            while ($d = mysqli_fetch_object($tampil)) {
              ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $d->no_order ?></td>
              <td><?php echo date('d-m-Y ',strtotime($d->tgl_masuk)) ?></td>
              <td><?php echo $d->karyawan ?></td>
              <td><?php echo $d->kustomer ?></td>
              <td><?php echo $d->alamat ?></td>
              <td><?php echo $d->email ?></td>
              <td><?php echo $d->nama_sparepart ?></td>
              <td><?php echo $d->tipe_sparepart ?></td>
              <td><?php echo $d->model_sparepart ?></td>
              <td><?php echo $d->nama_mekanik ?></td>
              <td><?php echo $d->jumlah_barang ?></td>
              <td><?php echo "Rp. ".number_format($d->harga) ?></td>
              <td><?php echo date('d-m-Y ',strtotime($d->perkiraan_selesai)) ?></td>
              <td><?php echo "Rp. ".number_format($d->total_bayar) ?></td>
              <td><?php  echo $d->status  ?></td>
                <?php if ($_SESSION['level'] ==1): ?>
                <td align="center">

               <button class="btn btn-success"><i class="fa fa-submit"></i>Selesaikan</button>

              <button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Batalkan</button></a>
                
          </td>
          <?php endif ?>
            </tr>
              <?php
            }
             ?>


             
          </tbody>
          </table>
           </div>
         
          </div>
          </div>



<div id="tambah" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"> Tambah Transaksi</h4>
                  </div>
                  <form action="views/proses.php" method="post" enctype="multipart/form-data">
                  <div class="modal-body">
                 

                     <div class="form-group">
                      <label class="control-label" for="tanggal_masuk">Tangga Masuk</label>
                      <input type="date" name="tgl_masuk" class="form-control" id="tanggal_masuk" required="" >
                     </div>
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
                      <div id="tampil">
                        
                      </div>
                     <div class="form-group">
                      <label class="control-label" for="sparepart">Sparepart</label>
                        <select class="form-control" name="sparepart" id="sparepart">
                          <option value="">Piih Sparepart</option>
                          <?php 
                            $tampil_sp = $sparepart->tampil();

                            while ($s=mysqli_fetch_array($tampil_sp)) {

                                  echo '<option value="'.$s['id_sp'].'">'.$s['nama_sp'].'</option>';
                            }
                           ?>
                        </select>
                     </div>
                     <div id="tampil_s">
                       
                     </div>        
                     <div class="form-group">
                      <label class="control-label" for="mekanik">Mekanik</label>
                        <select class="form-control" name="mekanik" id="mekanik">
                          <option value="">Piih Mekanik</option>
                          <?php 
                            $tampil_m = $mekanik->tampil();

                            while ($m=mysqli_fetch_array($tampil_m)) {

                                  echo '<option value="'.$m['id_mnk'].'">'.$m['nama_mnk'].'</option>';
                            }
                           ?>
                        </select>
                     </div>        
                     <div id="tampil_m"></div>
                     <div class="form-group">
                      <label class="control-label" for="jumlah">Jumlah Barang</label>
                      <input type="text" name="jumlah" class="form-control" id="jumlah" required="" >
                     </div>        
                     <div class="form-group">
                      <label class="control-label" for="prakiraan">Perkiraan Selesai</label>
                      <input type="date" name="prakiraan" class="form-control" id="prakiraan" required="" >
                     </div>
                     <div class="form-group">
                      <label class="control-label" for="status">Status</label>
                        <select class="form-control" name="status" required>
                          <option value="">Pilih Status</option>
                        
                          <option value="Selesai">Selesai</option>
                            <option value="Belum Selesai">Belum Selesai</option>
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

</div>

<script src="asset/js/jquery-1.10.2.js"></script>
         <script type="text/javascript">
$(document).on("click", "#edit_servis", function(){
            var id_servis = $(this).d('id_servis');
        
            var no_order = $(this).d('no_order');
 $(" #modal-edit #id_servis").val(id_servis);  
                $(" #modal-edit #no_order").val(no_order);
                 })
                $(document).ready(function(e){
                  $("#form").on("submit", (function(e){
                    e.preventDefault();
                    $.ajax({
                      url : 'models/proses_edit_rental.php',
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
     
    })

    $('#sparepart').change(function(){
      var sparepart = $(this).val();
      $.ajax({
        type: 'POST',
        url: 'views/cari_sparepart.php',
        data: 'sparepart_id='+sparepart,
        success:function(msg){
          $("#tampil_s").html(msg);                  
        }
      });
     
    });

    $("#jumlah").keyup(function(){
      var val = $(this).val();
      var harga = $("#harga_sp").val();
      var total = val * harga;

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
$tgl_masuk = $connection->conn->real_escape_string($_POST['tgl_masuk']);
$kustom_id = $connection->conn->real_escape_string($_POST['kustom_id']);
$sparepart = $connection->conn->real_escape_string($_POST['sparepart']);
$mekanik = $connection->conn->real_escape_string($_POST['mekanik']);
$jumlah = $connection->conn->real_escape_string($_POST['jumlah']);
$harga = $connection->conn->real_escape_string($_POST['harga_sp']);
$status = $connection->conn->real_escape_string($_POST['status']);
$prakiraan = $connection->conn->real_escape_string($_POST['prakiraan']);
$total = $connection->conn->real_escape_string($_POST['total']);

$alamat = $connection->conn->real_escape_string($_POST['kustom_alamat']);
$email = $connection->conn->real_escape_string($_POST['kustom_email']);

$nama = $connection->conn->real_escape_string($_POST['nama_sp']);
$model = $connection->conn->real_escape_string($_POST['model_sp']);
$tipe = $connection->conn->real_escape_string($_POST['tipe_sp']);

// tampilkan username session
$username = $_SESSION['admin'];

$id_karyawan = $user->tampilId($username)->fetch_object()->id;

// $or->tambah($id_karyawan, '0001', $kustom_id,$harga, $tgl_dirental, $denda, $tgl_kembali, 0,$status);
$os->tambah($id_karyawan,$tgl_masuk,$kustom_id,$sparepart,$mekanik,$jumlah,$harga,$prakiraan,$status,$total,$alamat,$email,$nama,$model,$tipe);






header("location: ?page=os");
//header("location: ?page=mekanik");
                
                
}
if (@$_GET['aksi']=='batal') {
  # code...
  $id = @$_GET['id'];
  $os->batalkan($id);
  header("location: ?page=os");

  
      
}
?>
