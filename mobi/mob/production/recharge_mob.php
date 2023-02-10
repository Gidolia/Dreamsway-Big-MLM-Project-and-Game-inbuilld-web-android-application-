<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dreamsway | Mobile Recharge</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">


        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Mobile Recharge</h3>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Mobile Recharge</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     
                    <form class="form-horizontal form-label-left" method="post" name="myForm" onsubmit="return validateForm()">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">My Wallet Balance</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          
                          <?php echo $d_detail[main_wallet]+0;?>
                        </div>
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile No.</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="mobile" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Operator</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <select name="operator" class="form-control">
                                <option value="RA">Airtel</option>
                                <option value="RV">Vodafone</option>
                                <option value="TB">BSNL</option>
                                <option value="RJ">Reliance jio</option>
                                <option value="RC">Aircel</option>
                                <option value="RI">Idea</option>
                                <option value="RM">MTNL</option>
                                <option value="UN">Uninor</option>
                            </select>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <span id="upline_msg" style="color: red"></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount</label>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                          <input type="number" class="form-control" name="amount" required>
                          <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Recharge Mobile" name="mob_recharge">
                        </div>
                      </div>
                     </form>

                    </div>
                  
                </div>
            </div>
            </div>
        <?php
        if(isset($_POST[mob_recharge]))
        {
            $baba=$d_detail[main_wallet]-$_POST[amount];
            if($baba>=0)
            {
           
        		$url = 'http://www.bizforcerecharge.in/ReCharge/APIs.aspx?Mob=9588417929&message=RR+'.$_POST[operator].'+'.$_POST[mobile].'+'.$_POST[amount].'+3704&myTxId=757418&source=API&circle=14';
        	/*	"http://www.bizforcerecharge.in/ReCharge/APIs.aspx?Mob=9588417929&message=RR+Airtel+7869470415+20+6681&myTxId=757418&source=API&circle=14";*/
        
        		$ch = curl_init($url);
        		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        		$response = curl_exec($ch);
                $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$url');";
        		$con->query($cd);
                    $str_arr = explode (",", $response);
                    if($str_arr[0]=="Your Request have been Success")
                    {
        		
        		$sss="UPDATE `distributor` SET `main_wallet` = '$baba' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
        		$con->query($sss);
        		distribute_recharge_income($_SESSION[d_id],$_POST[amount]);
        		echo "<script>alert('Success! Mobile No. Recharged'); location.href='mobile_recharge.php';</script>";
                    }
                    else{
                echo "<script>alert('Failed! Plz Try Again'); location.href='mobile_recharge.php';</script>";
            }
            }
            else{
                echo "<script>alert('You Dont Have Balance'); location.href='mobile_recharge.php';</script>";
            }
        }
        ?>       
            
            
          
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            © 2020 Dreamsway. All Rights Reserved
          </div>
          <div class="clearfix"></div>
        </footer>
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
