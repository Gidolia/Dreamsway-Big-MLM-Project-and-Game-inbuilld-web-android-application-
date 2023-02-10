<?php include "config.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dreamsway || Recharge History</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
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
                <h3>Pending Recharge History</h3>
              </div>

              
            </div>

            <div class="clearfix"></div>




            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>PENDING Recharge</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                     <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                            <th> ID</th>
                          <th>D ID</th>
                          <th>Date / Time</th>
                          <th>Amount</th>
                          <th>Mobile</th>
                          <th>Response</th>
                          <th></th>
                        </tr>
                      </thead>


                      <tbody>
                          <?php 
                                
                                $e="SELECT * FROM `recharge_response` WHERE `recharge_status`='Pending'";
                                $d=$con->query($e);
                                while($r=$d->fetch_assoc()){
                                if($r["d_id"]!="")
                                {
                                    
                                    
                                    
                                    
                                ?>
                                    <tr>
                                        <td> <?php echo $r["rr_id"]; ?></td>
                                        <td>
                                    DS<?php echo $r['d_id'];?>
                                </td>
                                <td>
                                    <?php echo $r['date']." / ".$r['time'];?>
                                </td>
                                <td>
                                   <?php echo $r["amount"];?>
                                </td>
                                <th> <?php echo $r["r_mobile"];?></th>
                                <td><?php echo $r["response"]; ?></td>
                                 <td>
                                     <form method="post">
                                         <input type="hidden" name="rr_id" value="<?php echo $r['rr_id']; ?>">
                                         <input type="submit" name="accept_recharge" class="btn btn-success">
                                     </form>
                                     <form method="post">
                                         <input type="hidden" name="rr_id" value="<?php echo $r['rr_id']; ?>">
                                         <input type="submit" name="reject_recharge" value="Reject" class="btn btn-danger">
                                     </form>
                                 
                                 
                                   
                                   </td>
                               <?php }
                               }?>
                      </tbody>
                    </table>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            © 2020 Dreamsway. All Rights Reserved</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

<?php
///////////////////////////////////function mobile recharge
function distribute_recharge_income($a_d_id,$amount,$unq_id)
{
    
    global $con, $date, $time;
    $amm=$amount*1/100;
    $lsql="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$a_d_id'";
 $que=$con->query($lsql);
 $fet=mysqli_fetch_assoc($que);
    $withdrawal_wallet=$fet[withdrawal_wallet]+$amm;
    $sql="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet[d_id]', '$date', '$time', '+', '$amm', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '0', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet[d_id]';";
    
    
    ///////////////////////////level 1 0.4%
 $amount1=$amount*0.4/100;
 $lsql1="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet[s_id]'";
 $que1=$con->query($lsql1);
 $fet1=mysqli_fetch_assoc($que1);
 
    $withdrawal_wallet=$fet1[withdrawal_wallet]+$amount1;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet1[d_id]', '$date', '$time', '+', '$amount1', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '1', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet1[d_id]';";
    
    
 
 ///////////////////////////level 2 0.3%
 $amount2=$amount*0.3/100;
 $lsql2="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet1[s_id]'";
 $que2=$con->query($lsql2);
 $fet2=mysqli_fetch_assoc($que2);
 
 
    $withdrawal_wallet=$fet2[withdrawal_wallet]+$amount2;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet2[d_id]', '$date', '$time', '+', '$amount2', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '2', '$unq_id');";;
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet2[d_id]';";
    
 
 ///////////////////////////level 3 0.2%
 $amount3=$amount*0.2/100;
 $lsql3="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet2[s_id]'";
 $que3=$con->query($lsql3);
 $fet3=mysqli_fetch_assoc($que3);
 
 
     $withdrawal_wallet=$fet3[withdrawal_wallet]+$amount3;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet3[d_id]', '$date', '$time', '+', '$amount3', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '3', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet3[d_id]';";
    
    
 
 
 ///////////////////////////level 4 0.2%
 $amount4=$amount*0.2/100;
 $lsql4="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet3[s_id]'";
 $que4=$con->query($lsql4);
 $fet4=mysqli_fetch_assoc($que4);
 
     $withdrawal_wallet=$fet4[withdrawal_wallet]+$amount4;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet4[d_id]', '$date', '$time', '+', '$amount4', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '4', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet4[d_id]';";
 ///////////////////////////level 5 0.3%
 $amount5=$amount*0.3/100;
 $lsql5="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet4[s_id]'";
 $que5=$con->query($lsql5);
 $fet5=mysqli_fetch_assoc($que5);
 
     $withdrawal_wallet=$fet5[withdrawal_wallet]+$amount5;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet5[d_id]', '$date', '$time', '+', '$amount5', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '5', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet5[d_id]';";
 
 ///////////////////////////level 6 0.4%
 $amount6=$amount*0.4/100;
 $lsql6="SELECT d_id,s_id,withdrawal_wallet FROM `distributor` WHERE `d_id`='$fet5[s_id]'";
 $que6=$con->query($lsql6);
 $fet6=mysqli_fetch_assoc($que6);
 
     $withdrawal_wallet=$fet6[withdrawal_wallet]+$amount6;
    $sql .="INSERT INTO `withdrawal_wallet` (`ww_id`, `d_id`, `date`, `time`, `type`, `amount`, `a_bal`, `note`, `income_for`, `from_d_id`, `to_d_id`, `activated_id`, `level`, `recharge_unq_id`) VALUES (NULL, '$fet6[d_id]', '$date', '$time', '+', '$amount6', '$withdrawal_wallet', 'Recharge Income', 'Recharge', '', '', '$a_d_id', '6', '$unq_id');";
    $sql .="UPDATE `distributor` SET `withdrawal_wallet` = '$withdrawal_wallet' WHERE `distributor`.`d_id` = '$fet6[d_id]';";
    
    if($con->multi_query($sql)===TRUE)
    {
        $c="y";
    }
    else{
        $c="n";
    }
    return $c;
}

