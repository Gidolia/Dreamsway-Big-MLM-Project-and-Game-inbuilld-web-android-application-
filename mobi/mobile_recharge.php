<?php include "config.php";?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dreamsway</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <?php include "include/sidebar.php";?>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <?php include "include/header.php";?>
            <!-- header area end -->
            <!-- page title area start -->
            <!-- page title area end -->
            <?php
                $ap="SELECT * FROM `mobile_api_decider` WHERE `mapid_id`='1'";
                $sc=$con->query($ap);
                $dcvp=$sc->fetch_assoc();
                
                if($dcvp[api_no]=='1'){?>
            <div class="main-content-inner">
             <div class="row">
                
                <!-- Textual inputs start -->
                <div class="col-12 mt-12">
                    <div class="card">
                        <div class="card-body">
                            <h4> Mobile Recharge </h4>
                            <br>&nbsp;
                            <?php if($_GET[s]=="s")
                            {?>
                            <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> Mobile Recharged Successfully
                            </div>
                            <?php }elseif($_GET[s]=="q_f"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> Please Try again
                                        </div>
                           <?php }elseif($_GET[s]=="u_bal"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> You Dont have balance
                                        </div>
                           <?php } elseif($_GET[s]=="p"){
                                ?>
                                <div class="alert alert-warning" role="alert">
                                            <strong>Pending!</strong> Please Wait
                                        </div>
                           <?php }?>
                                        <br>&nbsp;
                            
                            <form class="form-horizontal form-label-left" method="post" name="myForm" onsubmit="return validateForm()">
                      <div class="form-group">
                        <h4>Wallet Balance  = <?php echo $d_detail[main_wallet]+0;?>/-</h4>
                          
                        
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile No.</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" class="form-control" name="mobile" required>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Operator</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
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
                          
                        </div>
                        <span id="upline_msg" style="color: red"></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" class="form-control" name="amount" required>
                          
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Recharge Mobile" name="mob_recharge">
                        </div>
                      </div>
                     </form>
                            
                            
                            
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                 
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
            
    		
    		echo "<script>location.href='mobile_recharge.php?s=s';</script>";
            
        }
        elseif($str_arr[0]=="Your Request have been Processed")
        {
            
            $sss="UPDATE `distributor` SET `main_wallet` = '$baba' WHERE `distributor`.`d_id` = '$_SESSION[d_id]';";
    		$sccc="INSERT INTO `main_wallet` (`mw_id`, `d_id`, `type`, `amount`, `a_bal`, `note`, `to_d_id`, `from_d_id`, `note_s`, `date`, `time`, `recharge_unq_id`) VALUES (NULL, '$_SESSION[d_id]', '-', '$_POST[amount]', '$baba', 'Recharged', '', '', 'Recharged', '$date', '$time', '$unq_id');";
    		$con->query($sss);
    		$con->query($sccc);
    		
            $cd="INSERT INTO `recharge_response` (`rr_id`, `d_id`, `r_mobile`, `operator`, `amount`, `response`, `url`, `recharge_type`, `date`, `time`, `hold_amount`, `unique_id`, `commission_distributed`, `recharge_status`) VALUES (NULL, '$_SESSION[d_id]', '$_POST[mobile]', '$_POST[operator]', '$_POST[amount]', '$response', '$urla', 'Mobile', '$date', '$time', 'y', '$unq_id', 'n', 'Pending');";
		    $con->query($cd);
            
    		
    		echo "<script>location.href='mobile_recharge.php?s=p';</script>";
    		
            
        }
            else{
        echo "<script>location.href='mobile_recharge.php?s=q_f';</script>";
    }
    }
    else{
        echo "<script>location.href='mobile_recharge.php?s=u_bal';</script>";
    }
}
                
                
                
         
        ?> 
                
                
                <!-- row area start-->
            </div>
        </div><?php }
            elseif($dcvp[api_no]=='2'){ ?>
        <div class="main-content-inner">
             <div class="row">
                
                <!-- Textual inputs start -->
                <div class="col-12 mt-12">
                    <div class="card">
                        <div class="card-body">
                            <h4> Mobile Recharge </h4>
                            <br>&nbsp;
                            <?php if($_GET[s]=="s")
                            {?>
                            <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> Mobile Recharged Successfully
                            </div>
                            <?php }elseif($_GET[s]=="q_f"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> Please Try again
                                        </div>
                           <?php }elseif($_GET[s]=="u_bal"){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                            <strong>Failed!</strong> You Dont have balance
                                        </div>
                           <?php } elseif($_GET[s]=="p"){
                                ?>
                                <div class="alert alert-warning" role="alert">
                                            <strong>Pending!</strong> Please Wait
                                        </div>
                           <?php }?>
                                        <br>&nbsp;
                            
                            <form class="form-horizontal form-label-left" method="post" name="myForm" onsubmit="return validateForm()">
                      <div class="form-group">
                        <h4>Wallet Balance  = <?php echo $d_detail[main_wallet]+0;?>/-</h4>
                          
                        
                      </div>  
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Mobile No.</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" class="form-control" name="mobile" required>
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Operator</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <select name="operator" class="form-control">
                                <option value="AR">Airtel</option>
                                <option value="VF">Vodafone</option>
                                <option value="BS">BSNL</option>
                                <option value="RJ">Reliance jio</option>
                                <option value="AI">Aircel</option>
                                <option value="ID">Idea</option>
                            </select>
                        </div>
                        <span id="upline_msg" style="color: red"></span>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-3">Amount</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                          <input type="number" class="form-control" name="amount" required>
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-md-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" value="Recharge Mobile" name="mob_recharge">
                        </div>
                      </div>
                     </form>
                            
                            
                            
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                 
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
            
    		
    		echo "<script>location.href='mobile_recharge.php?s=s';</script>";
            
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
        
       echo "<script>location.href='mobile_recharge.php?s=u_bal';</script>";
    }
}
?>       
                
                
                <!-- row area start-->
            </div>
        </div>   
            
            
            
            <?php }?>
        <!-- main content area end -->
        <!-- footer area start-->
       <?php include "include/footer.php";?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

   
    
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
