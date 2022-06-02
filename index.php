<?php

require_once("config/config.php");
require_once("models/database.php");
include "models/d_password.php";

$connection = new Database($host, $user, $pass, $database);

$db = new mysqli("localhost","root","","db_do" );
$user = new Password($connection);

@session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PO TRAC</title>
<link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="asset/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="asset/style.css" type="text/css"  />
 <link href="img/favicon.ico" rel="shortcut icon" />
</head>
<body>

<div class="signin-form">

    <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Log In</h2><hr />

        <div class="form-group">
        <input type="text" class="form-control" name="username" placeholder="Username or E mail ID" required />
       
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Your Password" />
        </div>
       
        <hr />
        
        <div class="form-group">
            <button type="submit" name="login" value="login" class="btn btn-default">
                    <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
        </form>
                <?php
        if(@$_POST['login']){
            $username = @$_POST['username'];
            $password = @$_POST['password'];
            if($username ==  '' || $password == ''){
                ?>
                    <script type="text/javascript">alert("Username / Password tidak boleh Kosong")</script>
                <?php
            } else {
                $log = $db->prepare("SELECT * FROM users WHERE username = ?  and password = md5(?)") or die ($db->error);
                $log->bind_param('ss', $username, $password);
                $log->execute();
                $log->store_result();
                $cek = $log->num_rows;
                $log->bind_result($nama);
                $log->fetch();
                if($cek > 0){
                    $level = $user->tampilId($username)->fetch_object()->level;
                    $_SESSION['admin'] = $username;
                    $_SESSION['level']=$level;

                    header("location:home.php");
                } else {
                echo  "<script>alert('USERNAME yang Anda masukkan tidak terdaftar!');history.go(-1)</script>";
            }
             
                }
            }
            ?>
            </div>

    