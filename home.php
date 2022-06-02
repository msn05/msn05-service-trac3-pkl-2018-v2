<?php
ob_start();
require_once('config/config.php');
require_once('models/database.php');
session_start();
$connection = new Database($host, $user, $pass, $database);
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    <title>PO TRAC</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <link href="asset/DataTables/datatables.min.css" rel="stylesheet">
    <link href="asset/Datetimepieker/jquery.datetimepicker.min.css">
    
    <!-- Bootstrap Core CSS -->



    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
     <link href="img/favicon.ico" rel="shortcut icon" />

    <!-- Add custom CSS here -->
    <link href="asset/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         <a class="navbar-brand" href="?page=dashboard">PO TRAC</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav side-nav">
            <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-file"></i> Data Barang<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=data_mobil">Data Mobil</a></li>
                <li><a href="?page=data_sp">Data Spare Part</a></li>
               </ul>
                <li><a href="?page=kustomer"><i class="fa fa-user"></i> Data Customers</a></li>
                 <li class="dropdown">
                    <li><a href="?page=mekanik"><i class="fa fa-users"></i> Data Mekanik</a></li>
                 <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-cog"></i> Data Order<b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=oren">Order Rental</a></li>
                <li><a href="?page=os">Order Servis</a></li>
               </ul>
                <li><a href="?page=laporan"><i class="fa fa-book"></i>Laporan</a></li>
            </li>
          </ul>

          <ul class="nav navbar-nav navbar-right navbar-user">
          
            <li class="dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-user"></i>  <?php echo $_SESSION['admin']; ?></a>
               <b class="caret"> </b>
              <ul class="dropdown-menu">
                <li><a href="?page=profile"><i class="fa fa-user"></i>Ganti PassWord</a></li>
                <li><a href="logout.php"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>

      <div id="page-wrapper">

      <?php
        if (@$_GET['page'] == 'dashboard' || @$_GET['page'] == ''){
          include "views/dashboard.php";
        }elseif (@$_GET['page'] == 'data_mobil'){
          include "views/data_mobil.php";
           }elseif (@$_GET['page'] == 'data_sp'){
          include "views/data_sp.php";
           }elseif (@$_GET['page'] == 'mekanik'){
          include "views/mekanik.php";
        }elseif (@$_GET['page'] == 'kustomer'){
          include "views/kustomer.php";
          }elseif (@$_GET['page'] == 'oren'){
          include "views/oren.php";
          
         }elseif (@$_GET['page'] == 'profile'){
          include "views/profile.php";
         
          }elseif (@$_GET['page'] == 'os'){
          include "views/os.php";
            }elseif (@$_GET['page'] == 'laporan'){
          include "views/laporan.php";
         }
      ?>


      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

   
    <!-- JavaScript -->
    <script src="asset/js/jquery-1.10.2.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/DataTables/datatables.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $('#datatables').DataTable();
      });
    </script>
    <script src="asset/Datetimepiecker/jquery.js" ></script>
    <script src="asset/Datetimepiecker/jquery.datetimepicker.full.js"></script>
    <script>
    $(".input-group.date").datepicker({autoclose: true, todayHighlight: true});
    </script>

  </body>
</html>
