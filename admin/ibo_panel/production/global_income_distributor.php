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
    <title>DREAMSWAY || Global Income Distribute</title>

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
                <h3>Distribute Global Income</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Distribute Global Income</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        
                        
                              <?php
        
        ?>
        <table class="table table-striped table-bordered">
            <tr>
                <td>Amount Distribute Among global</td>
                <td><form method="post"><input type="number" class="form-control" name="amount" min="0" required><input type="submit" class="btn btn-success" value="Distribute" name="global_amount_submit"></form></td>
            </tr>
            </table>
            
            </div>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Distribute Global Income History</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>Sr. no.</th><th>Date / Time</th><th>Amount</th></tr></thead>
            <?php
            $a=0;
            $g="SELECT * FROM `global_income` ORDER BY `global_income`.`gi_id` DESC";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date];?> <?php echo $d[time];?></td>
                <td><?php echo $d[amount_to_distribute];?></td>
                
            </tr>
            <?php
            }?>
        </table>
        
         <?php
            if(isset($_POST[global_amount_submit]))
            {
                $sa="SELECT * FROM `distributor` WHERE `global_status`='y'";
                $xx=$con->query($sa);
                $count=$xx->num_rows;
                $per_m_amount=$_POST[amount]/$count;
                $per_m_amount= number_format($per_m_amount, 3, '.', '');
                $r="INSERT INTO `global_income` (`gi_id`, `date`, `time`, `amount_to_distribute`, `from_date`, `to_date`, `percentage`) VALUES (NULL, '$date', '$time', '$_POST[amount]', '', '', '5%');";
                while($aa=$xx->fetch_assoc())
                {
                    $wallet=$aa[withdrawal_wallet]+$per_m_amount;
                    $r .="UPDATE `distributor` SET `withdrawal_wallet` = '$wallet' WHERE `distributor`.`d_id` = '$aa[d_id]';";
                    $r .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`) VALUES (NULL, '$aa[d_id]', '$date', '$time', '+', '$per_m_amount', '$wallet', 'Global Income', 'Global', '', '', '', '');";
                    
                    $r .="INSERT INTO `global_income_distributed_id` (`gid_id`, `gi_id`, `d_id`, `date`, `time`, `amount`) VALUES (NULL, '', '$aa[d_id]', '$date', '$time', '$per_m_amount');";
                    
                    
                }
                
                if($con->multi_query($r)===TRUE)
                {
                	echo "<script>alert('Amount Distributed Successfully');
		location.href='global_income_distributor.php';</script>";
                }
                else{
                    $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '', 'admin', '$url', 'Global Income Distribute');";
                
    	        $con->query($fail);
    	        echo "<script>alert('Failed ! Plz contact Your Developer');
		location.href='global_income_distributor.php';</script>";
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