if(isset($_POST[accept_recharge]))
{
    $sqld="SELECT * FROM `recharge_response` WHERE `rr_id`='$_POST[rr_id]'";
    $bvn=$con->query($sqld);
    $dcc=$bvn->fetch_assoc();
    distribute_recharge_income($dcc[d_id],$dcc[amount],$dcc[unique_id]);
    $dcccc="UPDATE `recharge_response` SET `hold_amount` = 'n' WHERE `recharge_response`.`rr_id` = '$_POST[rr_id]';";
    $fv="UPDATE `recharge_response` SET `commission_distributed` = 'y' WHERE `recharge_response`.`rr_id` = '$_POST[rr_id]';";
    $xs="UPDATE `recharge_response` SET `recharge_status` = 'Success' WHERE `recharge_response`.`rr_id` = '$_POST[rr_id]';";
    while ($con->next_result()) {;}
    if($con->query($dcccc)===TRUE && $con->query($fv)===TRUE && $con->query($xs)===TRUE)
    {
        echo "<script>alert('Success ! Commission Distributed'); location.href='pending_recharge_list.php';</script>";
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', 'Y', '$url', 'Mobile Income Distribution');";
    	        $con->query($fail);
         echo "<script>alert('Failed ! Some Problem Occour'); location.href='pending_recharge_list.php';</script>";
    }
}
if(isset($_POST[reject_recharge]))
{
    $sqld="SELECT * FROM `recharge_response` WHERE `rr_id`='$_POST[rr_id]'";
    $bvn=$con->query($sqld);
    $dcc=$bvn->fetch_assoc();
    
     $lsql5="SELECT * FROM `distributor` WHERE `d_id`='$dcc[d_id]'";
     $que5=$con->query($lsql5);
     $fet5=mysqli_fetch_assoc($que5);
     $main_bal=$fet5[main_wallet]+$dcc[amount];
     
     $fer="UPDATE `distributor` SET `main_wallet` = '$main_bal' WHERE `distributor`.`d_id` = '$dcc[d_id]';";
     $inst="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$dcc[d_id]', '+', '$dcc[amount]', '$main_bal', 'Recharge Fail Return', '', '', 'Recharge', '$date', '$time', '$dcc[unique_id]');";
     $xs="UPDATE `recharge_response` SET `recharge_status` = 'Fail' WHERE `recharge_response`.`rr_id` = '$_POST[rr_id]';";
    if($con->query($fer)===TRUE && $con->query($inst)===TRUE && $con->query($xs)===TRUE)
    {
        echo "<script>alert('Rejected ! Amount Returned Successfully'); location.href='pending_recharge_list.php';</script>";
    }
    else{
        $fail="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', 'Y', '$url', 'Mobile Income Reject');";
    	        $con->query($fail);
         echo "<script>alert('Failed ! Some Problem Occour'); location.href='pending_recharge_list.php';</script>";
    }
}

?>



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
