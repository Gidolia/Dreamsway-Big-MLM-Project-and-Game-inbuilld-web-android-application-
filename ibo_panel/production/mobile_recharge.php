<?php include "config.php";?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dreamsway || Mobile Recharge</title>

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
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <?php include "include/sidebar.php";?>
            
          </div>
        </div>

        <!-- top navigation -->
        <?php include "include/header.php";?>
        <!-- /top navigation -->
<?php
                $ap="SELECT * FROM `mobile_api_decider` WHERE `mapid_id`='1'";
                $sc=$con->query($ap);
                $dcvp=$sc->fetch_assoc();
                
                if($dcvp[api_no]=='2'){?>
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
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Mobile Recharge</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <div class="x_content bs-example-popovers">
                <?php
                if($_GET[status]=='s'){?>
                  <div class="alert alert-success alert-dismissible " role="alert">
                    
                    <strong>Success !</strong> Mobile Recharged Successfully
                  </div>
                  <?php }
                  elseif($_GET[status]=='p'){
                  ?>
                  <div class="alert alert-warning alert-dismissible " role="alert">
                    
                    <strong>Pending !</strong> Mobile Recharge is in Progress 
                  </div>
                  <?php }
                  elseif($_GET[status]=='f'){
                  ?> 
                  
                  <div class="alert alert-danger alert-dismissible " role="alert">
                    
                    <strong>Failed !</strong> Recharge Failed Plz Try Again
                  </div>
                    <?php }?>
                </div>
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
                                <option value="AR">Airtel</option>
                                <option value="VF">Vodafone</option>
                                <option value="BS">BSNL</option>
                                <option value="RJ">Reliance jio</option>
                                <option value="AI">Aircel</option>
                                <option value="ID">Idea</option>
                                
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
            </div>
<?php
if(isset($_POST[mob_recharge]))
{
    $baba=$d_detail[main_wallet]-$_POST[amount];
    if($baba>=0)
    {
   
    ///////////////for creating unique ID
        function unq_id_generate($chars) 
        {
          $data = '123456789';
          return substr(str_shuffle($data), 0, $chars);
        }
        for($x=0; $x<100; $x++)
        {
            //echo $x;
            $unq_id=unq_id_generate(10);
            $sqsqqs="SELECT * FROM `recharge_response` WHERE `unique_id`='$unq_id'";
            $qur=$con->query($sqsqqs);
            if(mysqli_num_rows($qur)==0)
            {
                break;
            }
        }
        //////////////////////
	//	$urla = 'http://www.bizforcerecharge.in/ReCharge/APIs.aspx?Mob=9588417929&message=RR+'.$_POST[operator].'+'.$_POST[mobile].'+'.$_POST[amount].'+6736&myTxId='.$unq_id.'&source=API&circle=14';
	//	http://www.bizforcerecharge.in/ReCharge/APIs.aspx?Mob=9588417929&message=RR+RA+7869470415+10+6736&myTxId=1235&source=API&circle=14'
	//https://www.rechargedaddy.in/RDRechargeAPI/RechargeAPI.aspx?MobileNo=9588417929&APIKey=dRvdlFf3mmFBSL2nmdoDcQFznBSoqeQ7sxV&REQTYPE=STATUS&REFNO=826973451&RESPTYPE=JSON
    $urla = 'https://www.rechargedaddy.in/RDRechargeAPI/RechargeAPI.aspx?MobileNo=9588417929&APIKey=dRvdlFf3mmFBSL2nmdoDcQFznBSoqeQ7sxV&REQTYPE=RECH&REFNO='.$unq_id.'&SERCODE='.$_POST[operator].'&CUSTNO='.$_POST[mobile].'&REFMOBILENO='.$_POST[mobile].'&AMT='.$_POST[amount].'&STV=0&RESPTYPE=JSON';
    //https://www.rechargedaddy.in/RDRechargeAPI/RechargeAPI.aspx?MobileNo=9588417929&APIKey=dRvdlFf3mmFBSL2nmdoDcQFznBSoqeQ7sxV&REQTYPE=RECH&REFNO=785264&SERCODE=ID&CUSTNO=7566509605&REFMOBILENO='7566509605'&AMT=49&STV=0&RESPTYPE=JSON
		$ch = curl_init($urla);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
        
       
        $obj = json_decode($response);
        $str_arr = explode (",", $response);
        ///////
        if($obj->TRNSTATUS == "1")
        {
            $sss="UPDATE `distributor` SET `main_wallet` = '$baba' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    		$sccc="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$_POST[amount]', '$baba', 'Recharged', '', '', 'Recharged', '$date', '$time', '$unq_id');";
    		$con->query($sss);
    		$con->query($sccc);
    		$dis=distribute_recharge_income($_SESSION[d_id],$_POST[amount],$unq_id);
    		if($dis=="y"){$com='y'; $hold='n';}
    		else{$com='n'; $hold='y';}
    		while ($con->next_result()) {;}
            $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `date`, `time`, `hold_amount`, `unique_id`, `commission_distributed`, `recharge_status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$date', '$time', '$hold', '$unq_id', '$com', 'Success');";
		    $con->query($cd);
            
    		
    		echo "<script>alert('Success! Mobile No. Recharged'); location.href='mobile_recharge.php';</script>";
            
        }
        elseif($obj->TRNSTATUS == "0")
        {
            
            $sss="UPDATE `distributor` SET `main_wallet` = '$baba' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    		$sccc="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$_POST[amount]', '$baba', 'Recharged', '', '', 'Recharged', '$date', '$time', '$unq_id');";
    		$con->query($sss);
    		$con->query($sccc);
    		
            $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `date`, `time`, `hold_amount`, `unique_id`, `commission_distributed`, `recharge_status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$date', '$time', 'y', '$unq_id', 'n', 'Pending');";  
		    $con->query($cd);
    		echo "<script>location.href='mobile_recharge_status.php?ref_no=$unq_id';</script>";
        }
        elseif($obj->TRNSTATUS == "6")
        {
            
            $sss="UPDATE `distributor` SET `main_wallet` = '$baba' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    		$sccc="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$_POST[amount]', '$baba', 'Recharged', '', '', 'Recharged', '$date', '$time', '$unq_id');";
    		$con->query($sss);
    		$con->query($sccc);
    		
            $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `date`, `time`, `hold_amount`, `unique_id`, `commission_distributed`, `recharge_status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$date', '$time', 'y', '$unq_id', 'n', 'Pending');";
		    $con->query($cd);
    		echo "<script>location.href='mobile_recharge_status.php?ref_no=$unq_id';</script>";
        }
            else{
                $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `date`, `time`, `hold_amount`, `unique_id`, `commission_distributed`, `recharge_status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$date', '$time', 'n', '$unq_id', 'n', 'Failed');";
		    $con->query($cd);
        echo "<script>location.href='mobile_recharge_status.php?ref_no=$unq_id';</script>";
    }
    }
    else{
        
        echo "<script>alert('You Dont Have Balance'); location.href='mobile_recharge.php';</script>";
    }
}
?>       
            
            </div>
            <?php }
            elseif($dcvp[api_no]=='1'){ ?>
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
            <div class="col-md-6 col-sm-8 col-xs-12">
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
            </div>
<?php
if(isset($_POST[mob_recharge]))
{
    $baba=$d_detail[main_wallet]-$_POST[amount];
    if($baba>=0)
    {
   
    ///////////////for creating unique ID
        function unq_id_generate($chars) 
        {
          $data = '123456789';
          return substr(str_shuffle($data), 0, $chars);
        }
        for($x=0; $x<100; $x++)
        {
            //echo $x;
            $unq_id=unq_id_generate(10);
            $sqsqqs="SELECT * FROM `recharge_response` WHERE `unique_id`='$unq_id'";
            $qur=$con->query($sqsqqs);
            if(mysqli_num_rows($qur)==0)
            {
                break;
            }
        }
        //////////////////////
		$urla = 'http://www.bizforcerecharge.in/ReCharge/APIs.aspx?Mob=9588417929&message=RR+'.$_POST[operator].'+'.$_POST[mobile].'+'.$_POST[amount].'+6736&myTxId='.$unq_id.'&source=API&circle=14';
	//	http://www.bizforcerecharge.in/ReCharge/APIs.aspx?Mob=9588417929&message=RR+RA+7869470415+10+6736&myTxId=1235&source=API&circle=14'

		$ch = curl_init($urla);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
        
       
        
        $str_arr = explode (",", $response);
        ///////
        if($str_arr[0]=="Your Request have been Success")
        {
            $sss="UPDATE `distributor` SET `main_wallet` = '$baba' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    		$sccc="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$_POST[amount]', '$baba', 'Recharged', '', '', 'Recharged', '$date', '$time', '$unq_id');";
    		$con->query($sss);
    		$con->query($sccc);
    		$dis=distribute_recharge_income($_SESSION[d_id],$_POST[amount],$unq_id);
    		if($dis=="y"){$com='y'; $hold='n';}
    		else{$com='n'; $hold='y';}
    		while ($con->next_result()) {;}
            $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `date`, `time`, `hold_amount`, `unique_id`, `commission_distributed`, `recharge_status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$date', '$time', '$hold', '$unq_id', '$com', 'Success');";
		    $con->query($cd);
            
    		
    		echo "<script>alert('Success! Mobile No. Recharged'); location.href='mobile_recharge.php';</script>";
            
        }
        elseif($str_arr[0]=="Your Request have been Processed")
        {
            
            $sss="UPDATE `distributor` SET `main_wallet` = '$baba' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    		$sccc="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$_POST[amount]', '$baba', 'Recharged', '', '', 'Recharged', '$date', '$time', '$unq_id');";
    		$con->query($sss);
    		$con->query($sccc);
    		
            $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `date`, `time`, `hold_amount`, `unique_id`, `commission_distributed`, `recharge_status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$date', '$time', 'y', '$unq_id', 'n', 'Pending');";
		    $con->query($cd);
            
    		
    		echo "<script>alert('Pending ! Mobile recharge is pending'); location.href='mobile_recharge.php';</script>";
    		
            
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
            
            </div>
                
            <?php }
            ?>
            
            
          </div>
        </div>
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