<?php
require_once('../config/config.php');
require_once('../models/database.php');
$connection = new Database($host, $user, $pass, $database);
if (empty($_SESSION['username']) && empty($_SESSION['password'])){

}

else {
    if (isset($_POST['simpan'])) {
        if (isset($_SESSION['id'])) {
   
            $old_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['old_pass'])));
            $new_pass    = md5(mysqli_real_escape_string($mysqli, trim($_POST['new_pass'])));
            $retype_pass = md5(mysqli_real_escape_string($mysqli, trim($_POST['retype_pass'])));

            // ambil data hasil session user
            $id = $_SESSION['id'];

            // seleksi password dari tabel pegawai untuk dicek
            $sql = mysqli_query($mysqli, "SELECT password FROM users WHERE id=$id")
                                          or die('Ada kesalahan pada query seleksi password : '.mysqli_error($mysqli));
            $data = mysqli_fetch_assoc($sql);

           
            if ($old_pass != $data['password']){
                 header("Location: ../main.php?views=profile&alert=1");
            }else {

                if ($new_pass != $retype_pass){
                        header("Location: ../main.php?views=profile&alert=2");
                }

                
                else {
                   
                    $query = mysqli_query($mysqli, "UPDATE users SET password = '$new_pass'
                                                                  WHERE id  = '$id'")
                                                    or die('Ada kesalahan pada query update password : '.mysqli_error($mysqli));   

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                     header("location: ../main.php?models=profile&alert=3");


                    }   
                }
            }
        }
    }   
}               
?>
