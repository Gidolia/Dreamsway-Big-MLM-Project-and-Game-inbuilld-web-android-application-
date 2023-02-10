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
    <title>DREAMSWAY || Redeem Coin</title>

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
                <h3>Redeem Coin Details</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Redeem Coin to Income Wallet</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        
                              
        <table class="table table-striped table-bordered">
            <thead><tr><th>Your Redeem Coin Balance</th><th><?php echo $d_detail[ludo_wallet]+0;?></th></tr></thead>
            <tr>
                <td>Withdrawl Coins</td>
                <td><form method="post"><input type="number" class="form-control" name="coin" min="0" max="<?php echo $d_detail[ludo_wallet]+0;?>" required><input type="submit" class="btn btn-success" value="Transfer To Income Wallet" name="coin_submit"></form>
                </td>
            </tr>
            </table>
            
            </div>
            </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Transfer To Playing Wallet</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
        <table class="table table-striped table-bordered">
            <thead><tr><th>Your Redeem Coin Balance</th><th><?php echo $d_detail[ludo_wallet]+0;?></th></tr></thead>
            <tr>
                <td>Transfer Coins</td>
                <td><form method="post"><input type="number" class="form-control" name="coin" min="0" max="<?php echo $d_detail[ludo_wallet]+0;?>" required><input type="submit" class="btn btn-success" value="Transfer To Playing Wallet" name="coin_transfer"></form>
                </td>
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
                    <h2>Redeem Coin Wallet Balance History</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
        <table class="table table-striped table-bordered" id="datatable">
            <thead><tr><th>Sr. no.</th><th>Date</th><th>Time</th><th></th><th>Amount</th><th>Note</th></tr></thead>
            <?php
            $a=0;
            $g="SELECT * FROM `ludo_wallet_history` WHERE `d_id`='$_SESSION[d_id]'";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date];?></td>
                <td><?php echo $d[time];?></td>
                <th><?php if($d[type]=="+"){?>
                <font style="color:green;">Credit</font><?php 
                }else{?><font style="color:red;">Debit</font>
                <?php }?></th>
                <td><?php echo $d[coin];?></td>
                <td><?php echo $d[note];?></td>
            </tr>
            <?php
            }?>
        </table>
        
         <?php
            if(isset($_POST[coin_submit]))
            {
                $amount=$_POST[coin]/10;
                $coin_bal=$d_detail[ludo_wallet]-$_POST[coin];
                $iw_bal=$d_detail[withdrawal_wallet]+$amount;
                $sql_up="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[coin]', '$coin_bal', 'Transfered To Income Wallet', '', '', '-');";
                
                $sql_d="UPDATE `distributor` SET `ludo_wallet` = '$coin_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                
                $wal_up="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `note_s`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '+', '$amount', '$iw_bal', 'Redeem Coin Balance', '', '', '', '', '', 'Redeem Coin Balance', '');";
                $wal_d="UPDATE `distributor` SET `withdrawal_wallet` = '$iw_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                if($con->query($sql_up)===TRUE && $con->query($sql_d)===TRUE && $con->query($wal_up)===TRUE && $con->query($wal_d)===TRUE)
                {
                		echo "<script>alert('Successfully Transfered');
		location.href='redeem_coin.php';</script>";	
                }else{
                    echo "<script>alert('Failed! Plz Try Again');
		location.href='redeem_coin.php';</script>";
                }
						 	
                
            }
            
            if(isset($_POST[coin_transfer]))
            {
                $redeem_bal=$d_detail[ludo_wallet]-$_POST[coin];
                $play_bal=$d_detail[ludo_coin]+$_POST[coin];
                
                $red_up="INSERT INTO `ludo_wallet_history` (`lwh_id`, `d_id`, `date`, `time`, `coin`, `a_coin`, `note`, `activated_d_id`, `level`, `type`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[coin]', '$redeem_bal', 'Transfered To Playing Coins', '', '', '-');";
                $red_d="UPDATE `distributor` SET `ludo_wallet` = '$redeem_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                
                $play_up="INSERT INTO `ludo_coin_history` (`lch_id`, `d_id`, `coin`, `type`, `a_coin`, `date`, `time`, `note`, `activated_id`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[coin]', '+', '$play_bal', '$date', '$time', 'Received From Redeem Wallet', '');";
                $play_d="UPDATE `distributor` SET `ludo_coin` = '$play_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                if($con->query($red_up)===TRUE && $con->query($red_d)===TRUE && $con->query($play_up)===TRUE && $con->query($play_d)===TRUE)
                {
                    echo "<script>alert('Successfully Transfered');
		location.href='redeem_coin.php';</script>";
                }
                else{
                    echo "<script>alert('Failed Plz Try Again');
		location.href='redeem_coin.php';</script>";
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
