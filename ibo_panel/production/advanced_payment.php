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
    <title>Wind Son Group</title>

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
                <h3>Withdrawl Wallet Details</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Withdrawl Request</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        
                        <?php
                        if($d_detail[a1_wallet]>499){$amt=$d_detail[a1_wallet]*20/100;
                        }
                        else{$amt=0;
                            $re="readonly";
                        }
                        if($d_detail[a2_wallet]>499){$amt2=$d_detail[a2_wallet]*20/100;
                        }
                        else{$amt2=0;
                            $re2="readonly";
                        }
                        ?>
                              
        <table class="table table-striped table-bordered">
            
            <thead>
                <tr>
                    <th>Accounts</th>
                    <th>Current Balance</th>
                    <th>Advanced Withdrawal</th>
                    <th>Amount to Withdraw</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Account 1</th>
                    <td><?php echo $d_detail[a1_wallet];?></td>
                    <td><?php echo $amt;?></td>
                    <td><form method="post"><input type="number" class="form-control" name="amount" min="0" max="<?php echo $amt+0;?>" <?php echo $re;?> required><input type="submit" class="btn btn-success" value="Request Withdrawl" name="acc1_sub"></form>
                    </td>
                </tr>
                <tr>
                    <th>Account 2</th>
                    <td><?php echo $d_detail[a2_wallet];?></td>
                    <td><?php echo $amt2;?></td>
                    <td><form method="post"><input type="number" class="form-control" name="amount" min="0" max="<?php echo $amt2+0;?>" <?php echo $re2;?> required><input type="submit" class="btn btn-success" value="Request Withdrawl" name="acc2_sub"></form>
                    </td>
                </tr>
            </tbody>
                
               
            </table>
            
            <?php
            if(isset($_POST[acc1_sub]))
            {
                $acc_bal=$d_detail[a1_wallet]-$_POST[amount];
                $sql="INSERT INTO `advenced_withdrawal` (`aw_id`, `d_id`, `date`, `time`, `amount`, `payment_duration`, `status`, `acc`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[amount]', '', 'N', '1');";
                $bal=$d_detail[withdrawal_wallet]+$_POST[amount];
                $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '+', '$_POST[amount]', 'Advanced Withdrawal');";
                $sql .="UPDATE `distributor` SET `a1_wallet` = '$acc_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                if($con->multi_query($sql)===TRUE)
                {
                    	echo "<script>alert('Amount Added to your Withdrawal Wallet');
		location.href='advanced_payment.php';</script>";
                }
                else{
                    	echo "<script>alert('Query Failed Please try again');
		location.href='advanced_payment.php';</script>";
                }
            }
            
            if(isset($_POST[acc2_sub]))
            {
                $acc_bal=$d_detail[a2_wallet]-$_POST[amount];
                $sql="INSERT INTO `advenced_withdrawal` (`aw_id`, `d_id`, `date`, `time`, `amount`, `payment_duration`, `status`, `acc`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '$_POST[amount]', '', 'N', '2');";
                $bal=$d_detail[withdrawal_wallet]+$_POST[amount];
                $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `note`) VALUES (NULL, '$_SESSION[d_id]', '$date', '$time', '+', '$_POST[amount]', 'Advanced Withdrawal');";
                $sql .="UPDATE `distributor` SET `a2_wallet` = '$acc_bal' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
                if($con->multi_query($sql)===TRUE)
                {
                    	echo "<script>alert('Amount Added to your Withdrawal Wallet');
		location.href='advanced_payment.php';</script>";
                }
                else{
                    	echo "<script>alert('Query Failed Please try again');
		location.href='advanced_payment.php';</script>";
                }
            }
            ?>
            </div>
            </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Requets History</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
            <br>
        <table class="table table-striped table-bordered" value ="<h2>Withdrawl history</h2>" id="datatable">
            <thead><tr><th>Sr. no.</th><th>Date</th><th>Time</th><th>Amount</th><th>Note</th></tr></thead>
            <?php
            $a=0;
                                 
            $g="SELECT * FROM `withdrawal_wallet` WHERE `d_id`='$_SESSION[d_id]'";
            $dc=$con->query($g);
            while($d=$dc->fetch_assoc())
            { $a++; ?>
          
            <tr>
                <td><?php echo $a;?></td>
                <td><?php echo $d[date];?></td>
                <td><?php echo $d[time];?></td>
                <td><?php echo $d[amount];?></td>
                
                
                <td><?php echo $d[note];?></td>
            </tr>
            <?php
            }?>
        </table>
        
         <?php
            if(isset($_POST[amount_submit]))
            {
                	if($_POST[amount] >=500)
							{
							   if($_POST[amount] <=$d_detail[withdrawal_wallet])
							{
						$d="SELECT * FROM `withdrawal_request` WHERE `d_id`='$_SESSION[d_id]' AND `status`='N'";
						$query=$con->query($d);
						if($query->num_rows == 0)
						{
								
							
                $dx="INSERT INTO `withdrawal_request` (`wr_id`, `d_id`, `amount`, `date`, `time`, `status`, `a_clear_date`, `a_clear_time`, `a_clear_txn_id`) VALUES ('Null', '$_SESSION[d_id]', '$_POST[amount]', '$date', '$time', 'N', '', '', '');";
						
							if($con->query($dx) === TRUE)
							{
							
								echo "<script>alert('Request Submit Sucessfully');
		location.href='withdrawl_wallet.php';</script>";
							}
						 	else
							{
							 	echo "<script>alert('Query fail Please try again');
		location.href='withdrawl_wallet.php';</script>";
						 	}
						}
						else { echo "<script>alert('Wait for your last request to be approved');
		location.href='withdrawl_wallet.php';</script>";}
							}
							else { echo "<script>alert('Your Wallet Balance is lower');
		location.href='withdrawl_wallet.php';</script>";}
						 	
							}
							else { echo "<script>alert('Minimum Rs.500 can be requested');
		location.href='withdrawl_wallet.php';</script>";}	 	
						 	
						 	
                
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
