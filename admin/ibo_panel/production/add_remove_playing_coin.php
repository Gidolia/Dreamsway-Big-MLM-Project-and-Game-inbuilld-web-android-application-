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
    <title>DREAMSWAY || Add Remove Playing Coin</title>

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
                <h3>Playing Coin</h3>
              </div>
            </div>
<?php
            $sd="SELECT * FROM `distributor` WHERE `d_id`='$_GET[d_id]'";
            $cc=$con->query($sd);
            $xzxx=$cc->fetch_assoc();
            ?>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>ADD/Remove Playing Coin</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        <h4>Playing Coin = <?php echo $xzxx[ludo_coin]+0;?>/-</h4>
                        
                              
        <table class="table table-striped table-bordered">
            <form method="post">
            <tr>
                <td>ID</td>
                <td>DS<?php echo $_GET[d_id];?> (<?php echo $xzxx[name];?>)<input type="hidden" class="form-control" name="d_id" value="<?php echo $_GET[d_id];?>" required></td>
            </tr>
            <tr>
                <td>Operator</td>
                <td><select name="operator">
                    <option value="add">ADD</option>
                    <option value="remove">remove</option>
                </select></td>
            </tr>
            <tr>
                <td>Coin QTY</td>
                <td><input type="number" name="amount" class="form-control"></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" class="btn btn-success" value="Submit" name="opperaa"></td>
            </tr>
            </form>
            </table>
            
            </div>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Playing Coin Ledger View</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
            
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>Sr. no.</th><th>d_id</th><th>Date / Time</th><th>Type</th><th>PIN</th><th>After PIN</th><th>Note</th></tr></thead>
            <?php
            $a=0;
            $g="SELECT * FROM `ludo_coin_history` WHERE `d_id`='$_GET[d_id]'";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[d_id];?></td>
                <td><?php echo $d[date];?> <?php echo $d[time];?></td>
                <td><?php echo $d[type];?></td>
                <td><?php echo $d[coin];?></td>
                <td><?php echo $d[a_coin];?></td>
                <td><?php echo $d[note];?></td>
            </tr>
            <?php
            }?>
        </table>
        
         <?php
            if(isset($_POST[opperaa]))
            {
                if($_POST[operator]=="add")
                {
                $sa="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                $xx=$con->query($sa);
                
                $fet=$xx->fetch_assoc();
                
                
                    $wallet=$fet[ludo_coin]+$_POST[amount];
                    $r="UPDATE `distributor` SET `ludo_coin` = '$wallet' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                    
                    $r .="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[amount]', '+', '$wallet', '$date', '$time', 'Admin Add', '');";
                    
                    
                    
               
                if($con->multi_query($r)===TRUE)
                {
                	echo "<script>alert('Coin Distributed Successfully');
		location.href='add_remove_playing_coin.php?d_id=$_POST[d_id]';</script>";
                }
                else{
                    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Add Remove PIN Wallet');";
                
    	        $con->query($fail);
    	        echo "<script>alert('Failed ! Plz contact Your Developer');
		location.href='add_remove_playing_coin.php?d_id=$_POST[d_id]';</script>";
                }
                }
                elseif($_POST[operator]=="remove")
                {
                $sa="SELECT * FROM `distributor` WHERE `d_id`='$_POST[d_id]'";
                $xx=$con->query($sa);
                
                $fet=$xx->fetch_assoc();
                
                
                    $wallet=$fet[ludo_coin]-$_POST[amount];
                    $r="UPDATE `distributor` SET `ludo_coin` = '$wallet' WHERE `distributor`.`d_id` = '$_POST[d_id]';";
                    
                    $r .="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$_POST[d_id]', '$_POST[amount]', '-', '$wallet', '$date', '$time', 'Admin Remove', '');";
                    
               
                if($con->multi_query($r)===TRUE)
                {
                	echo "<script>alert('coin Distributed Successfully');
		location.href='add_remove_playing_coin.php?d_id=$_POST[d_id]';</script>";
                }
                else{
                    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Add Remove PIN Wallet');";
                
    	        $con->query($fail);
    	        echo "<script>alert('Failed ! Plz contact Your Developer');
		location.href='add_remove_playing_coin.php?d_id=$_POST[d_id]';</script>";
                }
                }
                
            }
            ?>
                    
                    
                    
                  </div>
                </div>
              </div>
            </div>
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
