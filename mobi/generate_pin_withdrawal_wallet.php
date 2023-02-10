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
            <div class="main-content-inner">
             <div class="row">
                
                <!-- Textual inputs start -->
                <div class="col-12 mt-12">
                    <div class="card">
                        <div class="card-body">
                            <h4> Generate Pins </h4>
                            <br>&nbsp;
                            <?php if($_GET[s]=="s")
                            {?>
                            <div class="alert alert-success" role="alert">
                                            <strong>Success!</strong> Pin Generated Successfully
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
                           <?php }?>
                           <br>
            <table class="table table-striped table-bordered">
            <thead><tr><th>Withdrawal Wallet Balance</th><th><?php echo $d_detail[main_wallet]+0;?></th></tr></thead>
            <tr>
                <td>Pin Generate</td>
                <td><form method="post" action="confirm_generate_pin_withdrawal.php"><input type="number" class="form-control" name="pins" min="0" required><input type="submit" class="btn btn-success" value="Buy Pin" name="pin_generate_wallet"></form></td>
            </tr>
            </table>
                            
                            
                            
                        </div>
                    </div>
                </div>
                            <!-- Textual inputs end -->
                
                
                </div>
                <?php
	if(isset($_POST[sub_reg]))
	{
	    function isNumber($c) {
            return preg_match('/[0-9]/', $c);
        }
        
            $string=$_POST[s_id];
               
            $chars = '';
            $ssd_id = '';
            for ($index=0;$index<strlen($string);$index++) {
                if(isNumber($string[$index]))
                {
                    $ssd_id .= $string[$index];
                }
                else {
                    $chars .= $string[$index];}
            }
            
            
            //////////////////////////////
function password_generate($chars) 
{
  $data = '123456789';
  return substr(str_shuffle($data), 0, $chars);
}
for($x=0; $x<100; $x++)
{
    //echo $x;
    $d_id=password_generate(6);
    $sqsqqs="SELECT * FROM `distributor` WHERE `d_id`='$pas'";
    $qur=$con->query($sqsqqs);
    if(mysqli_num_rows($qur)==0)
    {
        break;
    }
}
            
	    $s_d="SELECT * FROM `distributor` WHERE `d_id`='$ssd_id'";
	    $d=$con->query($s_d);
	    if($d->num_rows>0)
	    {
	        if($_POST[password]==$_POST[c_password])
	        {
	            $ss="INSERT INTO `distributor` (`d_id`, `s_id`, `name`, `dob`, `mobile`, `a_mobile`, `password`, `addreass`, `city`, `state`, `pancard_no`, `adhar_card_no`, `reg_date`, `reg_time`, `a_status`, `a_date`, `a_time`, `withdrawal_wallet`, `recharge_wallet`, `ludo_wallet`, `pin_wallet`, `pan_a`, `tds_wallet`, `block_status`) VALUES ('$d_id', '$ssd_id', '$_POST[name]', '', '$_POST[mobile]', '', '$_POST[password]', '', '', '', '', '', '$date', '$time', 'n', '', '', '0', '0', '0', '0', 'n', '0', 'n');";
	            if($con->query($ss)===TRUE)
	            {
	                echo "<script>location.href='new_registration_detail.php?d_id=".$d_id."';</script>";
	            }
	            else{
	                $ef="INSERT INTO `entry_fail_report` (`efr_id`, `date`, `time`, `d_id`, `admin_id`, `url`, `failed_query_n`, `app`) VALUES (NULL, '$date', '$time', '$_SESSION[d_id]', '', '$url', 'New Registration', 'y');";
	                $con->query($ef);
	                echo "location.href='new_registration.php?s=f';</script>";
	                
	            }
	        }else{echo "<script>location.href='new_registration.php?s=c_pass';</script>";}
	    }else{echo "<script>location.href='new_registration.php?s=s_id';</script>";}
	}
	?>
                <!-- row area start-->
            </div>
        </div>
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
