<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="../../small_logo.jpg" type="image/ico" />
    <title>Dreamsway || Team Development Fund</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="extra.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <?php include "include/sidebar.php";?>
          </div>
        </div>

        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Club Income</h3>
              </div>
            </div>

            <div class="clearfix"></div>

           
                        
                        <div class="dash-tiles row">
        <!-- Column 1 of Row 1 -->
        <a href="bronze_club_income.php">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Total Users Tile -->
            <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Bronze Club Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                  $scd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Bronze Club Income'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  echo $lv_ic;
                  $totn=$lv_ic;
                  ?>
                    </div>
            </div>
        </div></a>
            <!-- END Total Users Tile -->
            <!-- Total Profit Tile -->
            <a href="runner_club_income.php">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Runner Club Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                  $scd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Runner Club Income'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  echo $lv_ic;
                  $totn=$lv_ic;
                  ?>
                    </div>
            </div>
            
            <!-- END Total Profit Tile -->
        </div></a>
        <!-- END Column 1 of Row 1 -->
        <!-- Column 2 of Row 1 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Total Sales Tile -->
            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Silver Club Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                  $scdss="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Silver Club Income'";
                  $cdrss=$con->query($scdss);
                  $lv_icss=0;
                  while($lv_iss=$cdrss->fetch_assoc()){$lv_icss=$lv_icss+$lv_iss[amount];}
                  echo $lv_icss;
                  $totn=$totn+$lv_icss;
                  ?>
                    </div>
            </div>
        </div>
            <!-- END Total Sales Tile -->
            <!-- Total Downloads Tile -->
        
    </div> </div></div>
                            
                    
                    
                  
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include "include/footer.php";?>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>
