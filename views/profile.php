
 <div class="row">
          <div class="col-lg-12">
            <h1>Edit Data Profil </h1>
            <ol class="breadcrumb">
              <marquee direction="left" scrollamount="2" align="center" behavior="alternate"><h1>Selamat Bekerja Sahabat TRAC ASTRA PALEMBANG</marquee></a>
              <li class="active"><i class="icon-file-alt"></i></li>
            </ol>
          </div>
          
        </div><!-- /.row -->
<h3 class="box-title margin text-center">Edit Profil</h3>
<center> <div class="batas"> </div></center>
<br/>
<?php 
      require_once("config/config.php");
      require_once("models/database.php");
      include "models/d_password.php";
      $connection = new Database($host, $user, $pass, $database);
      $pass = new Password($connection);

      if($_SESSION['level']);
      if (isset($_POST['submit'])){
      if ($simpan) {
      echo "<script>alert('Data Berhasil di Update');</script>";
      } else { 
        echo "<script>alert('Gagal Di Update');</script>";
}
        $tampil1 = $pass->ambek();
      while ($pass = mysqli_fetch_array($tampil1)){
        $nama=$pass['nama'];
        $username=$pass['username'];

      }
         ?>
         <?php
       }
       ?>
<form class="form-horizontal" role="form" method="post" action="">             

  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Lengkap</label>
    <div class="col-sm-5">
    <input type="hidden" class="form-control" required="required" name="id">
      <input type="text" class="form-control" required="required" name="nama" value="<?php echo $nama;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="username" value="<?php echo $username;?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" id="password1"class="form-control" required="required" name="password" value="">
    <a class="text-red">*ubah password secara berkala demi menjaga keamanan</a>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Konfirmasi Password</label>
    <div class="col-sm-5">
      <input type="password" id="password2"class="form-control" required="required">    
    </div>
  </div>
    
  <script type="text/javascript">
window.onload = function () {
document.getElementById("password1").onchange = validatePassword;
document.getElementById("password2").onchange = validatePassword;
}
function validatePassword(){
var pass2=document.getElementById("password2").value;
var pass1=document.getElementById("password1").value;
if(pass1!=pass2)
document.getElementById("password2").setCustomValidity("Passwords Tidak Sama");
else
document.getElementById("password2").setCustomValidity('');}
</script>

  <div class="form-group">
    <label class="col-sm-4 control-label">  </label>
    <div class="col-sm-5">
<button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="javascript:history.back()" class="btn btn-info pull-right"><i class="fa fa-backward"></i> Kembali</a>   
    </div>
  </div>   

</form>
