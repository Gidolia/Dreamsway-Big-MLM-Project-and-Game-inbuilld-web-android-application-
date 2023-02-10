<?php include "config.php";
//include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../../small_logo.jpg" type="image/ico" />

    <title>Dreamsway sure || Index</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
     <!-- Custom Theme Style -->
    <link href="extra.css" rel="stylesheet">
    
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php include "include/sidebar.php";?>
        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->
        <!-- page content -->
        <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row">
            <div class="card-text content mt-3">
            <div class="no-overflow"><h2 style="text-align: left;background-color:#6DE9FF;"><marquee><a href="#" target="_blank"><span class="" style="color: rgb(230, 21, 28);"><strong>World's 1st Penta Business Model</strong></span></a></marquee></h2>
            </div>
        </div>
            <div class="footer"></div>
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <div class="bs-docs-section">
                      <div class="bs-glyphicons">
                        <ul class="bs-glyphicons-list">
                          <a href="new_registration.php"><li>
                            <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span>
                            <span class="glyphicon-class">New Registration</span>
                          </li>
                          <a href="activate_id_pin.php"><li>
                            <span class="glyphicon glyphicon-check" aria-hidden="true"></span>
                            <span class="glyphicon-class">Activate New ID</span>
                          </li></a>
                          <a href="pin_generate.php"><li>
                            <span class="glyphicon glyphicon-th" aria-hidden="true"></span>
                            <span class="glyphicon-class">Generate Pin</span>
                          </li></a>
                          <a href="add_moneyd.php"><li>
                            <span class="glyphicon glyphicon-phone" aria-hidden="true"></span>
                            <span class="glyphicon-class">Add Money</span>
                          </li></a>
                          <a href="activate_id_u_pin.php"><li>
                            <span class="glyphicon glyphicon-magnet" aria-hidden="true"></span>
                            <span class="glyphicon-class">Upgrade ID</span>
                          </li></a>
                          <a href="profile_edit.php"><li>
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <span class="glyphicon-class">Profile</span>
                          </li></a>
                          <a href="kyc.php"><li>
                            <span class="glyphicon glyphicon-pawn" aria-hidden="true"></span>
                            <span class="glyphicon-class">KYC</span>
                          </li></a>
                         
                          
                        </ul>
                      </div>
                </div>
                </div>
            </div>
            </div>
            </div>

          
          <!-- /top tiles -->
            
            
            
            <div class="row">
              <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                     <table class="table table-striped">
                         <tr><th>Shoping Point</th><th><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> 
                         <?php echo $d_detail[shoping_point]+0;?></th></tr>

                         <tr><th collspan="2">
                              <a href="whatsapp://send?text=http://dreamsway.in/login/signup.php?d_id=ds<?php echo $_SESSION[d_id];?>" data-action="share/whatsapp/share"><span class="badge badge-primary" style="background-color: green;">Share Joinnig Link</span></a> <a href="dreamsway_application.apk"><span class="badge badge-primary" style="background-color: green;">App Download</span></a></th></tr>
                     </table>

                      
                  </div>
                </div>
              </div>
              
            </div>
            
            
          
              
              <div class="dash-tiles row">
                  
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-logfe clearfix animation-pullDown">
                <div class="dash-tile-header">
                   <table width="100%"><tr><td align="left">Total Team</td><td align="right">Active Team</td></tr></table>
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    
                    
                    </div>
            </div>
            <!-- END Server Downtime Tile -->
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                <div class="dash-tile-header">
                    <table width="100%"><tr><td align="left">Todays Joining</td><td align="right">Today's Activation</td></tr></table>
                     
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                  
                    
                    
                    </div>
            </div>
            <!-- END Server Downtime Tile -->
        </div>
                  
                  
        <!-- Column 1 of Row 1 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Total Users Tile -->
            <div class="dash-tile dash-tile-logfe clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Level Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                  $scd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Level Income'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  echo $lv_ic;
                  $totn=$lv_ic;
                  ?>
                    </div>
            </div>
        </div>
            <!-- END Total Users Tile -->
            <!-- Total Profit Tile -->
            
        <!-- Column 4 of Row 1 -->
        <a href="club_income.php">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Auto Matrix Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                    ///////////////////automatrix income
                  $scd="SELECT * FROM `auto_matrix_income` WHERE `d_id`='$_SESSION[d_id]'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  $totn=$totn+$lv_ic;
                  
                  echo $lv_ic;
                  $lv_ic=0;
                  ?>
                    
                    </div>
            </div>
            <!-- END Total Tickets Tile -->
        </div></a>
            
            
            
        <!-- END Column 1 of Row 1 -->
        <!-- Column 2 of Row 1 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Total Sales Tile -->
            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Ecommerce Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                  $scdss="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Recharge Income'";
                  $cdrss=$con->query($scdss);
                  $lv_icss=0;
                  while($lv_iss=$cdrss->fetch_assoc()){$lv_icss=$lv_icss+$lv_iss[amount];}
                  echo $lv_icss;
                  $totn=$totn+$lv_icss;
                  ?>
                    </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Global Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                                $g_i=0;
                                $e="SELECT * FROM `global_income_distributed_id` WHERE `d_id`='$_SESSION[d_id]'";
                                $d=$con->query($e);
                                while($r=$d->fetch_assoc()){
                                $g_i=$g_i+$r[amount];
                                    
                                }
                                echo $g_i;
                                 $totn=$totn+$g_i;
                                ?>
                    
                    
                    </div>
            </div>
            <!-- END Server Downtime Tile -->
        </div>
            <!-- END Total Sales Tile -->
            <a href="leadership_coin.php">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Total Sales Tile -->
            <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Leadership Coin
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-circle"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                  $scdss="SELECT * FROM `ludo_coin_history` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Leadership Income'";
                  $cdrss=$con->query($scdss);
                  $lv_icss=0;
                  while($lv_iss=$cdrss->fetch_assoc()){$lv_icss=$lv_icss+$lv_iss[coin];}
                  echo $lv_icss;
                  
                  ?>
                    </div>
            </div>
        </div></a>
        
        <!-- END Column 3 of Row 1 -->
            <!-- Total Downloads Tile -->
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-doll clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Game Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    
                    <?php
                    
        $gddd="SELECT * FROM `ludo_coin_history` WHERE `d_id`='$_SESSION[d_id]' AND `note`='game play income' AND `type`='+' ORDER BY `ludo_coin_history`.`lch_id` DESC";
        $dcbv=$con->query($gddd);
        $g_i=0;
        while($drftw=$dcbv->fetch_assoc())
            {$g_i=$g_i+$drftw[coin];
            }
            echo $g_i+0;
        ?>
                    
                
                    
                    </div>
            </div>
            <!-- END Total Downloads Tile -->
        </div>
        <!-- END Column 2 of Row 1 -->
        <!-- Column 3 of Row 1 -->
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!-- Popularity Tile -->
            
            <!-- END Popularity Tile -->
            <!-- Server Downtime Tile -->
            <div class="dash-tile dash-tile-oil clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Game sponser Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                   <?php
        $gddd="SELECT * FROM `ludo_wallet_history` WHERE `d_id`='$_SESSION[d_id]' AND `note`='game play income' AND `type`='+'";
        $dcbv=$con->query($gddd);
        $g_i=0;
        while($drftw=$dcbv->fetch_assoc())
            {$g_i=$g_i+$drftw[coin];
            }
            echo $g_i;
        ?></div>
            </div>
        </div>
        
        
        
        <!-- Column 4 of Row 1 -->
        <a href="club_income.php">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-flower clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Club Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                    ///////////////////bronze tree
                  $scd="SELECT * FROM `upgrade_income_on_income` WHERE `d_id`='$_SESSION[d_id]'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  $totn=$totn+$lv_ic;
                  
                  echo $lv_ic;
                  ?>
                    
                    </div>
            </div>
            <!-- END Total Tickets Tile -->
        </div></a>
        
        
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Club Sponser Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                    ///////////////////bronze tree
                  $scd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Upgrade Income On Income'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  $totn=$totn+$lv_ic;
                  
                  echo $lv_ic;
                  ?>
                    
                    
                    
                    
                    
                    
                    </div>
            </div>
            <!-- END Total Tickets Tile -->
        </div>
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-balloon clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Rewards
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    
                    
                    </div>
            </div>
            <!-- END Server Downtime Tile -->
        </div>
        
        <a href="upgrade_automatrix_income.php">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-ocean clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Upgrade Automatrix Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                    ///////////////////bronze tree
                  $scd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Upgrade Auto Matrix Income'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  $totn=$totn+$lv_ic;
                  
                  echo $lv_ic;
                  ?>
                    
                    </div>
            </div>
            <!-- END Total Tickets Tile -->
        </div></a>
        
        
        
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="dash-tile dash-tile-dark clearfix animation-pullDown">
                <div class="dash-tile-header">
                    Total Income
                </div>
                <div class="dash-tile-icon">
                    <i class="fa fa-inr"></i>
                </div>
                <div class="dash-tile-text">
                    <?php 
                    ///////////////////adding leadeship old income
                  $scd="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]' AND `note`='Leadership Income'";
                  $cdr=$con->query($scd);
                  $lv_ic=0;
                  while($lv_i=$cdr->fetch_assoc()){$lv_ic=$lv_ic+$lv_i[amount];}
                  $totn=$totn+$lv_ic;
                  
                  
                  ?>
                    
                    <?php echo $totn;?></div>
            </div>
            <!-- END Total Tickets Tile -->
        </div>
        <div class="clearfix">
        </div>
    </div>

              
          <br />

          
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        

        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
	
  </body>
</html>
